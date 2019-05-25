<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Medication Translator Tool</title>
<link rel="stylesheet" href="style.css" type="text/css">
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" >
<?php session_start();?> 
$(function() {
	$("#detail_text").hide();
	document.getElementById('sel_medicines').disabled = true;
	document.getElementById('sel_potential_regions').disabled = true;
	
	fillRegionCombo();	
});

	function fillRegionCombo() {
		var post_data={		
			action:	'combolist_region'					
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
				
					//alert( data);
					$("#sel_regions").html(data);
					
										
				
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
	
	}
	
	function get_medicine_detail() {
		$("#alternative_medicines").hide();
		$('#sel_potential_regions').val('');
		var id = $('#sel_medicines').children(":selected").attr("id");
		var post_data={		
			action:	'get_medicine_detail',
			sel_medicines : $("#sel_medicines").val(),
			medicine_id : id,
		
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
				
					//alert( data);
					$("#home_right_image").hide();
					$("#detail_text").show();
					document.getElementById('sel_potential_regions').disabled = false;
					//$("#detail_text_body").html(data);					
					$("#detail_text_table").html(data);					
				
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
	
	}	
	
	function getPotentialMedicines(value){
		$("#home_right_image").show();
		sel_regions= $('#sel_regions').val();
		m_id=$('#sel_medicines').val();
		getPotentialRegions(sel_regions,m_id);
		document.getElementById('sel_potential_regions').disabled = true;		
		$("#detail_text").hide();
		var post_data={
		
			action:	'combolist_potential_medicines',
			sel_regions: $('#sel_regions').val(),
			m_id:$('#get_potential_medicine').val()
		
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
						
				document.getElementById('sel_medicines').disabled = false;							
				$("#sel_medicines").html(data);							
						
			},
			error:function(){
				// failed request; give feedback to user
				alert('Error occured. Please try again later.');
			}
		});
	}
	
	function getPotentialRegions(value){
		
		
		var post_data={
		
			action:	'get_potential_regions',
			sel_regions: $('#sel_regions').val()
		
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
										
				$("#sel_potential_regions").html(data);					
						
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
			<div class="content">
				<div class="left_colunm">
					<form name="left_col_form" id="left_col_form" method="post">
						<input type="hidden" name="action" value="get_medicine_detail" />							
						<div class="form_row">
							<label for="sel_medicines">I'm in / where medication is from:</label>
							<select name="sel_regions" id="sel_regions" onchange = "getPotentialMedicines(value);" class="sel_medicines">
								<option value="">Choose Region...</option>							
							</select>
						</div><!--form_row-->	
						<div class="form_row">
							<label for="sel_medicines">Medication Name:</label>
							<select name="sel_medicines" id="sel_medicines" onchange = "get_medicine_detail(value,id);" class="sel_medicines">
								<option value="">Choose Medicine ...</option>							
							</select>
						</div><!--form_row-->					
						<div class="form_row">
							<label for="sel_medicines">Where I need my meds / where I will be going to:</label>
							<select name="sel_potential_regions" id="sel_potential_regions" onchange = "window.location.href= 'http://jjtestsite.us/medication_translator_tool/resultpage.php?value='+$(this).val();" class="sel_medicines">
								<option value="">Choose Region ...</option>							
							</select>
							<input type="hidden" id="get_potential_medicine" name="get_potential_medicine">
						</div><!--form_row-->
					
						
					</form>
					
				</div><!--left_colunm-->
				<div class="right_colunm">
					<div class="home_right_image" id="home_right_image">
						<img src="images/home_right_image.png" alt=""/>
					</div>
					<div id="detail_text" class="detail_text_row" style="margin-top: 66px;">														
						<table id="detail_text_table" cellpadding="0" cellspacing="0" border="0" class="mytable" >
							<!--style="width:363px;max-width: 400px;"
								<tr class="table_header">									
									<td>Classification</td>
									
								</tr>
								<tr class="table_header">
									<td>Uses</td>
								</tr>
								<tr class="table_header">
									<td>Side Effects</td>
								</tr>
								<tr class="table_header">
									<td>Precautions</td>
								</tr>
								<tr class="table_header">
									<td>Interactions</td>
								</tr>
								<tr class="table_header">
									<td>Contradictions</td>
								</tr>
								<tr class="table_header">
									<td>Pregnancy</td>
								</tr>
							
							<tbody id="detail_text_body">	
							</tbody>-->
						</table>
					</div><!--detail_text_row-->
					
				</div><!--right_colunm-->
			</div><!--content--><div class="clr"></div>
			
				
		</div><!--wrapper-->
	</div><!--main-->
</body>
</html>
