$(document).ready(function()
{
	//alert(1);
});

$("#frmSearch").on('submit', function(evt)
{
	evt.preventDefault();
	ytSearch();
});

function ytSearch()
{
	//search youtube
	$("#ytsearch").html("Loading results...");
	var term = $("#terms").val();

	$.get("yt.php?q=search&term="+term, function(data)
	{
		$("#ytsearch").html(data);
	});
}

function saveVid(url, id)
{
	var list = $("#savedLinks").val();
	$("#savedLinks").val(url+"\n"+list);
	$("#"+id).hide();
}

function clearBox()
{
	$("#savedLinks").val("");
}

function oloadUpload(u, id)
{
	$("#"+id).hide();
	$.get("oload.php?q=upload&url="+u, function(data)
	{
		//
	});
}

function rapidUpload(u)
{
	$("#"+id).hide();
	$.get("rapid.php?q=upload&url="+u, function(data)
	{
		//
	});
}