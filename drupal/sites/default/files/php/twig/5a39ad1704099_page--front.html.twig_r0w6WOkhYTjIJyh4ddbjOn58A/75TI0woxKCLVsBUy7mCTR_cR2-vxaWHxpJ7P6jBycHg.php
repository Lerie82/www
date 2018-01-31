<?php

/* sites/all/themes/creativity/templates/page--front.html.twig */
class __TwigTemplate_f1f3d0b2b1a32cc6e48fda24ee09dd893a57167651a712dcabc5eb7efee7b19a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 52);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "
  <body>


  <header>
    <div class=\"header text-center\" >

  <div id=\"mySidenav\" class=\"sidenav\">
  <a href=\"javascript:void(0)\" class=\"closebtn\" onclick=\"closeNav()\">&times;</a>

";
        // line 11
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navigation", array()), "html", null, true));
        echo "


</div>

<div id=\"main\">

  <span style=\"font-size:35px;color:white ; cursor:pointer ;position: fixed;
    top: 41px;
    left: 9px;\" onclick=\"openNav()\">&#9776; </span>
</div>

<script>
function openNav() {
    document.getElementById(\"mySidenav\").style.width = \"250px\";
    document.getElementById(\"main\").style.marginLeft = \"250px\";
}

function closeNav() {
    document.getElementById(\"mySidenav\").style.width = \"0\";
    document.getElementById(\"main\").style.marginLeft= \"0\";
}
</script>






      <h2>Creativity. </h2>
      <p>Create your online portfolio in minutes with professionally and lovingly designed REEN
         website template. </p>

      <button type=\"button\" class=\"btn btn-lg button1\">Buy The Theme</button>

      <button type=\"button\" class=\"btn btn-lg button2\" >Learn More</button>
    </div>
  </header>


   <!-- second container -->
     ";
        // line 52
        if ($this->getAttribute(($context["page"] ?? null), "about1", array())) {
            // line 53
            echo "  <div id=\"about\" class=\"container-fluid\">
  <div class=\"row\">
    <div class=\"col-md-6 second1\">
      <h3>Build your base.</h3><br>
<p class=\"upper1\">

      ";
            // line 59
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "about1", array()), "html", null, true));
            echo "
      </p>
      <br><button  class=\"btn btn-primary btn-lg button3 \">meet the team  <i class=\"glyphicon glyphicon-arrow-right\" aria-hidden=\"true\"> </i></button>

    </div>
    <div class=\"col-md-6\">
      <img class=\"img-responsive  imgc\" src=\"";
            // line 65
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
            echo "/img/g12.png\" alt=\"Chania\" >
    </div>
  </div>


</div>
  ";
        }
        // line 72
        echo "
 <!-- third cpmtainer -->


   <div id=\"uac1\" class=\"container-fluid bg-3 text-center uac2\">
   <h3 class=\"margin\"> Creative And Unique </h3><br>

  <div class=\"row text-center \">
    <div class=\"col-sm-4\">
      <div class=\"t1\">
      <br>
      <br>
         <i class=\"icon-graph icon1\" aria-hidden=\"true\"></i>
        <h3 class=\"heading\">Creativity.</h3>
        <p >At vero eos et accusamus et iusto odio
        <br> dignissigfvc ccc.
        </p>
      </div>
    </div>
      <div class=\"col-sm-4\">
      <div class=\"t1\">

      <br>
      <br>
         <i class=\"icon-briefcase icon1\" aria-hidden=\"true\"></i>


        <h3 class=\"heading\">Capacity.</h3>
<p>At vero eos et accusamus et iusto odio
        <br> dignissigfvc ccc.</p>

      </div>
    </div>
    <div class=\"col-sm-4\">
      <div class=\"t1\"
        <br>
        <br>
         <i class=\"icon-map icon1\" aria-hidden=\"true\"></i>

        <h3 class=\"heading\">Portfolios.</h3>


        <p>At vero eos et accusamus et iusto odio
        <br> dignissigfvc cc</p>
      </div>
    </div>

  </div><br>

   </div>
  <div id=\"t2\" class=\"container-fluid bg-3\">

  <div class=\"row\">
    <div class=\"col-md-4  \">
      <h3 class= \"show\">Show off the skills
      <br>
    works and awesome projects.
    <br>
    </h3>


    </div>
    <div class=\"col-md-8\">

      <p class=\"content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut . </p>
    </div>

</div>
</div>

<!-- fourth container -->


<div  id=\"where\" class=\"container-fluid bg-3 text-center \">
  <h3  class=\"margin\" >Awards.</h3><br>
  <div class=\"row\">
    <div class=\"col-md-4\">
    <h3 class=\"a1\" >Architecture</h3>
   <div class=\"where\">
      <h4>D&AD AWARDS 2008</h4>
      <p>Second place,honorable mention</p>

       <h4>COMMUNICATION ARTS 2009</h4>
      <p>Second place</p>

       <h4>WEBBY AWARDS 2011</h4>
      <p>Second place,honorable mention</p>

       <h4>ADOBE ACHIEVEMENT AWARDS 2011</h4>
      <p>Third place,honorable mention</p>

       <h4>FLASHFORWARD 2014</h4>
      <p>Third place</p>

       <h4>D&AD AWARDS 2008</h4>
      <p>Second place,honorable mention</p>


</div>
    </div>
    <div class=\"col-md-4\">
    <h3 class=\"a1\">Design</h3>
 <div class=\"where\">
      <h4>D&AD AWARDS 2008</h4>
      <p>Second place,honorable mention</p>

       <h4>COMMUNICATION ARTS 2009</h4>
      <p>Second place</p>

       <h4>WEBBY AWARDS 2011</h4>
      <p>Second place,honorable mention</p>

       <h4>ADOBE ACHIEVEMENT AWARDS 2011</h4>
      <p>Third place,honorable mention</p>

       <h4>FLASHFORWARD 2014</h4>
      <p>Third place</p>

       <h4>D&AD AWARDS 2008</h4>
      <p>Second place,honorable mention</p>

</div>
</div>
  <div class=\"col-md-4\">
  <h3 class=\"a1\" >Management</h3>
 <div class=\"where\">
      <h4>D&AD AWARDS 2008</h4>
      <p>Second place,honorable mention</p>

       <h4>COMMUNICATION ARTS 2009</h4>
      <p>Second place</p>

       <h4>WEBBY AWARDS 2011</h4>
      <p>Second place,honorable mention</p>

       <h4>ADOBE ACHIEVEMENT AWARDS 2011</h4>
      <p>Third place,honorable mention</p>

       <h4>FLASHFORWARD 2014</h4>
      <p>Third place</p>

       <h4>D&AD AWARDS 2008</h4>
      <p>Second place,honorable mention</p>


</div>
</div>
<br>
<br>

 <br><button  class=\"btn btn-primary btn-lg button4 \">meet the team  <span  src=\"";
        // line 223
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/arrow1.png\" alt=\"Cha\" >> </span></button>
<br>
<br>
</div>
</div>

 <!--fourth container  -->
  ";
        // line 230
        if (($this->getAttribute(($context["page"] ?? null), "price_block1", array()) || $this->getAttribute(($context["page"] ?? null), "price_block2", array()))) {
            // line 231
            echo "
  <div id=\"t3\" class=\"container-fluid bg-3\">

  <div class=\"row\">
    <div class=\"col-md-4  \">
      <h3 class= \"show\">
        ";
            // line 237
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "price_block1", array()), "html", null, true));
            echo "
    <br>
    </h3>



    </div>
    <div class=\"col-md-8\">

      <p class=\"content\">
        ";
            // line 247
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "price_block2", array()), "html", null, true));
            echo "
      </p>
    </div>

