$(document).ready(function(){
	 $("#allweeks").click(function(){
		 $("#weeks").toggle();
		 
	 });
	  /* function to view all video */
  $("#allvids").click(function(){
	$("#backloading").show();
	$.ajax({url:"allvideos.php", success:function(result){
			$("#admin-main-content").html(result);
				$("#backloading").hide();
  }});
	
  });
  
    /* function to add music */
	$("#addmusic").click(function(){
  $("#blankscreen").css({"display":"block"});
		$("#backloading").show();
	$.ajax({url:"musicform.php", success:function(result){
			$("#vuploadspace").fadeIn(2000);
    $("#videoform").html(result);
		$("#backloading").hide();
  }});
	});
	
  /* function to add week */
  $("#addweek").click(function(){
	  	$("#backloading").show();
	  $.ajax({url:"allelement.php?elmnt=week", success:function(result){
    $("#weeks").prepend(result);
		$("#backloading").hide();
  }});
	
  });
  
  
  /* change username */
  $("#cuname").click(function(){
	  	$("#backloading").show();
	  $.ajax({url:"changeCredits.php?change=uname", success:function(result){
    $("#login_credits").html(result);
		$("#backloading").hide();
  }});
	
  });
  
  $("#cupass").click(function(){
	  	$("#backloading").show();
	  $.ajax({url:"changeCredits.php?change=upass", success:function(result){
    $("#login_credits").html(result);
		$("#backloading").hide();
  }});
	
  });
  
$("#vuploadspace .close").click(function(){
	var wkno = $("#weekno").val();
	var dayno = $("#dayno").val();
	$("#vuploadspace").fadeOut(1000);
	$("#blankscreen").fadeOut(2000);
		$("#backloading").show();

	$.ajax({url:"getallvdos.php?weekno="+wkno+"&dayno="+dayno, success:function(result){
			$("#admin-main-content").html(result);
	$("#backloading").hide();
  }});

 });


$("#vuploadspace .mclose").click(function(){
	$("#vuploadspace").fadeOut(1000);
	$("#blankscreen").fadeOut(2000);
		$("#backloading").show();

	$.ajax({url:"allmusic.php", success:function(result){
			$("#admin-main-content").html(result);
	$("#backloading").hide();
  }});

});


$("#playvideo .close").click(function(){

	$("#playvideo").fadeOut(2000);
	$("#blankscreen").fadeOut(1000);
	$("#playing").html("");

 });



$("#ffltips").click(function(){
	$("#backloading").show();
		$.ajax({url:"ffltips.php", success:function(result){
			$("#alltips").html(result);
			$("#backloading").hide();
	  }});


});

$("#lltips").click(function(){
	$("#backloading").show();
		$.ajax({url:"lltips.php", success:function(result){
			$("#alltips").html(result);
			$("#backloading").hide();
	  }});

});


});



function expandDays(elmnt)
{
	$("."+elmnt).toggle();
	
}

function viewDayVdo(wkno, dayno)
{
		$("#backloading").show();
		//$(".week"+wkno+" .day"+dayno).addClass("current");
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("admin-main-content").innerHTML=xmlhttp.responseText;
		$("#backloading").hide();
    }
  }
xmlhttp.open("GET","getallvdos.php?weekno="+wkno+"&dayno="+dayno,true);
xmlhttp.send();
}

function delVdo(wkn,dyn,vdn)
{
		$("#backloading").show();
		if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttpdel=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
   xmlhttpdel=new ActiveXObject("Microsoft.XMLHTTP");
  }
 xmlhttpdel.onreadystatechange=function()
  {
  if ( xmlhttpdel.readyState==4 &&  xmlhttpdel.status==200)
    {
$(".vdo"+vdn).html(xmlhttpdel.responseText);
$(".vdo"+vdn).fadeOut(2000);
	$("#backloading").hide();
    }
  }
 xmlhttpdel.open("GET","getallvdos.php?weekno="+wkn+"&dayno="+dyn+"&vdono="+vdn,true);
 xmlhttpdel.send();
}

function addDaytoWeek(wkno)
{
	$("#backloading").show();
	$.ajax({url:"allelement.php?elmnt=day&week="+wkno, success:function(result){
    $(".week"+wkno).prepend(result);
	$("#backloading").hide();
  }});
}

