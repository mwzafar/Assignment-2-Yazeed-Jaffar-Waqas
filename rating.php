<?php
include("db_info.php");

$id = $_GET['id'];
$value = $_GET['value'];
$username = $_GET['username'];


        $like_sql = "SELECT COUNT(*)as LIKECOUNT FROM  wcd_yt_rate WHERE USERNAME = '".$username."' and id_item = '".$id."' and rate = 1 "; 
		$stmt1 = oci_parse($connect, $like_sql);
		if(!$stmt1) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt1);
        while(oci_fetch($stmt1)) {
		$like_count = oci_result($stmt1,'LIKECOUNT');
        }		
        
        $dislike_sql = "SELECT COUNT(*)as DISLIKECOUNT FROM  wcd_yt_rate WHERE USERNAME = '".$username."' and id_item = '".$id."' and rate = 2 ";
        $stmt = oci_parse($connect, $dislike_sql);
		if(!$stmt) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt);
        while(oci_fetch($stmt)) {
		$dislike_count = oci_result($stmt,'DISLIKECOUNT');
        }		        
//-----------------------------
$l_sql = "SELECT COUNT(*) AS LIKECOUNT FROM  wcd_yt_rate WHERE id_item = '".$id."' and rate = 1 "; 
		$stmtlike = oci_parse($connect, $l_sql);
		if(!$stmtlike) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmtlike);
        while(oci_fetch($stmtlike)) {
		$l_count = oci_result($stmtlike,'LIKECOUNT');
        }
        $disl_sql = "SELECT COUNT(*)AS DISLIKECOUNT FROM  wcd_yt_rate WHERE id_item = '".$id."' and rate = 2 ";
        $stmtdislike = oci_parse($connect, $disl_sql);
		if(!$stmtdislike) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmtdislike);
        while(oci_fetch($stmtdislike)) {
		$disl_count = oci_result($stmtdislike,'DISLIKECOUNT');
        }
        

  echo '<span id="likecount" class="label label-success">'.$l_count.'</span>
      <span id="dislikecount" class="label label-danger">'.$disl_count.'</span>';
 
 //echo $id.' -----'.$value.'---------'.$username;
//-----------------------------
                
if ($value == "like") {
        if(($like_count == 0) && ($dislike_count == 0)){
			$query = "INSERT INTO wcd_yt_rate (id,id_item, rate, username )VALUES(seq_wcd_yt_rate.NEXTVAL,'".$id."', 1, '".$username."')";
			$stmt = oci_parse($connect, $query);
			if(!$stmt) {
				echo "An error occurred in parsing the sql string.\n";
				exit;
			}
			oci_execute($stmt);
        if($dislike_count == 1){
			$query1 = "UPDATE wcd_yt_rate SET rate = 1 WHERE id_item = '".$id."' and USERNAME = '".$username."'";
			$stmt = oci_parse($connect, $query1);
			if(!$stmt) {
				echo "An error occurred in parsing the sql string.\n";
				exit;
			}
			oci_execute($stmt);            
		}
    }
}    
if($value == "dislike"){
        if(($like_count == 0) && ($dislike_count == 0)){
			$query = "INSERT INTO wcd_yt_rate (id,id_item,rate, username)VALUES(seq_wcd_yt_rate.NEXTVAL,'".$id."', 2, '".$username."')";
			$stmt = oci_parse($connect, $query);
			if(!$stmt) {
				echo "An error occurred in parsing the sql string.\n";
				exit;
			}
			oci_execute($stmt);
		}
		if($like_count == 1){
			$query = "UPDATE wcd_yt_rate SET rate = 2 WHERE id_item = '".$id."' and USERNAME = '".$username."'";
			$stmt = oci_parse($connect, $query);
			if(!$stmt) {
				echo "An error occurred in parsing the sql string.\n";
				exit;
			}
			oci_execute($stmt);
		}
}    
	
?>