</div>
</div>

  ";
        }
        // line 255
        echo "
  ";
        // line 256
        if ($this->getAttribute(($context["page"] ?? null), "price", array())) {
            // line 257
            echo "

 ";
            // line 259
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "price", array()), "html", null, true));
            echo "

  ";
        }
        // line 262
        echo "
  ";
        // line 263
        if ($this->getAttribute(($context["page"] ?? null), "super_creative", array())) {
            // line 264
            echo "
<div class=\"container-fluid text-center block1 \">

      <h2>Be the best at what you do.</h2><br>
      <p>
    ";
            // line 269
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "super_creative", array()), "html", null, true));
            echo "

      </p>
         <img class= \"hidden-sm hidden-xs hidden-md\"  src=\"";
            // line 272
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
            echo "/img/arrowdown.png\" alt=\"New\" >


   </div>
  ";
        }
        // line 277
        echo "
<!-- features container -->



 <div class=\"container con quality\">

 <div class=\"featurebox1\">
<div class=\"column\">
    <div class=\"hidden-sm hidden-xs hidden-md col-sm-1\">
    <div class=\"feature1\">
        <img  src=\"";
        // line 288
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/square.png\"  alt=\"New\" >
       </div>
<div class=\"feature1\">
<img  src=\"";
        // line 291
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/portfolio.png\"  alt=\"New\" >
 </div>


