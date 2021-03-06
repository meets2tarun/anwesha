<?php
	session_start();
	$referalcode = null;
	//Works to be done by frontend after loading
	$todo  = null;
	$todo_args  = array();
	if(isset($match[1]) && $match[1]=="register") {
		$todo = 'register';
		if(isset($match[2]))
			$referalcode = $match[2];
	}
	else if(isset($match[1]) && $match[1]=="ca") {
		$todo = 'register_ca';
		if(isset($match[2]))
			$referalcode = $match[2];
	}
	else if(isset($match[1]) && $match[1]=="leaderboard")
		$todo = 'leaderboard';

?>
<!DOCTYPE html>
<html >
	<head>
	<!--SEO-->
	<META NAME="Title" CONTENT="Anwesha 2017 IIT Patna">
	<META NAME="Keywords" CONTENT="Anwesha, Anwesha, Anwesha, IIT, IIT Patna, IIT P , IITP, Anwesha Fest, fest, cult, cultural">
	<META NAME="Description" CONTENT="ANWESHA is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Management, Arts and Welfare ...">
	<META NAME="Subject" CONTENT="Anwesha IITP">

		<!-- Latest compiled and minified CSS -->
		<!-- jQuery library -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
		<!-- Latest compiled JavaScript -->
		<!-- To make responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/mobile.css" media="only screen and (max-width: 960px)">
		<link rel="stylesheet" href="assets/css/desktop.css" media="only screen and (min-width: 960px)">
		<meta name="theme-color" content="#e0a772">
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<title>Anwesha '17</title>
<!-- <?php echo $match[2] ;?> -->
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<!-- <script src="//code.jquery.com/jquery-1.12.4.js"></script> -->
		<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		
  <!-- <script src="//code.jquery.com/ui/1.12.0/jquery-ui.js"></script> -->
		<!-- <script src='assets/js/jquery.min.js'></script> -->
		<script src='assets/js/jquery.transit.min.js'></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script>
		$(document).ready(function() {

			var audio = document.getElementById("bgaudio");
 			 audio.volume = 0.2;
		});
		</script>
		 <script type = "text/javascript" language = "javascript">
   			var ev=0;
   			var cl=0;
   			var TEC_CODE = 0;
   			var CULT_CODE = 1;
   			var AnW_CODE = 2;
   			var events_data;
         $(document).ready(function() {
         	$("#regbtn").click(function(){
         		$.getJSON( "register/"+$(this).attr("placeholder")+"/",function(data) {
         			// alert(data['msg']
					$("#modhead").html(data['msg']);
					if(data['status']===true || data['status']==1){

        			$("#modhead").css("color","green");
					$("#myModal").modal();
					} else {

        			$("#modhead").css("color","red");
					$("#myModal").modal();
					}
         		});
         	});
         	var hashloc=location.hash;
         	var urieventid=null;
         	if(hashloc=="#events"){
         	 	$("#clwrap").fadeIn();
            	$(".clubs").fadeIn();
            	$("#intro").hide();
            	$(".window2").fadeIn("slow",toggleli());
            	$(".backbtn").fadeIn();
            	// $("#preloader").hide();
         	 } else if (hashloc.substring(1,6)=="event"){
         	 	 urieventid = hashloc.replace("#event","");
         	 	 // alert(urieventid);
         	 }
			function eve_rulefill(rbookurl){
					
					if(rbookurl=="" || rbookurl==null){
						$("#RuleBtn").attr("href","");
						$("#RuleBtn").hide();
					} else {
						$("#RuleBtn").attr("href",rbookurl);
						$("#RuleBtn").show();
					}
				}
         	
         	function preloadImage(imageurl)
			{
    			var img=new Image();
    			img.src=imageurl;
			}
         	var imgurl;
         	function eve_coverswitch(imgurl){
         		
         		if(imgurl=="" || imgurl==null){
         			$("#eve_cover").css("background-image","");
					// $("#eve_cover").css("box-shadow","0 0 0 #FFFFFF");
         			$("#eve_name").css("font-size","3em");
         			$('#eve_cover').css("height","70px");
         			$("#extrabr").hide();
         		}else{
         			$('#eve_cover').css("height","300px");
         			var ppurl="url(";
         			ppurl +=imgurl;
         			ppurl +=")";
         			$('#eve_cover').css("height","300px");
         			$("#eve_cover").css("background-image",ppurl);
         			if($(window).width()>960){
         			$("#eve_name").css("font-size","5em");}
         			$("#extrabr").show();
         			
         		}
         	}
         	function eve_iconswitch(icourl){
         		if(icourl=="" || icourl==null){
         			$("#eve_icon").hide();
         			
         		}else{
         			$("#eve_icon").show();
         			$("#eve_icon").attr("src",icourl);
				}

         		// $('#eve_icon').attr("src",eve['icon_url']);
         	}
         	function getHTMLText(text) {
         		if(text==null)
         			return "";
         		text = text.replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
				   return '&#'+i.charCodeAt(0)+';';
				});
				text = text.replace(/\n\n/g,"</br></p><p></br>").replace(/\n/g,"</br>");
         		return "<p></br>"+text+"</br></p>";
         	}
         	function emptyresp(){
         		$('#eve_name').text("");
				$('#eve_tagline').text("");
				$('#eve_date').text("");
				$('#eve_time').text("");
				$('#eve_venue').text("");
				$('#eve_organisers').text("");
				$('#eve_short_desc').text("");
				$('#eve_long_desc').text("");
				$('#regbtn').attr("placeholder","");
				
				eve_rulefill("");
				eve_iconswitch("");
				eve_coverswitch("");
				// $('#eve_cover').css("src","");
         	}
         	console.log("Attempt allEvents");	
         	$.get( "allEvents/", function(data, status){
							console.log("Event Status : "+data[0]);

        					if(status=='success'){
    							events_data = data[1];
    							console.log("Events Data Updated");

						//try to preload coverpic and icon pic
						for (var i = 0; i < events_data.length; i++){
						preloadImage(events_data[i]['cover_url']);
						preloadImage(events_data[i]['icon_url']);}

    							    							
    						}
    						else
    							console.log("Unable to get Events Data");
			},"json");
         	var category;
         	var last_sbar_cat=-1;
			function view_sbar(category){ //alert(cl);
				if(last_sbar_cat==category)
					return;
				last_sbar_cat = category;
				if(category == -1) {
					$("#sbl").fadeOut("fadeOut");
					return;
				}
				$("#sbl").fadeOut("fadeOut",function(){
					
					$( "#sbl" ).empty();
					console.log("Event Cleared");
					emptyresp();
					//$( "#sbl" ).append( "<a href='#' class='ph-button ph-btn-green'>Test</a>" );
					
					for (var i = 0; i < events_data.length; i++) {
						if(events_data[i]['code']==category) {
							var e_name = events_data[i]['eveName'];
							var ev_id = events_data[i]['eveId'];

							$( "#sbl" ).append( "<a href='#event"+ev_id+"' data-evid='"+ev_id+"' class='sbl-item ph-button ph-btn-green'>"+e_name+"</a>" );
							console.log("Event Added "+ev_id);
						}
					};

					$("#sbl").fadeIn("slow");


					$(".sbl-item").click(function(){
						window.location.hash = '#'+cat;

						var cat=$(this).attr('data-evid');
						console.log("Event to Display :"+cat);
						//alert("Open "+cat);
						var eve;
						for (var i = 0; i < events_data.length; i++)
						if(events_data[i]['eveId']==cat) {
							console.log("Found");
							eve = events_data[i];
							break;
						}
						
						//Update Event in Frontend

						//Need to Hide if Don't Exists 
						
						$('#eve_name').text(eve['eveName']);
						$('#eve_tagline').html(getHTMLText(eve['tagline']));
						$('#eve_date').text(eve['date']);
						$('#regbtn').attr("placeholder",eve['eveId']);
						$('#eve_time').text(eve['time']);
						$('#eve_venue').html(eve['venue']);
						$('#eve_short_desc').html(getHTMLText(eve['short_desc']));
						$('#eve_long_desc').html(getHTMLText(eve['long_desc']));
						eve_rulefill(eve['rule_url']);
						// $('#eve_icon').attr("src",eve['icon_url']);
						eve_iconswitch(eve['icon_url']);
						// $('#eve_organisers').text(eve['organisers']);
						var orgarr = eve['organisers'];
						$('#eve_organisers').empty();
						if(orgarr!=null){						
							var orgnrs = orgarr.split("#");
							for (i=0;i<orgnrs.length;i++)
							{
								$('#eve_organisers').append("<li>"+orgnrs[i]+"</li><br>");
							}
						orgarr=null;
						orgnrs=null;
						}
						// $('#eve_cover').attr("src",eve['cover_url']);
						eve_coverswitch(eve['cover_url']);
						$("#mainarea").fadeIn();
						$("#mainareaalt").fadeOut();
					});
					
				
				});
			}
			if(urieventid!=null){//alert(urieventid); //kochikame
				// alert(events_data[urieventid]['eveName']);
				$.get( "allEvents/", function(data, status){
							console.log("Event Status : "+data[0]);

        					if(status=='success'){
    							events_data = data[1];
    						}

				for (var i = 0; i < events_data.length; i++)
						if(events_data[i]['eveId']==urieventid) {
							console.log("Found");
							eve = events_data[i];
							break;
						}
						var urieventprcode=eve['code'];
						var evepcat=null;
				for (var i = 0; i < events_data.length; i++)		
						if(events_data[i]['eveId']==urieventprcode) {
							console.log("Found"+events_data[i]['code']);
							eve = events_data[i];
							break;
						}
						evepcat=eve['code'];
						// urieventprcode is the blue tab/club it belongs to
						// alert(urieventprcode);
						console.log(evepcat);
						$(".swingimage").click();
						if(evepcat=="0"){
							cl=0;
							$("[placeholder='tech']").click();	
							console.log("tech");
							// $("[data='"+urieventprcode+"']").click();
						}else if(evepcat=="1"){
							cl=1;
							$("[placeholder='cult']").click();	
							console.log("cult");

						}else if(evepcat=="2"){
							cl=2;
							$("[placeholder='arts']").click();	
							console.log("arts");
							
						}else if(evepcat=="3"){
							
							cl=3;
							console.log("manage");
							$("[placeholder='manage']").click();	
						}
						setTimeout(function(){
								 $("[data='"+urieventprcode+"']").click();
								
							},500);
							setTimeout(function(){
									console.log("Click: [data-evid='"+urieventid+"']");
									$("[data-evid='"+urieventid+"']").click();
								},1000);
				});
			}
         	$.fn.slideFadeToggle  = function(speed, easing, callback) {
        return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
			}; 
         	function toggleli(){
         		$("#leftlist").toggle( "slide");
            	$("#rightlist").toggle( "slide");
         	}
            $("#eventsbtn").click(function(){
            	$("#clwrap").fadeIn();
            	$(".clubs").fadeIn();
            	$("#intro").hide();
            	$(".window2").fadeIn("slow",toggleli());
            	$(".backbtn").fadeIn();
            	$("#preloader").hide();
            });
            $(".swingimage").click(function(){
            	$("#clwrap").fadeIn();
            	$(".clubs").fadeIn();
            	$("#intro").hide();
            	$(".window2").fadeIn("slow",toggleli());
            	$(".backbtn").fadeIn();
            	$("#preloader").hide();
            });
			$(".backbtn").click(function(){
				$("#intro").show();
				$(".backbtn").fadeOut();
				$("#clwrap").fadeOut();
            	$(".clubs").fadeOut();
            	$("#preloader").show();
				
            	if(ev==1){
            		// $(".blankbg ").fadeOut();
            		$(".blankbg ").slideFadeToggle();
            		$(".backbtn2").fadeOut();
            		$(".window2").fadeOut("fast");
					// toggleli();

            	}else{
            		$(".window2").fadeOut("slow",toggleli());
            	}

			});
			$(".mainevent").click(function(){
				
				$("#mainarea").hide();/*to fix initial dummy text display on selecting category*/
				$("#mainareaalt").fadeIn();
				// $(".blankbg ").fadeIn("fast");
				$(".blankbg ").slideFadeToggle();
				$(".backbtn2").fadeIn();
				if(cl==TEC_CODE || cl==CULT_CODE || cl==AnW_CODE ) {
					//For TECH_CODE or CULT_CODE or AnW_CODE
					console.log("Clicked "+cl);
					$( "#navbar" ).empty();
					for (var i = 0; i < events_data.length; i++) {
						if(events_data[i]['code']==cl) {
							//Technical Added
							console.log("Tech or Cult["+cl+"] :"+events_data[i]['eveName']);
							$( "#navbar" ).append( "	<a href='#' data='"+events_data[i]['eveId']+"' class=' navbtn ph-button ph-btn-blue'>"+events_data[i]['eveName']+"</a>" );
						}
					};

					$(".navbtn").click(function(){
						$("#mainarea").fadeOut();
						$("#mainareaalt").fadeIn();
						var cat=$(this).attr('data');
						console.log("Event Code :"+cat);
						view_sbar(cat);
					});

					$("#navbar").css("display","table");
					view_sbar(-1);
					if($(window).width()<960){
						var sbtop=120 + $("#navbar").height();
						var matop=70 + sbtop;
						$("#sidebar").css("top",sbtop);
         				$("#mainarea").css("top",matop);
         				$("#mainareaalt").css("top",matop);
         			}
				} else {
					$("#navbar").hide();
					view_sbar(cl);
					if($(window).width()<960){
						$("#sidebar").css("top","115px");
         				$("#mainarea").css("top","195px");
         				$("#mainareaalt").css("top","195px");
         			}
        			
				}
				ev=1;
				toggleli();
				/*simulating click for default event*/
				// $('#navbar:first').trigger( "click" );
				// $('#sbl:first').delay(500).click();

			});
			$(".backbtn2").click(function(){
				ev=0;
				emptyresp();
				$(".backbtn2").fadeOut();
				// $(".blankbg ").fadeOut();
				 $(".blankbg ").slideFadeToggle();
				toggleli();

			});
			
			// $(".sidebtn").click(function(){
			// 	$("#mainarea").html($(this).attr("placeholder"));
			// });
         });
			
      </script>
 
		<script type="text/javascript">
			$(document).ready(function(){
				jQuery('.numbersOnly').keyup(function () { 
    					this.value = this.value.replace(/[^0-9\.]/g,'');
				});
				<?php 
					if(isset($todo)){
						echo "window.location='#$todo';";
					}
				?>
				$.post("leaderboard/api/",
    						{	},
    						function(data, status){
							var AJAXresponse = data;
        					if(status=='success'){
        						for (i = 0;i<AJAXresponse.length; i++) {
    									$("tbody").append("<tr><td>"+AJAXresponse[i]['name']+"</td><td>"+AJAXresponse[i]['score']+"</td></tr>");
								}

        					}else{

        						}
    			}
    			//,timeout:10000
    			,"json");

    			//ajax for ca
    			$("#submitca").click(function(){ 
        			$("#messagew").fadeOut();

    				
    				//$("#submitca").fadeOut("fast",function(){ 
    					$(".smloader").fadeIn();
    				 //});
    				setTimeout(function(){
    					if( $("#messagew").css("display")=="none"){
					$("#messagew").show();

					$("#messagew").html('A network Issue occured.<br> Please try again.');
    								document.getElementById('messagew').scrollIntoView();
    					$(".smloader").fadeOut();		
    					$("#submitca").fadeIn();	}
				},10000);
				var name=$("#caname").val();
		var email=$("#caemail").val();
		var college=$("#cacollege").val();
		var degree=$("#cadegree").val();
		var city=$("#cacity").val();
		var graduation=$("#cagraduation").val();
		var address=$("#caaddress").val();
		var dob=$("#cadob").val();
		var mobile=$("#camobile").val();
		var sex=$("#casex").val();
		var responsibility=$("#caresponsibility").val();
		var involvement=$("#cainvolvement").val();
		var threethings=$("#cathreethings").val();
		var referalcode=$("#careferalcode").val();
		console.log("Request Send");
		$.post("user/register/CampusAmbassador/",
    						{        						
       						name: name,
        					email: email,
        					college: college,
        					degree: degree,
        					city:city,
        					graduation:graduation,
        					address:address,
        					dob:dob,
        					mobile:mobile,
        					sex:sex,
        					responsibility:responsibility,
        					involvement:involvement,
        					threethings:threethings,
        					referalcode:referalcode
    						},
    						function(data, status){
        					console.log("Response");
        					console.log("Data: " + data + "\nStatus: " + status);
        					if(status=='success'){//$("#myloader").fadeOut();
        					
        					$("#submitca").fadeIn("fast",function(){ 
    							$(".smloader").fadeOut();
    				 		});
        						console.log(data);

        						if(data[0]==1){
        							$("#form_fill").html('<div style="width:100%;"><center></br>Registration Successful</br></br>An activation link has been sent to your email.<br>'+email+'</center></div></br></br>');
        							//$("#messagew").fadeIn();
        							$("#form_fill").css('background','#5FAB22');
        							//$("#form_fill").fadeOut();

        						}else{
        							$("#messagew").fadeIn();
        							$("#messagew").html('<center>'+data[1]+'</center>');
								}
								$('html, body').animate({
								        scrollTop: $("#header").offset().top
								    }, 500);
     
        					}else{//$("#myloader").fadeOut();
        							$("#messagew").fadeIn();
        							$("#messagew").html('An error occured.<br> Please try again.');
        							$('html, body').animate({
								        scrollTop: $("#header").offset().top
								    }, 500);
								    console.log("Failed "+data);

        						}
    			},"json");

			});//regular reg

    			$("#submitreg").click(function(){

    				$("#error").empty();
				//$("#submitreg").fadeOut("fast",function(){ 
    					$(".smloader2").fadeIn();
    			 //});
				setTimeout(function(){
					if($("#error").css("display")=="none"){
					$("#error").show();
					$("#error").html('A network Issue occured.<br> Please try again.');
    								document.getElementById('error').scrollIntoView();
    					$(".smloader2").fadeOut();		
    					$("#submitreg").fadeIn();}
    					// alert('trig');	
				},10000);
				var name=$("#name").val();
				var email=$("#email").val();				
				var college=$("#college").val();
				var mobile=$("#mobilekn").val();
				var dob=$("#datepicker").val();
				var sex=$("#gender").val();
				var city=$("#city").val();
				var refid=$("#refcode").val();
				
				//ajax send
				$.post("user/register/User/",
    						{        						
       						name: name,
        					email: email,
        					college: college,
        					sex:sex,
        					mobile:mobile,
        					email:email,
        					dob:dob,
        					city:city,
        					refcode:refid
    						},
    						function(data, status){
							var AJAXresponse = data;
        					if(status=='success'){
        						$("#submitreg").fadeIn("fast",function(){ 
    							$(".smloader2").fadeOut("fast");
    				 		});
        						if(AJAXresponse[0]==1){
        							$("#boxreg").html('<div style="width:100%"><h1>Registered!<br></h1><br>An activation link has been sent to<br>'+ email+'<br><div>');
        							//$("#error").html('<h1>Registered!</h1>An activation link has been sent to '+ email+'<br>');
        							$("#boxreg").css('background','#5FAB22');
    								document.getElementById('boxreg').scrollIntoView();
								
        							// $("#error").fadeOut();
        						}else{
        							$("#error").fadeIn();
        							$("#error").html(''+AJAXresponse[1]+'');
        							document.getElementById('error').scrollIntoView();
								}
     
        					}else{
        							$("#error").fadeIn();
        							$("#error").html('An error occured.<br> Please try again.');
    								document.getElementById('error').scrollIntoView();
								

        						}
    			},"json");
				
			});
			});
		
		</script>
		<meta property="og:image" content="images/preview.png" />
		<link rel="shortcut icon" href="favicon.ico">
		<style type="text/css">
			#datagrida,.box{
				box-shadow: 0px 0px 30px rgba(255, 255, 255, 0.49);
				overflow-y: auto;
			}

		</style>
	</head>

	<body>
		<div id='userarea'>
			Welcome <span id='userarea_name'></span>!
		</div>
		<script type="text/javascript">
		function checkstackheight(){
			if ($("#back_wood").height()> $(window).height())
				return true;
		}
		function addStackOnBackWood(countwoodstack) {
			if(checkstackheight()){
				$("#contenthere").fadeIn();
				return;
			}
			var $new = $('<div>&nbsp;</div>');
			$new.hide();
			$new.css('background-image', "url('images/wood_plank.jpg')");
			$new.css('height', "64px");
			$new.css('background-position', "0px -"+(countwoodstack*64)+"px");

			
			$('#back_wood').append($new);
			$new.show({'duration':100,'direction': "down",'easing':'swing','complete':function() {
				addStackOnBackWood(countwoodstack+1);
			}});
		}
		function stackWoodStacks() {
			var htmldata="<div id='contenthere'><center><h1 style='font-size:5em;font-family:bebas;text-shadow:0 0 10px #3f8abf'>Sponsors</h1><br><br><h2 style='font-size:3em;font-family:bebas;'>Power sponsor</h2><br><br><p><a href='http://www.rubanpatliputrahospital.com/'><img src='images/sponsors/ruban.png' height='100px'></a><br><br><h2 style='font-size:3em;font-family:bebas;'>Associate sponsor</h2><br><br><br><a href='http://breda.in/abour_us.html'><img id='secondlogo' src='images/sponsors/biharlogo.jpg' ></a><br><br><br><a href='http://www.thomsondigital.com/'><img src='images/sponsors/tdigital.jpg' height='100px'></a></p><br><br><br></center></div>"
			$(".backbtn3").fadeIn();
			// $('#back_wood').empty();
			$("#back_wood").show();
			$("body").css("overflow-y","hidden");
			addStackOnBackWood(0);
			$("#back_wood").append(htmldata);
			
			

		}
		function clearWoodStacks() {
			$("#back_wood").slideUp(500,function(){
				$('#back_wood').empty();
				$("body").css("overflow-y","auto");
			});
			
		}
		
		</script>
		
		<style type="text/css">
		#userarea{
			position:absolute;
			z-index: 1;
			top: 0px;
			right: 0px;
			-moz-border-radius:10px;  /* for Firefox */
			-webkit-border-radius:10px; /* for Webkit-Browsers */
			border-bottom-left-radius: :10px;
			border-top-left-radius: :10px;
			background-color: rgba(255,255,255,0.6);
			color: black;
			padding: 10px;
			padding-right: 15px;
			}
		</style>


		<audio id="bgaudio" style="display: none" autoplay>
  			 <!--<source src="assets/bgaudio.mp3" volume="0.3" type="audio/mpeg">-->
  		</audio>
  		<!-- <div style="width:100%;height: 100%;display: none;background-color: rgba(0,0,0,0.7);" id="teams"> -->
  			
  		<!-- </div> -->
  		<!-- teams section shifted to seperate file as it took up a major part of the index file, making it cumbersome to scroll everytime -->
        <?php include_once('teams.php'); ?>

		<div class="blankbg">
			<div id="bgofblankbg"></div>
			<div class="NavWrap" style="width: 100%;
    z-index: 8;
    background-color: rgba(70, 69, 69, 0.68);box-shadow: 0 0 50px #000000">
			<div id="navbar">
        			<a href='#' data="1" class=' navbtn ph-button ph-btn-blue'>Cat1</a>
        			<a href='#' data=2 class=' navbtn ph-button ph-btn-blue'>Cat2</a>
        			<a href='#' data=3 class=' navbtn ph-button ph-btn-blue'>Cat3</a>
        			<a href='#' data=4 class=' navbtn ph-button ph-btn-blue'>Cat4</a>
			</div></div>
			<div id="sidebar">
				<div class="sblist" id="sbl" style="display:none">
					<a href='#' class='ph-button ph-btn-green'>Event1</a>
        			<a href='#' class='ph-button ph-btn-green'>Event2</a>
        			<a href='#' class='ph-button ph-btn-green'>Event3</a>
        			<a href='#' class='ph-button ph-btn-green'>Event4</a>
				</div>
			</div>
			<div id="mainareaalt" style='color:white'>
			<center>	
				<img src="images/logo.png" alt="" height="200px"><br><br>
				<h1 style="font-family: bebas;font-size: 5em;"><i>Events</i></h1>
			</center>
			</div>
			<div id="mainarea" style='color:white;padding:2em'>
				<center>
			<div id="eve_cover">
				<span id="headwrap" style=""><br><span id="extrabr"><br><br><br><br></span>
				<span id="headwr" style="display: inline">
				<img src="" style="height: 50px;display: inline;" placeholder="Icon" id='eve_icon'>&nbsp;&nbsp;&nbsp;&nbsp;
				<h1 id='eve_name' style="font-size: 5em;display: inline;margin-bottom: 10px;text-shadow: 0 0 10px #29d816">
					Event Name
				</h1></span><br>
				<span id='eve_tagline' style="font-size: 1.5em;margin-bottom: 30px;font-style: italic;">
					Event TagLine
				</span>
				</span>
				</div>
				<!-- <div id="dummyspace" style="width:100%;height:300px"></div> -->
				<br><br><br><span style="font-size: 1.8em">Date:</span>
				<span id='eve_date' style="font-size: 1.8em;">
					DATE
				</span><br><br><span style="font-size: 1.8em">Time:</span>
				<span id='eve_time' style="font-size: 1.8em;">
					TIME
				</span><br><br><span style="font-size: 1.8em">Venue:</span>
				<span id='eve_venue' style="font-size: 1.8em;">
					VENUE
				</span><br><br>
				<div id='eve_organisers_head'>
					<span style="font-size: 1.8em">Organisers :</span>
					<ul id='eve_organisers' type="none" style="font-size: 1.8em">
						<li>Organiser 1 (9741852963)</li>
						<li>Organiser 2 (9852451262)</li>
						<li>Organiser 3 (9965235245)</li>
					</ul>
				</div><br>
				<a href="" id="RuleBtn" target="_blank">Rulebook</a><br>
				<a id="regbtn" placeholder="" >Register for Event</a>

				<br><br>

				<span id='eve_short_desc' style="font-size: 1.5em;">
					Event Short Desc
				</span><br>
				<span id='eve_long_desc' style="font-size: 1.5em;text-align:justify;text-justify: inter-word;">
					Event Long Desc
				</span>
				<br><br><br><br><br><br>


			</center>
			</div>
		</div>
        <div class="window2"></div>
		<div class="window"></div>
		<button class="backbtn">< Back to home</button>
		<button class="backbtn3" onclick="clearWoodStacks();$(this).fadeOut();">< Back to home</button>
		<button class="backbtn2">< Events home</button>
		<div class="sea"></div>
		<div id="clwrap">
			<div class="clubs">
				<ul id="leftlist">
				<a href="#"><li class="mainevent" onclick="cl=1" placeholder="cult">Cultural</li></a>
				<a href="#"><li class="mainevent" onclick="cl=2" placeholder="arts">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arts &amp; Welfare</li></a>
				<!-- <a href="#"><li class="mainevent" onclick="cl=3">NJACK2</li></a> -->
				</ul>
				<ul id="rightlist">
				<a href="#"><li class="mainevent" onclick="cl=0" placeholder="tech">Technical&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li></a>
				<a href="#"><li class="mainevent" onclick="cl=3" placeholder="manage">Management</li></a>
				<!-- <a href="#"><li class="mainevent" onclick="cl=6">NJACK4</li></a> -->

				</ul>

			</div>
		</div>
		<div id='back_wood' style='position:absolute;width:100%;text-align:center;z-index: 4'>
		
			</div>
		<div id="intro">
			
		
			<ul class="links">
				<a href="#login" id="loginbtn" style=""><li>Login</li></a>
				<a  id="logoutbtn" style="display: none"><li>LogOut</li></a>
				<a id='bregister' href="#register"><li>Registration</li></a>
				<a id='bregister_ca' href="#register_ca"><li>Campus Ambassador</li></a>
                <a id='bleaderboard' href="#leaderboard"><li>Campus Ambassador Leaderboard</li></a>
				<a href="#teams" id="teamsbtn" style="display: none"><li>Teams</li></a>
				<a href="#events" id="eventsbtn" style=""><li>Events</li></a>
			    <a href="auditions/"><li>MultiCity</li></a>

			</ul>

            
           
			<div id="date">
				<div id="glass">
					<div id="top"></div>
					<div id="bottom"></div>
					<div id="line"></div>
				</div>
				<div class="text">
					Jan 27 28 29
				</div>
				<div class="hidden">
					bla
				</div>
			</div>
			<div id="swingwrap"><img class="swingimage" src="images/combined.png" /></div>
			
			<img class="sponsimg" alt="sponsors" src="images/spons.png" onclick="stackWoodStacks();" />

		</div>

		<div class="parallelogram">
		<span id="tag" style="position:absolute;bottom:10px;left:10px;font-family:vinque;font-size: 1.7em;">About</span>
			<div class="content">
				<h1>ABOUT ANWESHA</h1><br>
				 <p>ANWESHA is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Management, Arts and Welfare events.</p>
				 <p>Since its genesis in 2010, Anwesha has gained great importance at an exponential rate and enjoys a cult status among the youths of Bihar. Eminent personalities such as chief minister Nitish Kumar, Padma Vibhushan, G. Madhavan Nair, R.K. Sihna (Dolphin Man of India), have been part of Anwesha's extravaganza in the past.</p>
				 <!--<input type='submit' value='Gallery' onclick='popup_gallery();'/>-->
				<br>
				<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/r-qROBBWy5Q" frameborder="0" allowfullscreen></iframe> -->
			</div>
		
		</div>
        
		<button id="expand-navigation" style='visibility:hidden'>-</button>
		<section class="wrapper opened">
		<!--
			<ul>
				<li><a href="#galleryload" onclick="gallery();">Pics</a></li>
				<li><a href="#">Spons</a></li>
				<li><a href="#">Event</a></li>
				<li><a href="#">Social</a></li>
				<li><a href="#">Team</a></li>
			</ul>
		-->
		</section>


		<div class="overlay on-overlay"></div>
		
		<div id="preloader">
			<div class="bg"></div>
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<div class="circle"></div>
			<div class="tagline">
				Think.Dream.Live
			</div>
		</div>

		<div id="register" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Register</h2>
			
				<div id="boxreg" class="box" style="overflow-y:auto; overflow-x:hidden; height:400px;">
				<!--input class="inp"  name="username" type="text" placeholder="Username" onblur="if(this.value == ''){this.value = 'Username';}" onfocus="if (this.value == 'Username') {this.value = '';}"-->
				<!--input class="inp" id="" name="password" type="password" placeholder="Password" onblur="if(this.value == ''){this.value = 'Password';}" onfocus="if (this.value == 'Password') {this.value = '';}"-->
				<input class="inp" name="name" id="name" type="text" placeholder="Full Name" pattern="[a-zA-Z0-9.\s]{4,40}" title='Alpha Numberic Character of 4 to 40 length'>
				<input class="inp" name="phone" type="text" placeholder="Phone" id="mobilekn" pattern="[789][0-9]{9}" title='Valid 10 Digits Mobile Number' >
                <input class="inp" name="email" type="email" placeholder="Email" id="email" title="Invalid Email">
                <input class="inp" name="college" type="text" placeholder="College" id="college" pattern="[a-zA-Z0-9.\s]*" title='Invalid College Name'>
                <input class="inp" id="datepicker" name="DOB" type="text" placeholder="DOB (yyyy-mm-dd)"  pattern="\d{4}-\d{2}-\d{2}" class="datepicker" class="inp"  title="Invalid Date Format(yyyy-mm-dd)"  >
                <input id="gender" placeholder="Sex(M/F)" class="inp"  name="sex" type="text" pattern="[MFmf]" value="" >
				<input id="city" class="inp" name="city" type="text" placeholder="City" patten='^[a-zA-Z0-9.@]*' title="Invalid City" >
				<input id="refcode" class="inp" name="ref" type="text" placeholder="Reference Code(Last 4digits of AnweshaID)" pattern='([0-9]{4})|()' title="Invalid Ref Number" value="<?php if(isset($referalcode)) echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?>>
                <div id="error" style="width:auto;display:none;box-radius:5px;box-shadow:#000000 0 0 10px;background:#6fce2d;padding:20px;font-size:20px;margin:10px">An error occured</div>
                <img src="images/spinner-large.gif" style="width:30px;height:30px;display:none" class="smloader2">
				<input class="button inp" type="submit" id="submitreg" value="Submit" style="width:98%">
			</div>
		</div>

		<div id="register_ca" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Campus Ambassador<br> Registration</h2>

			<div class="box" id="box"><center>
				<div id="message" style="color: red !important;"></div></center>

			<form action="javascript:" method="post" id="form_fill" accept-charset="UTF-8">
				<input placeholder="Full Name" id="caname" class="inp"  name="name" type="text" value="" pattern="[a-zA-Z0-9.\s]{4,40}" title='Alpha Numberic Character of 4 to 40 length'>
				<input placeholder="College" class="inp" id="cacollege" name="college" type="text" value="" pattern="[a-zA-Z0-9.\s]*" title='Invalid College Name'>
				<input placeholder="City" class="inp" id="cacity" name="city" type="text" value="" patten='^[a-zA-Z0-9.@]*' title="Invalid City" >
				<input placeholder="Degree" class="inp" id="cadegree" name="degree" type="text" value="">
				<input placeholder="Year of Graduation" class="inp numbersOnly" id="cagraduation" name="graduation" type="text" value="">
				<textarea placeholder="Address" class="inp" id="caaddress" name="address" rows="10"></textarea>
				<input placeholder="Email" class="inp" id="caemail" name="email" type="email" value="" title="Invalid Email ID">
				<input placeholder="Mobile" class="inp" id="camobile" name="mobile" pattern="[789]\d{9}" title="Invalid Mobile Number" type="text" value="">
				<input placeholder="DOB (yyyy-mm-dd)" class="inp" id="cadob" name="dob" pattern="\d{4}-\d{2}-\d{2}" class="datepicker" class="inp"  title="Invalid Date Format(yyyy-mm-dd)" value="">
				<input placeholder="Sex(M/F)" class="inp" id="casex" name="sex" type="text" pattern="[MFmf]" value="">
				<textarea placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha &lsquo;17." class="inp" id="cathreethings" name="threethings" rows="10"></textarea>
				<textarea placeholder="Have you held any position of responsibility in your college? If yes, please explain." class="inp" id="caresponsibility" name="responsibility" rows="10"></textarea>
				<textarea placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." class="inp" id="cainvolvement" name="involvement" rows="10"></textarea>
				<input placeholder="Refered by someone?(Last 4digits of AnweshaID)" id="careferalcode" name="referalcode" class="inp"  type="text" pattern='([0-9]{4})|()' title="Invalid Ref Number" value="<?php if(isset($referalcode)) echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?> ><br>
				<center><div id="messagew" style="width:auto;display:none;box-radius:5px;box-shadow:#000000 0 0 10px;background:#6fce2d;padding:20px;font-size:20px;margin:10px"></div></center>
				<img src="images/spinner-large.gif" style="width:30px;height:30px;display:none" class="smloader">
				<input id="submitca" class="inp" type="submit" value="Submit">
				
			</form>
			</div>
		</div>

		<div id="login" class="loginlightbox">
			<div class="loginexit"><a onclick="window.location.hash ='#';document.body.style.overflow='visible';" style="cursor: pointer">x</a></div>
			<h2 style="font-size: 2em;" class="loginhead">Login</h2>
			<span id="loginerror" style="color:red;padding:5px;"></span>
			<span id="loginajaxerror" style="color:red;padding:5px;"></span>

				<input class="inp loginname" name="username" type="text" value="AnweshaID"
					onblur="if (this.value == '') {this.value = 'AnweshaID';}"
					onfocus="if (this.value == 'AnweshaID') {this.value = '';}" />
				<input class="inp loginemail" name="username" type="text" style="display: none;" value="emailID"
					onblur="if (this.value == '') {this.value = 'emailID';}"
					onfocus="if (this.value == 'emailID') {this.value = '';}" />					
				<input class="inp loginpswd" name="password" type="password" value="password"
					onblur="if (this.value == '') {this.value = 'password';}"
					onfocus="if (this.value == 'password') {this.value = '';}" /><center>
                <img src="images/spinner-large.gif" style="width:30px;height:30px;display:none" class="logingif"></center>
				<input class="button" type="submit" id="loginsubmit" value="LogIn!"><br>
				<a class="loganchor" placeholder="reset">Reset Password</a><br>
				<a class="loganchor" placeholder="resend">Resend Confirmation mail</a>
			<style>
				.loganchor{
					cursor: pointer;
					font-size: 0.7em;
					padding: 1px !important;
					margin: 1px !important;

				}
			</style>
			<script>
				$(document).ready(function(){
					$("#logoutbtn").click(function(){

        					$.post("logout/",
								{},
								function(data, status){
									console.log("Response");
	                            	console.log("Data: " + data + "\nStatus: " + status);
	                                if(status=='success'){
	                                	if(data['status']==1 || data['status']===true) {
	                                		uilogout();
											$("#modhead").css("color","green");
											$("#logoutbtn").fadeOut();
											$("#loginbtn").fadeIn();
											var isLoggedIn = false;
											var logged_name = "";
											$("#loginbtn").css("display","block");	
	                                	$("#modhead").html(data['msg']);

											$("#myModal").modal();

	                                	} else {
	                                	$("#modhead").html(data['msg']);

											$("#myModal").modal();
                                			$("#modhead").css("color","red");
	                                	}
	                                } else {
	                                	$("#modhead").text("Trouble reaching server");
                                			$("#modhead").css("color","red");
										$("#myModal").modal();
                                			
	                                }
								},"json");
					});
					var onresetpassORresendEmail = function(){$("#loginerror").empty();
					$(".logingif").fadeIn();
					setTimeout(function(){
						$("#loginajaxerror").text("Please Try again");
						$(".logingif").fadeOut();

					},5000);
						console.log("Clicked to "+$(this).attr("placeholder"));
						$("#loginsubmit").fadeOut();
						$(".loginpswd").fadeOut();
						var username=$(".loginname").val();
						if($(this).attr("placeholder")=="resend"){
							$(".loginemail").fadeIn();
							$(".loginname").fadeOut();
							$("[placeholder='reset']").hide();
						var username=$(".loginemail").val();
        						console.log("resend");

						}
						if(username=='' || username==null ){
							if($(this).attr("placeholder") == "reset"){

        						$("#loginerror").text("Please enter emailID used to register to proceed");
        					}else if(username=="AnweshaID" ){
        						$("#loginerror").text("Please enter AnweshaID to proceed");
        					}

						} else{
        					if(!(/^([Aa][Nn][Ww][0-9]{4})$/.test(username)) && $(this).attr("placeholder") != "resend") {
        						$(".loginhead").css("color","yellow");
                        		$(".loginhead").text("Incorrect Anw ID");
        					}else
        					$.post(""+ $(this).attr("placeholder")+"/"+username,
								{

								},
								function(data, status){
									console.log("Response");
	                            	console.log("Data: " + data + "\nStatus: " + status);
	                                if(status=='success'){
										$(".logingif").fadeOut();
	                                	if(data[0]==1) {
	                                		$(".loginpswd").fadeOut();
											
											$(".loginhead").css("color","green");
	                                	} else {
                                			$(".loginhead").css("color","yellow");
	                                	}
	                                	$(".loginhead").text(data[1]);
				        					
	                                }else 
	                                	{	
											$(".logingif").fadeOut();
	                                		$(".loginhead").css("color","yellow");
	                                		$(".loginhead").text("Error!");
	                                	}
				        				
                                 	
								},"json"
								);
        					
        				}
					};
					$(".loganchor").click(onresetpassORresendEmail);
					$("#loginsubmit").click(function(){$("#loginerror").empty();//initiaize error display
						$(".logingif").fadeIn();
						$("#loginsubmit").fadeOut();
						//ajax
						var username=$(".loginname").val();
        				var password=$(".loginpswd").val();
        				if (username=='' || username==null || username=="AnweshaID"){
        					$("#loginerror").text("Username can't be empty / default");
            				$(".logingif").fadeOut();
            				$("#loginsubmit").fadeIn();
        				} else if (password=='' || password ==null || password== "password"){
        					$("#loginerror").text("Password can't be empty / default");
            				$(".logingif").fadeOut();
            				$("#loginsubmit").fadeIn();
        					
        				}else{
        				console.log("Login Data Sent;");
        				console.log("Username : "+ username+"");
        				setTimeout(function(){
						$("#loginajaxerror").text("Please Try again");
						$(".logingif").fadeOut();
            			$("#loginsubmit").fadeIn();

						},5000);
        		$.post("login/",
                            {                    
                            username: username,
                            password: password
                            },
                            function(data, status){
                            console.log("Response");
                            console.log("Data: " + data + "\nStatus: " + status);
                                if(status=='success'){
                                    $(".logingif").fadeOut();
                                    $("#loginsubmit").fadeIn();
                                    console.log(data);


                                    //Post ajax goes here
                                    //callback

                                    //if login succeeds you can use the following  ccommented lines of code:
                                    $("#loginerror").empty();
        							if(data['status']===true || data['status']==1) {
                                    	$(".loginhead").css("color","green");
                                    	uilogin_name(data['name']);
                                    	$("#login").delay(1000).fadeOut(1000,function(){
                                    		window.location.hash ='#';

                                    	});
                                    	$("#login input").fadeOut();
        								$("#loginbtn").fadeOut();
        							} else {
                                    	$(".loginhead").css("color","yellow");
        								
                                    }
                                    $(".loginhead").text(data['msg']);
                                    
        							
     
                                }else{
                                    $(".logingif").fadeOut();
                                    $("#loginsubmit").fadeIn();
                                    $("#loginerror").html('An error occured.<br> Please try again.');
                                    console.log("Failed "+data);

                                }
                        }
        ,"json");}
        		
     
					});
				});
			</script>
		</div>

        <div id="leaderboard" class="lightbox logreg">
            <div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
            <h2>LEADERBOARD</h2>
            <center>
                <div style="width:50%; align-content:center;">
                    <div class="datagrid" id="datagrid_wrap">
                        <div class="datagrid" id="datagrida">

                            <table>
                                <thead><tr><th>Name</th><th>Score</th></tr></thead>
                                <tbody>
                                    

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </center>
        </div>

		<div id="galleryload" class="lightbox">
		</div>

		<script src="assets/js/index.js"></script>	
		<script type="text/javascript">
		var isLoggedIn = false;
		var logged_name = "";

		<?php
		if(isset($_SESSION['user_name'])) {
			echo "logged_name='".$_SESSION["user_name"]."';";
			echo "isLoggedIn= true;";
		}
		?>
		$("#userarea").hide();
		function uilogin() {
			console.log("UI Logged IN : "+logged_name);
			$("#userarea_name").text(logged_name);
			$("#userarea").show("fast");
			isLoggedIn = true;
			$("#loginbtn").hide("fast");
			$("#logoutbtn").show("fast");
			$("#logoutbtn").css("display","block");

		}
		function uilogout() {
			console.log("UI Logged OUT ");
			$("#userarea_name").empty();
			$("#userarea").hide();
			isLoggedIn = false;
			$("#loginbtn").show("fast");
			$("#loginbtn").css("display","block");			
			$("#logoutbtn").hide("fast");

		}
		function uilogin_name(name) {
			logged_name=name;
			uilogin();
		}
		if(isLoggedIn) {
			uilogin();
		}
		function uilogout() {

			console.log("UI Logged Out : "+logged_name);
			isLoggedIn = false;
			$("#loginbtn").show("fast");
			$("#userarea").hide("fast");
		}

		function popup_gallery() {

		}
		
			
		</script>
	 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modhead">Modal Header</h4>
        <a type="button" style="float:right" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
      </div>
      
    </div>
  </div>
	</body>
</html>
