<?php

namespace Drupal\content_moderation;

use Drupal\content_moderation\Plugin\Field\ModerationStateFieldItemList;
use Drupal\Core\Entity\BundleEntityFormBase;
use Drupal\Core\Entity\ContentEntityFormInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\ContentEntityTypeInterface;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\content_moderation\Entity\Handler\BlockContentModerationHandler;
use Drupal\content_moderation\Entity\Handler\ModerationHandler;
use Drupal\content_moderation\Entity\Handler\NodeModerationHandler;
use Drupal\content_moderation\Entity\Routing\EntityModerationRouteProvider;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Manipulates entity type information.
 *
 * This class contains primarily bridged hooks for compile-time or
 * cache-clear-time hooks. Runtime hooks should be placed in EntityOperations.
 *
 * @internal
 */
class EntityTypeInfo implements ContainerInjectionInterface {

  use StringTranslationTrait;

  /**
   * The moderation information service.
   *
   * @var \Drupal\content_moderation\ModerationInformationInterface
   */
  protected $moderationInfo;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The bundle information service.
   *
   * @var \Drupal\Core\Entity\EntityTypeBundleInfoInterface
   */
  protected $bundleInfo;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The state transition validation service.
   *
   * @var \Drupal\content_moderation\StateTransitionValidationInterface
   */
  protected $validator;

  /**
   * A keyed array of custom moderation handlers for given entity types.
   *
   * Any entity not specified will use a common default.
   *
   * @var array
   */
  protected $moderationHandlers = [
    'node' => NodeModerationHandler::class,
    'block_content' => BlockContentModerationHandler::class,
  ];