function addVideo(wkno,dyno)
{
	$("#blankscreen").css({"display":"block"});
	$("#backloading").show();
	$.ajax({url:"addvdoform.php?week="+wkno+"&day="+dyno, success:function(result){
			$("#vuploadspace").fadeIn(2000);
    $("#videoform").html(result);
		$("#backloading").hide();
  }});
}

function delSong(id)
{
		$("#backloading").show();
	var song_id = id;
	$.ajax({url:"allmusic.php?song="+song_id, success:function(result){
			$("#backloading").hide();
    $("#delsong"+song_id).html("Deleted");
	$("#delsong"+song_id).css({"background-color":"#EF4E4A"});
	$("#song"+song_id).fadeOut(2000);
  }});
			
}

function uploadVdo()
{
		$("#backloading").show();
	$("#vdoerror").html("Uploading .....");
	$("#adminform").ajaxForm({
						target: '#videoform'
		}).submit();
			$("#backloading").hide();
}

function playVideo(vid)
{
	
	$("#blankscreen").css({"display":"block"});
		$("#backloading").show();
	$("#playing").html("Loading ...");
			$("#playvideo").fadeIn(2000);
	$.ajax({url:"thisvdo.php?vdo_id="+vid, success:function(result){
	
    $("#playing").html(result);
		$("#backloading").hide();
  }});
}


function updateForm(action)
{
	if(action == "username")
	{
		  $(".uploading_msg").show();
		  var data = $("#uname").val();
		$.ajax({
		  type: 'POST',
		  url: 'changeCredits.php',
		  data: "name="+data,
		  success: function(result){
			  			  $(".uploading_msg").hide();
			  $("#current_uname").html(result);
		  },
		  
		});	
	}
	else
	{
		if(action == "password")
		{
			$(".uploading_msg").show();
			  var cur = $("#current_pass").val();
			  var newp = $("#new_pass").val();
			  var conp = $("#new_confirm_pass").val();
			$.ajax({
			  type: 'POST',
			  url: 'changeCredits.php',
			  data: "oldp="+cur+"&newp="+newp+"&cpass="+conp,
			  success: function(result){
					$(".uploading_msg").hide();
					$("#pass_msg").html(result);
					$("#pass_msg").fadeIn(2000);
										
			  },
			  
			});	
		}
	}
}

function checkMusic()
{
	
  		if($("#musicfile").val() != "")
		{
			$(".musci_selection .cancel").show();
			$("#selectsong").attr("disabled","true");
		}
	

}
function emptyMusic()
{
		$("#musicfile").val("");
		$("#selectsong").removeAttr("disabled");
		$(".musci_selection .cancel").hide();
}
function disableMusic()
{
	$("#musicfile").attr("disabled","true");
$(".selection .cancel").css({"float":"right","position":"relative"});
	$(".selection .cancel").show();
}
function emptysMusic()
{
		$("#musicfile").removeAttr("disabled");
		$("#selectsong").removeAttr("selected");
		$(".selection .cancel").hide();
}
function addtip()
{
	
	var tip = $("#ffltip_text").val();
	$("#ffltip_text").val('');
	$("#backloading").show();
		$.ajax({
			  type: 'POST',
			  url: 'addtip.php',
			  data: "tip="+tip+"&type=ffltip",
			  success: function(result){
					$("#alltext").prepend(result);	
					$("#backloading").hide();										
			  },
			  
			});	
}
function addlltip()
{
	
	var tip = $("#ffltip_text").val();
	$("#ffltip_text").val('');
	$("#backloading").show();
		$.ajax({
			  type: 'POST',
			  url: 'addlltip.php',
			  data: "tip="+tip+"&type=lltip",
			  success: function(result){
					$("#alltext").prepend(result);	
					$("#backloading").hide();										
			  },
			  
			});	
}
function deleteTip(elmnt,type)
{
		$.ajax({url:"deletetip.php?tip_id="+elmnt+"&type="+type, success:function(result){
	
		$("#tipno"+elmnt).fadeOut(1000);
  }});
}
function showDelete(elm)
{
	$("#deletetip"+elm).show(1000);
}
function hideDelete(elm)
{
	$("#deletetip"+elm).hide(1000);
}	