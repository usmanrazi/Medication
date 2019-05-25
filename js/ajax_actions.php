<?php
	
	$link = mysql_connect('mysql51-039.wc2.dfw1.stabletransit.com', '488804_med_trans', 'Tiger123');
	if (!$link) {
		die('Not connected : ' . mysql_error());
	}

	$db_selected = mysql_select_db('488804_med_trans', $link);
	if (!$db_selected) {
		die ('Can\'t use 488804_med_trans : ' . mysql_error());
	}
	if($_POST['action'] == 'combolist_region') {
		combolist_region();	
	}
	function combolist_region() {
		
		$sql = "SELECT * FROM `regions`";
		$query = mysql_query($sql);
		 
		//var_dump( $list;
		$html = '<option selected="selected" value="">Choose Region...</option>';		
	
		while($row =  mysql_fetch_object($query)) {
				$r_id = $row->r_id;
				$r_name = stripslashes($row->r_name);		 
				
				$html .= '<option  value="'.$r_id.'">'.$r_name.'</option>';
			
		}      
		echo $html;
	}

	if($_POST['action'] == 'combolist_potential_medicines') {
		if(!empty($_POST['sel_regions'])) {
			combolist_medicine();
		}
	}
	function combolist_medicine() {
		//session_start();
		if (!isset($_SESSION)){
			session_start();
		}
		$_SESSION['region'] = $_POST['sel_regions'];
		$region_name = "SELECT r_name FROM `regions` WHERE r_id = ".$_POST['sel_regions']."";
		$query_region_name = mysql_query($region_name);
		$row_name =  mysql_fetch_object($query_region_name);
			$r_name = $row_name->r_name;
			$_SESSION['region_name_from'] = $r_name;
		
		$sql = "SELECT * FROM `medicine_region` WHERE r_id = ".$_POST['sel_regions']."";
		$query = mysql_query($sql);
		 
		//var_dump( $list;
		$html = '<option selected="selected" value="">Choose Medicine...</option>';		
	
		while($row =  mysql_fetch_object($query)) {
				$m_id = $row->m_id;
				$medicine_id = $row->id;
				$m_name = stripslashes($row->m_name);		 
				
				$html .= '<option id="'.$medicine_id.'" value="'.$m_id.'">'.$m_name.'</option>';
			
		}      
		echo $html;
	}

	if($_POST['action'] == 'get_medicine_detail') {
		if(!empty($_POST['sel_medicines'])) {
			get_medicine_detail();
		}		
	}
	function get_medicine_detail() {
		if (!isset($_SESSION)){
			session_start();
		}
		
		$_SESSION['medicine'] = $_POST['sel_medicines'];
		$medicine_name = "SELECT m_name FROM `medicine_region` WHERE id = ".$_POST['medicine_id']."";
		$medicine_query = mysql_query($medicine_name);
		$medicine_name_row =  mysql_fetch_object($medicine_query);
			$med_name = $medicine_name_row->m_name;
			$_SESSION['medicine_name'] = $med_name;
			
		
	    $sql = "SELECT * FROM `medicines` where m_id=".$_POST['sel_medicines']."";
		$query = mysql_query($sql);
		 
		//var_dump( $list;		
		$html='';
		while($row =  mysql_fetch_object($query)) {				
				$classification = stripslashes($row->classification);
				$uses = stripslashes($row->uses);
				$side_effects = stripslashes($row->side_effects);
				$precausions = stripslashes($row->precausions);
				$interactions = stripslashes($row->interactions);
				$contraindictions = stripslashes($row->contraindictions);
				$pregnancy = stripslashes($row->pregnancy);						 
				
				$html .= '<tr>
							<td class="table_header">Classification</td>
							<td class="table_detail_td">'.$classification.'</td>
						</tr>
						<tr>
							<td class="table_header">User</td>
							<td class="table_detail_td">'.$uses.'</td>
						</tr>
						<tr>
							<td class="table_header">Side Effect</td>
							<td class="table_detail_td">'.$side_effects.'</td>
						</tr>
						<tr>
							<td class="table_header">Precautions</td>
							<td class="table_detail_td">'.$precausions.'</td>
						</tr>
						<tr>
							<td class="table_header">Interactions</td>
							<td class="table_detail_td">'.$interactions.'</td>
						</tr>
						<tr>
							<td class="table_header">Contradictions</td>
							<td class="table_detail_td">'.$contraindictions.'</td>
						</tr>
						<tr>
							<td class="table_header">Pregnancy</td>
							<td class="table_detail_td">'.$pregnancy.'</td>							
						</tr>';	
		}      
		echo $html;
		
	}

	if($_POST['action'] == 'get_potential_regions') {
		if(!empty($_POST['sel_regions'])) {
			getPotentialRegions();
		}			
	}
	function getPotentialRegions() {
		$sql = "SELECT * FROM `regions` WHERE r_id !=".$_POST['sel_regions']."";
		$query = mysql_query($sql);
		 
		//var_dump( $list;
		$html = '<option selected="selected" value="">Choose Region...</option>';		
	
		while($row =  mysql_fetch_object($query)) {
				$r_id = $row->r_id;
				$r_name = stripslashes($row->r_name);		 
				
				$html .= '<option  value="'.$r_id.'">'.$r_name.'</option>';
			
		}
		echo $html;
	}

	if($_POST['action'] == 'get_region_details') {
		
		if(!empty($_POST['m_id']) && !empty($_POST['sel_potential_regions'])) {
			if (!isset($_SESSION)){
				session_start();
			}
			get_region_details();
		}		
	}
	function get_region_details() {
		
		
		$sql = "SELECT * FROM `medicine_region` WHERE r_id =".$_POST['sel_potential_regions']." AND m_id=".$_POST['m_id']."";
		$query = mysql_query($sql);
		 
		//var_dump( $list;				
		$html='';
		
		//echo count($row);
		$num_rows = mysql_num_rows($query);
		if($num_rows >0){
			$count = 0;
			while($row =  mysql_fetch_object($query)) {
						if($count >0){
							echo ", ";	
						}
						$count+=1;
						echo $m_name = stripslashes($row->m_name);
			}
			echo $html;
		}
	}
	
	if($_POST['action'] == 'get_region_need_name') {
		if(!empty($_POST['regions_need_name'])) {
			getRegionsNeedName();
		}			
	}
	function getRegionsNeedName() {
		$region_need = "SELECT r_name FROM `regions` WHERE r_id =".$_POST['regions_need_name']."";
			//echo $region_need;
			$query_reg_need = mysql_query($region_need);
			$row_reg_need =  mysql_fetch_object($query_reg_need);
			echo $r_name_need = $row_reg_need->r_name;
			
	}

	if($_POST['action'] == 'add_member') {
		if(!empty($_POST['email'])) {
			addNewMember();
		}			
	}
	function addNewMember() {
		$resp = array();
		$sql_check = "SELECT COUNT(email) AS email FROM members WHERE email = '".$_POST['email']."'";
		$query_check = mysql_query($sql_check);
		$row_check =  mysql_fetch_object($query_check);
		if(intval($row_check->email) == 0){
		
			$sql = "INSERT INTO members (email,password) VALUES ('".$_POST['email']."','".$_POST['password']."')";
				
				//$new_member_id = mysql_insert_id();
			if(mysql_query($sql)){
				echo $resp['status'] = 'ok';
			}
			else{
				echo $resp['status'] = 'failed';
			}
		}else{
			echo $resp['status'] = 'error';
		}
		

	}
	
	if($_POST['action'] == 'login_member') {
		if(!empty($_POST['email']) && !empty($_POST['password'])) {
			login_user();
		}			
	}
	function login_user(){
		$resp = array();
		$sql_check = "SELECT * FROM members WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'";
		$query_check = mysql_query($sql_check);
		
		/* echo mysql_num_rows($query_check);
		$row_check =  mysql_fetch_object($query_check);
		$count_row = count($row_check); */
		
		if(mysql_num_rows($query_check) != 0){
			while($fetchresult = mysql_fetch_object($query_check)){
				if (!isset($_SESSION)) {
					session_start();
				} 
				$_SESSION['member_id'] = $fetchresult->id;
				$_SESSION['email'] = $fetchresult->email;

				echo $resp['status'] = 'ok';
			}
		}else{
			echo $resp['status'] = 'error';
		}
	
	}
	if($_POST['action'] == 'save_result') {
		if(!empty($_POST['regions_from']) && !empty($_POST['medicine_name'])) {
			result_save();
		}			
	}
	function result_save(){
		$date = date('Y-m-d H:i:s', time());
		$sql ="INSERT INTO result (member_id,medicine_name,region_name,save_time) VALUES ('".$_POST['member_id']."','".$_POST['medicine_name']."','".$_POST['regions_from']."','".$date."')";
		if(mysql_query($sql)){
			echo 'ok';
		}
		else{
			echo 'failed';
		}
	
	}
	if($_POST['action'] == 'view_result') {
		if(!empty($_POST['member_id'])) {
			view_existing_result();
		}			
	}
	function view_existing_result(){
		$sql = "SELECT * FROM result WHERE member_id = '".$_POST['member_id']."'";
		$query_check = mysql_query($sql);
		if(mysql_num_rows($query_check)== 0){
		   echo "noresult";
		}
		else{
			$html='';
			while($fetchresult = mysql_fetch_object($query_check)) {
				$medicine_name = $fetchresult->medicine_name;
				$region_name = $fetchresult->region_name;
				$save_time = $fetchresult->save_time;
				
				$html .= '<tr>							
							<td>'.$medicine_name.'</td>
							<td>'.$region_name.'</td>
							<td>'.$save_time.'</td>	
						</tr>';
			}
			echo $html;
		}
	}
?>