  /**
   * EntityTypeInfo constructor.
   *
   * @param \Drupal\Core\StringTranslation\TranslationInterface $translation
   *   The translation service. for form alters.
   * @param \Drupal\content_moderation\ModerationInformationInterface $moderation_information
   *   The moderation information service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Entity type manager.
   * @param \Drupal\Core\Entity\EntityTypeBundleInfoInterface $bundle_info
   *   Bundle information service.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   Current user.
   */
  public function __construct(TranslationInterface $translation, ModerationInformationInterface $moderation_information, EntityTypeManagerInterface $entity_type_manager, EntityTypeBundleInfoInterface $bundle_info, AccountInterface $current_user, StateTransitionValidationInterface $validator) {
    $this->stringTranslation = $translation;
    $this->moderationInfo = $moderation_information;
    $this->entityTypeManager = $entity_type_manager;
    $this->bundleInfo = $bundle_info;
    $this->currentUser = $current_user;
    $this->validator = $validator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('string_translation'),
      $container->get('content_moderation.moderation_information'),
      $container->get('entity_type.manager'),
      $container->get('entity_type.bundle.info'),
      $container->get('current_user'),
      $container->get('content_moderation.state_transition_validation')
    );
  }


  /**
   * Adds Moderation configuration to appropriate entity types.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface[] $entity_types
   *   The master entity type list to alter.
   *
   * @see hook_entity_type_alter()
   */
  public function entityTypeAlter(array &$entity_types) {
    foreach ($entity_types as $entity_type_id => $entity_type) {
      // The ContentModerationState entity type should never be moderated.
      if ($entity_type->isRevisionable() && $entity_type_id != 'content_moderation_state') {
        $entity_types[$entity_type_id] = $this->addModerationToEntityType($entity_type);
      }
    }
  }

  /**
   * Modifies an entity definition to include moderation support.
   *
   * This primarily just means an extra handler. A Generic one is provided,
   * but individual entity types can provide their own as appropriate.
   *
   * @param \Drupal\Core\Entity\ContentEntityTypeInterface $type
   *   The content entity definition to modify.
   *
   * @return \Drupal\Core\Entity\ContentEntityTypeInterface
   *   The modified content entity definition.
   */
  protected function addModerationToEntityType(ContentEntityTypeInterface $type) {
    if (!$type->hasHandlerClass('moderation')) {
      $handler_class = !empty($this->moderationHandlers[$type->id()]) ? $this->moderationHandlers[$type->id()] : ModerationHandler::class;
      $type->setHandlerClass('moderation', $handler_class);
    }

    if (!$type->hasLinkTemplate('latest-version') && $type->hasLinkTemplate('canonical')) {
      $type->setLinkTemplate('latest-version', $type->getLinkTemplate('canonical') . '/latest');
    }

    $providers = $type->getRouteProviderClasses() ?: [];
    if (empty($providers['moderation'])) {
      $providers['moderation'] = EntityModerationRouteProvider::class;
      $type->setHandlerClass('route_provider', $providers);
    }

    return $type;
  }

  /**
   * Gets the "extra fields" for a bundle.
   *
   * @return array
   *   A nested array of 'pseudo-field' elements. Each list is nested within the
   *   following keys: entity type, bundle name, context (either 'form' or
   *   'display'). The keys are the name of the elements as appearing in the
   *   renderable array (either the entity form or the displayed entity). The
   *   value is an associative array:
   *   - label: The human readable name of the element. Make sure you sanitize
   *     this appropriately.
   *   - description: A short description of the element contents.
   *   - weight: The default weight of the element.
   *   - visible: (optional) The default visibility of the element. Defaults to
   *     TRUE.
   *   - edit: (optional) String containing markup (normally a link) used as the
   *     element's 'edit' operation in the administration interface. Only for
   *     'form' context.
   *   - delete: (optional) String containing markup (normally a link) used as
   *     the element's 'delete' operation in the administration interface. Only
   *     for 'form' context.
   *
   * @see hook_entity_extra_field_info()
   */
  public function entityExtraFieldInfo() {
    $return = [];
    foreach ($this->getModeratedBundles() as $bundle) {
      $return[$bundle['entity']][$bundle['bundle']]['display']['content_moderation_control'] = [
        'label' => $this->t('Moderation control'),
        'description' => $this->t("Status listing and form for the entity's moderation state."),
        'weight' => -20,
        'visible' => TRUE,
      ];
    }

    return $return;
  }

  /**
   * Returns an iterable list of entity names and bundle names under moderation.
   *
   * That is, this method returns a list of bundles that have Content
   * Moderation enabled on them.
   *
   * @return \Generator
   *   A generator, yielding a 2 element associative array:
   *   - entity: The machine name of an entity type, such as "node" or
   *     "block_content".
   *   - bundle: The machine name of a bundle, such as "page" or "article".
   */
  protected function getModeratedBundles() {
    $entity_types = array_filter($this->entityTypeManager->getDefinitions(), [$this->moderationInfo, 'canModerateEntitiesOfEntityType']);
    foreach ($entity_types as $type_name => $type) {
      foreach ($this->bundleInfo->getBundleInfo($type_name) as $bundle_id => $bundle) {
        if ($this->moderationInfo->shouldModerateEntitiesOfBundle($type, $bundle_id)) {
          yield ['entity' => $type_name, 'bundle' => $bundle_id];
        }
      }
    }
  }

  /**
   * Adds base field info to an entity type.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   Entity type for adding base fields to.
   *
   * @return \Drupal\Core\Field\BaseFieldDefinition[]
   *   New fields added by moderation state.
   *
   * @see hook_entity_base_field_info()
   */
  public function entityBaseFieldInfo(EntityTypeInterface $entity_type) {
    if (!$this->moderationInfo->canModerateEntitiesOfEntityType($entity_type)) {
      return [];
    }

    $fields = [];
    $fields['moderation_state'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Moderation state'))
      ->setDescription(t('The moderation state of this piece of content.'))
      ->setComputed(TRUE)
      ->setClass(ModerationStateFieldItemList::class)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'region' => 'hidden',
        'weight' => -5,
      ])
      ->setDisplayOptions('form', [
        'type' => 'moderation_state_default',
        'weight' => 100,
        'settings' => [],
      ])
      ->addConstraint('ModerationState', [])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', FALSE)
      ->setReadOnly(FALSE)
      ->setTranslatable(TRUE);

    return $fields;
  }

  /**
   * Alters bundle forms to enforce revision handling.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @param string $form_id
   *   The form id.
   *
   * @see hook_form_alter()
   */
  public function formAlter(array &$form, FormStateInterface $form_state, $form_id) {
    $form_object = $form_state->getFormObject();
    if ($form_object instanceof BundleEntityFormBase) {
      $config_entity_type = $form_object->getEntity()->getEntityType();
      $bundle_of = $config_entity_type->getBundleOf();
      if ($bundle_of
          && ($bundle_of_entity_type = $this->entityTypeManager->getDefinition($bundle_of))
          && $this->moderationInfo->canModerateEntitiesOfEntityType($bundle_of_entity_type)) {
        $this->entityTypeManager->getHandler($config_entity_type->getBundleOf(), 'moderation')->enforceRevisionsBundleFormAlter($form, $form_state, $form_id);
      }
    }
    elseif ($form_object instanceof ContentEntityFormInterface && in_array($form_object->getOperation(), ['edit', 'default'])) {
      $entity = $form_object->getEntity();
      if ($this->moderationInfo->isModeratedEntity($entity)) {
        $this->entityTypeManager
          ->getHandler($entity->getEntityTypeId(), 'moderation')
          ->enforceRevisionsEntityFormAlter($form, $form_state, $form_id);

        if (!$this->moderationInfo->isPendingRevisionAllowed($entity)) {
          $latest_revision = $this->moderationInfo->getLatestRevision($entity->getEntityTypeId(), $entity->id());
          if ($entity->bundle()) {
            $bundle_type_id = $entity->getEntityType()->getBundleEntityType();
            $bundle = $this->entityTypeManager->getStorage($bundle_type_id)->load($entity->bundle());
            $type_label = $bundle->label();
          }
          else {
            $type_label = $entity->getEntityType()->getLabel();
          }

          $translation = $this->moderationInfo->getAffectedRevisionTranslation($latest_revision);
          $args = [
            '@type_label' => $type_label,
            '@latest_revision_edit_url' => $translation->toUrl('edit-form', ['language' => $translation->language()])->toString(),
            '@latest_revision_delete_url' => $translation->toUrl('delete-form', ['language' => $translation->language()])->toString(),
          ];
          $label = $this->t('Unable to save this @type_label.', $args);
          $message = $this->t('<a href="@latest_revision_edit_url">Publish</a> or <a href="@latest_revision_delete_url">delete</a> the latest revision to allow all workflow transitions.', $args);
          $full_message = $this->t('Unable to save this @type_label. <a href="@latest_revision_edit_url">Publish</a> or <a href="@latest_revision_delete_url">delete</a> the latest revision to allow all workflow transitions.', $args);
          drupal_set_message($full_message, 'error');

          $form['moderation_state']['#access'] = FALSE;
          $form['actions']['#access'] = FALSE;
          $form['invalid_transitions'] = [
            'label' => [
              '#type' => 'item',
              '#prefix' => '<strong class="label">',
              '#markup' => $label,
              '#suffix' => '</strong>',
            ],
            'message' => [
              '#type' => 'item',
              '#markup' => $message,
            ],
            '#weight' => 999,
            '#no_valid_transitions' => TRUE,
          ];

          if ($form['footer']) {
            $form['invalid_transitions']['#group'] = 'footer';
          }
        }

        // Submit handler to redirect to the latest version, if available.
        $form['actions']['submit']['#submit'][] = [EntityTypeInfo::class, 'bundleFormRedirect'];

        // Move the 'moderation_state' field widget to the footer region, if
        // available.
        if (isset($form['footer'])) {
          $form['moderation_state']['#group'] = 'footer';
        }

        // Duplicate the label of the current moderation state to the meta
        // region, if available.
        if (isset($form['meta']['published'])) {
          $form['meta']['published']['#markup'] = $form['moderation_state']['widget'][0]['current']['#markup'];
        }
      }
    }
  }

  /**
   * Redirect content entity edit forms on save, if there is a pending revision.
   *
   * When saving their changes, editors should see those changes displayed on
   * the next page.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public static function bundleFormRedirect(array &$form, FormStateInterface $form_state) {
    /* @var \Drupal\Core\Entity\ContentEntityInterface $entity */
    $entity = $form_state->getFormObject()->getEntity();

    $moderation_info = \Drupal::getContainer()->get('content_moderation.moderation_information');
    if ($moderation_info->hasPendingRevision($entity) && $entity->hasLinkTemplate('latest-version')) {
      $entity_type_id = $entity->getEntityTypeId();
      $form_state->setRedirect("entity.$entity_type_id.latest_version", [$entity_type_id => $entity->id()]);
    }
  }

}
