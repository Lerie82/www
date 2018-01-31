$('#pwireModal').on('shown.bs.modal', function()
{
	$('#primewire').focus();
});

$('#oloadModal').on('shown.bs.modal', function()
{
	alert(1);
	$('#oload').focus();

	$.get('oload.php?q=info', function(data)
	{
		alert(data);
	});
});