<div class=\"feature1\">
        <img  src=\"";
        // line 296
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/find.png\"  alt=\"New\" >
</div>
      </div>

    <div class=\"column\">
 <div class=\"col-sm-2\">
    <div class=\"feature2\">
        <h3>Creativity.</h3>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore. </p></div>
<div class=\"feature2\">
<p><h3>Portfolios.</h3>
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.
      </p>   </div>
<div class=\"feature2\">
<p><h3>Industry. </h3>
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.

</p>
</div>
 </div>

     </div>
    </div>
    </div>
       <div class=\"col-sm-9 featurebox\">
        <div class=\"row  text-left feature3 \" >
          <h3>Be Best In What You Do </h3>
          <p>Erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu.    </p>
        </div>
<div class=\"column feature3\">
             <div class=\"row text-center slideanim\">
    <div class=\"col-sm-3 feature4\">
     <img src=\"";
        // line 328
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/p1.jpg\" alt=\"Paris\" width=\"220\" height=\"200\">
  </div>
    <div class=\"col-sm-3 feature4\">
      <img src=\"";
        // line 331
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/p3.jpg\" alt=\"New York\" width=\"220\" height=\"200\">
</div>
    <div class=\"col-sm-3 feature4\">
       <img src=\"";
        // line 334
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/p5.jpg\" alt=\"San Francisco\" width=\"220\" height=\"200\">
        </div>
  </div>
  </div>



        <div class=\"column feature3\">
      <div class=\"row text-center slideanim\">
    <div class=\"col-sm-3 feature4\">
   <img src=\"";
        // line 344
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/p2.jpg\" alt=\"Paris\" width=\"220\" height=\"200\">
    </div>
    <div class=\"col-sm-3 feature4\">
    <img src=\"";
        // line 347
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/p4.jpg\" alt=\"New York\" width=\"220\" height=\"200\">
  </div>
    <div class=\"col-sm-3 feature4\">
    <img src=\"";
        // line 350
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
        echo "/img/p6.jpg\" alt=\"San Francisco\" width=\"220\" height=\"200\">


  </div>
  </div>
  </div>
  </div>

        </div>

<!super creative container-->




  ";
        // line 365
        if ($this->getAttribute(($context["page"] ?? null), "super_creative", array())) {
            // line 366
            echo "

 <div id=\"super\" class=\"container-fluid bg-2 text-center\">
   <div class=\"col-sm-4\">
      <br>

          <img src=\"";
            // line 372
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true));
            echo "/img/p4.jpg\" class=\"img-circle\" alt=\"Cinque Terre\" width=\"236\" height=\"236\">



    </div>
  <div class=\"col-sm-8 super0\">
  <h3 class=\"margin1\">Super Creative </h3>
  <br>
  <p class=\"text-left mar\" style=\"text-align:left;\">
       ";
            // line 381
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "super_creative", array()), "html", null, true));
            echo "
  </p>
  <br>
  <p class=\"text-left margin2 \"><strong>Rohit Sharma </strong>
       <br>  New Delhi </p>
  </div >
