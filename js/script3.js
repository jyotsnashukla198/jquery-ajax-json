/*$(document).ready(function()
{
	$(function()
	{
		$(".tabsection").hide();
		$("#tabs a").bind('click',function()
		{
			$(".tabsection:visible").hide();
			$("#tabs a.current").removeClass('current');
			$(this.hash).show();
			$(this).addClass('current');

		}).filter(':first').click();
	});

});*/
$(document).ready(function()
{
	$(function()
	{
		$(".tabsection").hide();
		$("#tabs a").bind('click',function()
		{
			$(".tabsection:visible").hide();
			var tabclick=$(this).parent();
			var indexOfTabClick=tabclick.index();
			$("#tabs a.current").removeClass('current');
			
			$("#content .tabsection").each(function()
			{
				if($(this).index()===indexOfTabClick)
					$(this).show();

			});
			$(this).addClass('current');



		}).filter(":first").click();
	});
	getXml();
	function getXml()
	{
		$.getJSON('service1.php', function(json) {
		if (json.runners.length> 0) {
		$('#finishres_m').empty();
		$('#finishres_f').empty();
		$('#finishres_all').empty();
		$.each(json.runners,function() {
			
		var info = '<li>Name: ' + this['fname'] + ' ' + this['lname'] + '. Time: ' +this['time'] + '</li>';
		if(this['gender']==='m'){
		$('#finishres_m').append(info);
		}else if(this['gender']=== 'f'){
		$('#finishres_f').append(info);
		}else{}
		$('#finishres_all').append(info);
		});
		}
		});

}

});