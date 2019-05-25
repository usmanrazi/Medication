<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Medication Translator Tool</title>
<link rel="stylesheet" href="style.css" type="text/css">
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery.v1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>

<!--fancybox-->
<script type="application/javascript" src="js/fancyboxsource/jquery.fancybox.js"></script>
<link href="js/fancyboxsource/jquery.fancybox.css" type="text/css" rel="stylesheet">
<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="js/fancyboxsource/helpers/jquery.fancybox-buttons.css" />
<script type="text/javascript" src="js/fancyboxsource/helpers/jquery.fancybox-buttons.js"></script>

<!--fancybox-->


<script type="text/javascript" >
<?php if (!isset($_SESSION)){
	session_start();
}
if(isset($_SESSION['member_id'])){?>
	$("#save_exisiting_div").show();
	
<?php }else{ ?>
	$("#save_exisiting_div").hide();
<?php } ?>
$(function() {
	getRegionNeedName();
	getRegionDetails();
	$("#view_saved_result").hide();
	
	
	$('#joinform').validate({
		rules: {
			email: {
			  required: true,
			  email: true
			},
			password: "required",
		},
		submitHandler: function() {
			//alert("test");
			doSubmit();
		}
	});
	$('#already_member_form').validate({
		rules: {
			email: {
			  required: true,
			  email: true
			},
			password: "required",
		},
		submitHandler: function() {
			//alert("test");
			login();
		}
	});
});
	
	function getRegionNeedName(){
		
		var post_data={
		
			action:	'get_region_need_name',
			regions_need_name: '<?php echo $_GET['value']; ?>'
		
		};
		
		$.ajax({
			type: 'POST',
			url: './js/ajax_actions.php',
			data: post_data,
			beforeSend:function(){								
			},
			complete: function (o, s) {
				
			},
			success:function(data){					
				//$("#alternative_medicines").show();
				$("#region_need_name_span").html(data);							
				$("#region_need_name_span_second").html(data);							
				$("#region_name_hidden").html(data);							
						
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
	}

	function getRegionDetails(){
		
		var post_data={
		
			action:	'get_region_details',
			sel_potential_regions: '<?php echo $_GET['value']; ?>',
			m_id:'<?php echo $_SESSION['medicine']; ?>'
		
		};
		
		$.ajax({
			type: 'POST',
			url: './js/ajax_actions.php',
			data: post_data,
			beforeSend:function(){								
			},
			complete: function (o, s) {
				
			},
			success:function(data){					
				//$("#alternative_medicines").show();							
				$("#display").html(data);							
						
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
	}
	
	$('.fancybox').fancybox({
		'closeBtn' : false
	});
	function doSubmit(){
		var post_data = $("#joinform").serialize();
		
		$.ajax({
			type: 'POST',
			url: './js/ajax_actions.php',
			data: post_data,
			beforeSend:function(){								
			},
			complete: function (o, s) {
				
			},
			success:function(data){					
				//$("#alternative_medicines").show();							
				//$("#display").html(data);							
					//alert(data);
					if(data == 'ok'){
						alert("Member successfully");
						$.fancybox.close();
					}else if(data == 'error'){
						alert("Email already exist!");
					} 
					else if(data == 'failed'){
						alert("Email Not inserted!");
					} 
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
		
	}
	function login(){
		var post_data = $("#already_member_form").serialize();
		
		$.ajax({
			type: 'POST',
			url: './js/ajax_actions.php',
			data: post_data,
			beforeSend:function(){								
			},
			complete: function (o, s) {
				
			},
			success:function(data){					
				//$("#alternative_medicines").show();							
				//$("#display").html(data);							
					
					if(data == 'ok'){
						alert("Login successful");
						$.fancybox.close();
						window.location.reload(true);
						$("#save_exisiting_div").show();
						//$("#join_already_member_button_div").hide();
					}else if(data == 'error'){
						alert("Cannot log in. Invalid Email or Password.");
					} 
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
		
	}
	
	function save_result(){
		var post_data={
		
			action:	'save_result',
			regions_from: '<?php echo $_SESSION['region_name_from']; ?>',
			medicine_name:'<?php echo $_SESSION['medicine_name']; ?>',
			member_id:'<?php echo $_SESSION['member_id']; ?>'
		};
		
		$.ajax({
			type: 'POST',
			url: './js/ajax_actions.php',
			data: post_data,
			beforeSend:function(){								
			},
			complete: function (o, s) {
				
			},
			success:function(data){					
				if(data == 'ok'){
					alert("Result saved.");
					window.location.href = 'http://jjtestsite.us/medication_translator_tool';
				}else if(data == 'failed'){
					alert("Result not saved.");
				}					
						
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
	
	
	}
	function view_existing_result(){
		var post_data={
		
			action:	'view_result',
			member_id:'<?php echo $_SESSION['member_id']; ?>'
		};
		$.ajax({
			type: 'POST',
			url: './js/ajax_actions.php',
			data: post_data,
			beforeSend:function(){								
			},
			complete: function (o, s) {
				
			},
			success:function(data){					
				if(data == 'noresult'){
					alert("No Result found.");
				}else{
					$("#view_saved_result").show();
					$("#save_result_view").html(data);
				}					
						
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
	
	}
</script>

</head>
<body>
	<div id="main">
		<div class="wrapper">
			<div id="header">							
				<!--<div id="logo">						
					<h1 class="logo"><a href="http://jjtestsite.us/medication_translator_tool/">Medication Translator Tool</a></h1>
				</div>-->
			</div><div class="clr"></div>
			<div class="content" id="alternative_medicine">
				
				<input type="hidden" name="region_name_hidden" id="region_name_hidden">
				<p class="result_display">
					“you are in <?php echo $_SESSION['region_name_from']; ?>, your medication is <?php echo $_SESSION['medicine_name']; ?> and you are traveling to
					<span id="region_need_name_span"></span>.  Then below this
					summarize what "OUR" results are telling them.  In their destination of
					<span id="region_need_name_span_second"></span> this mediation is a, “non-perscription or prescription”
					mediation sold under the name <?php echo $_SESSION['medicine_name']; ?>.  It can also be found under
					the names <span id="display"></span>.<br/><br/>

					The prescription vs Over the counter data will be indicated on the final
					drug data when we submit it to you.
					
				</p>
				<div class="join_already_member_button_div" id="join_already_member_button_div">
					<a href="#joinform" class="fancybox classname join_button">Join Us</a>
					<a href="#already_member" class="fancybox classname already_member_button" >Already a Member</a>
				</div>
				<div id ="join_form" style="display:none;">
					<form id="joinform" name="joinform">
						<input type="hidden" name="action" value="add_member">
						
						<div class="join_header">
							
						</div>
						<div class="popup_content">
							<div class="email_div">
								<span class="join_span_email">Email:</span>
								<input class="email_input" type="text" name="email" id="email" value=""><br/>
							</div>
							<div class="pass_div">
								<span class="join_span_email">Password:</span>
								<input class="email_input" type="password" name="password" id="password"><br/>
							</div>
							<div id="fancy_button_div" class="fancy_button_div_class">
								<input type="submit" class="join_fancy_button join_button" value="Join Now">								
							</div>
						</div><!--popup_content-->	
					</form>
					
					
					
				</div>
				<div id="already_member" style="display:none;">
					<form id="already_member_form" name="already_member_form">
						<input type="hidden" name="action" value="login_member">
						
						<div class="already_member_header">
							
						</div>
						<div class="popup_content">
							<div class="email_div">
								<span class="join_span_email">Email:</span>
								<input class="email_input" type="text" name="email" id="email" value=""><br/>
							</div>
							<div class="pass_div">
								<span class="join_span_email">Password:</span>
								<input class="email_input" type="password" name="password" id="password"><br/>
							</div>
							<div id="fancy_button_div" class="fancy_button_div_class">
								<input type="submit" class="join_button join_fancy_button" value="Login">								
							</div>
						</div><!--popup_content-->		
					</form>
				</div>
				
				<div id="save_exisiting_div" class="save_exisiting_div_class">
					<ul class="save_existing">
						<li>
							<a href="javascript:void(0);" onclick="save_result(this);">Save Result</a>
						</li>
						<li class="last">	
							<a href="javascript:void(0);" onclick="view_existing_result(this);">View Existing Result</a>
						</li>
					</ul>	
					
				</div>
				
				<div id="view_saved_result" class="view_saved_result_class">
				
						<table cellpadding="0" cellspacing="0" border="0" class="mytable" style="">
							<thead>
								<tr class="view_table_head">									
									<th>Medicine Name</th>
									<th>Region Name</th>
									<th>Date & Time</th>
								</tr>
							</thead>
							<tbody id="save_result_view">	
							</tbody>
						</table>
					
					
				</div>
				
			</div><!--content--><div class="clr"></div>
			
				
		</div><!--wrapper-->
	</div><!--main-->
</body>
</html>