</div>
  ";
        }
        // line 389
        echo "
<!-- portfolio container -->
  ";
        // line 391
        if ($this->getAttribute(($context["page"] ?? null), "portfolio", array())) {
            // line 392
            echo "
 ";
            // line 393
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "portfolio", array()), "html", null, true));
            echo "
  ";
        }
        // line 395
        echo "
<!-- team member -->
  ";
        // line 397
        if ($this->getAttribute(($context["page"] ?? null), "team", array())) {
            // line 398
            echo "
    ";
            // line 399
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "meet_team", array()), "html", null, true));
            echo "
  ";
        }
        // line 401
        echo "

<hr>

  ";
        // line 405
        if ($this->getAttribute(($context["page"] ?? null), "department", array())) {
            // line 406
            echo "
";
            // line 407
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "department", array()), "html", null, true));
            echo "
  ";
        }
        // line 409
        echo "
</div>

<!-- footer -->
  ";
        // line 413
        if (((($this->getAttribute(($context["page"] ?? null), "footer1", array()) || $this->getAttribute(($context["page"] ?? null), "footer2", array())) || $this->getAttribute(($context["page"] ?? null), "footer3", array())) || $this->getAttribute(($context["page"] ?? null), "footer4", array()))) {
            // line 414
            echo "
<footer>
    <div  id=\"contact\" class=\"container-fluid bg-2\">
      <div class=\"footer container-fluid\">
        <div class=\"col-sm-3 contact\">

          ";
            // line 420
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer1", array()), "html", null, true));
            echo "
          </div>
<div class=\"col-sm-3 contact\">

          ";
            // line 424
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer2", array()), "html", null, true));
            echo "
        </div>

        <div class=\"col-sm-3 contact\">

         ";
            // line 429
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer3", array()), "html", null, true));
            echo "
         </div>
        <div class=\"col-sm-3 contact\">

           ";
            // line 433
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer4", array()), "html", null, true));
            echo " <span>
          <i class=\"fa fa-facebook-official\" aria-hidden=\"true\"></i>
          <i class=\"fa fa-google-plus-official\" aria-hidden=\"true\"></i>
          <i class=\"fa fa-twitter\" aria-hidden=\"true\"></i>
          <i class=\"fa fa-pinterest\" aria-hidden=\"true\"></i>

        </span>
       </div>
      </div>
      </div>

  </footer>
  ";
        }
        // line 446
        echo "







</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/creativity/templates/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  614 => 446,  598 => 433,  591 => 429,  583 => 424,  576 => 420,  568 => 414,  566 => 413,  560 => 409,  555 => 407,  552 => 406,  550 => 405,  544 => 401,  539 => 399,  536 => 398,  534 => 397,  530 => 395,  525 => 393,  522 => 392,  520 => 391,  516 => 389,  505 => 381,  493 => 372,  485 => 366,  483 => 365,  465 => 350,  459 => 347,  453 => 344,  440 => 334,  434 => 331,  428 => 328,  393 => 296,  385 => 291,  379 => 288,  366 => 277,  358 => 272,  352 => 269,  345 => 264,  343 => 263,  340 => 262,  334 => 259,  330 => 257,  328 => 256,  325 => 255,  314 => 247,  301 => 237,  293 => 231,  291 => 230,  281 => 223,  128 => 72,  118 => 65,  109 => 59,  101 => 53,  99 => 52,  55 => 11,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "sites/all/themes/creativity/templates/page--front.html.twig", "/var/www/html/drupal/sites/all/themes/creativity/templates/page--front.html.twig");
    }
}
