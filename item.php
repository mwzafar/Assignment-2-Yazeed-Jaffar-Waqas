<?php
    include("db_info.php");
	include("header.php");

$id = $_GET["id"];
//$username = "yaz";
//////////
function percent($num_amount, $num_total) {
        $count1 = $num_amount / $num_total;
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);
        return $count;
    }

        $like_sql = "SELECT COUNT(*) AS LIKECOUNT FROM  wcd_yt_rate WHERE id_item = '".$id."' and rate = 1 "; 
		$stmt1 = oci_parse($connect, $like_sql);
		if(!$stmt1) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt1);
        while(oci_fetch($stmt1)) {
		$like_count = oci_result($stmt1,'LIKECOUNT');
        }
        $dislike_sql = "SELECT COUNT(*)AS DISLIKECOUNT FROM  wcd_yt_rate WHERE id_item = '".$id."' and rate = 2 ";
        $stmt2 = oci_parse($connect, $dislike_sql);
		if(!$stmt2) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt2);
        while(oci_fetch($stmt2)) {
		$dislike_count = oci_result($stmt2,'DISLIKECOUNT');
        }
        
///////////
/* build sql statement using form data */
$query ="SELECT * FROM item WHERE item_id ='".$id."'";

/* check the sql statement for errors and if errors report them */
$stmt = oci_parse($connect, $query);

if(!$stmt) {
echo "An error occurred in parsing the sql string.\n";
exit;
}
oci_execute($stmt);

while(oci_fetch($stmt)) {
echo '<div class="panel panel-primary">
  <div class="panel-heading">'.oci_result($stmt,'NAME').'</div>
  <div class="panel-body">
  
  <!-- List group -->
  <ul class="list-group" style="text-align: left;">
    <li class="list-group-item" style="text-align: center;"><img src="images/'.oci_result($stmt,'IMG').'" alt="..." class="img-rounded">    
    </li>
    <li class="list-group-item"><strong>Description:</strong> '.oci_result($stmt,'DESCRIBE').'</li>
    <li class="list-group-item"><strong>Phone number:</strong> '.oci_result($stmt,'PHONE').'</li>
    <li class="list-group-item"><strong>Website:</strong> <a href="http://'.oci_result($stmt,'WEBSITE').'">'.oci_result($stmt,'WEBSITE').'</a></li>
    <li class="list-group-item"><strong>Rating:</strong> <span id="liketag"><span id="likecount" class="label label-success">'.$like_count.'</span>
    <span id="dislikecount" class="label label-danger">'.$dislike_count.'</span></span></li>
  </ul>';
  
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo '<input type="button" class="btn btn-success" name="like" value="like" id="'.$username.'" onclick="showResult('.$id.',this.value,this.id)" />
    <input type="button" class="btn btn-danger" name="dislike" value="dislike" id="'.$username.'" onclick="showResult('.$id.',this.value,this.id)"/>
    </div>
    </div>';
    
    //order form
    echo '<div class="panel panel-info" >
          <div class="panel-heading" style="text-align: left;">Order form</div>
          <div class="panel-body">  
          <form method="post" action="'.$_SERVER['PHP_SELF'].'?id='.$id.'">
        <input name="title" type="text" placeholder="'.oci_result($stmt,'NAME').'" size="100" disabled/>
        <input name="quantity" type="text" value="1" style="width: 20px"/>
        <div style="text-align: left;" class="dropdown">
          <button style="text-align: left;"  class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Quantity:
            <span class="caret"></span>
          </button>
          <ul name="quantity" class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li>1</li>
            <li>2</li>
            <li>3</li> 
            <li>4</li> 
            <li>5</li> 
            <li>6</li> 
            <li>7</li> 
            <li>8</li> 
            <li>9</li>
            <li>10</li>              
          </ul>
        </div>
        <div style="text-align: left;" class="dropdown">
          <button style="text-align: left;"  class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Choose:
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Delivery</a></li>
            <li><a href="#">Pick up</a></li>            
          </ul>
        </div>
        </div>
        <input name="order" type="submit" class="btn btn-info" value="Place order" />
        </div>
        </form>';
        if(isset($_REQUEST['order'])){
            
            echo 'Your order has been successfully';
		}
		
    //end order form
    
}else{    
    echo '<a href="#popupBasic" data-rel="popup" class="btn btn-success" style="color: white; text-decoration: none;" data-transition="pop">like</a>
    <a href="#popupBasic1" data-rel="popup" class="btn btn-danger" style="color: white; text-decoration: none;" data-transition="pop">dislike</a>
<div data-role="popup" id="popupBasic">
<p> Please log in or register to use this function.</p>
</div>
<div data-role="popup" id="popupBasic1">
<p>Please log in or register to use this function.</p>
</div>
</div>
    </div>';
}   
$title = oci_result($stmt,'NAME');
}


        
  
if(isset($_SESSION['username'])){ 		  
echo '<div class="panel panel-info" >
  <div class="panel-heading" style="text-align: left;">Add comments:</div>
  <div class="panel-body">  
  <form method="post" action="'.$_SERVER['PHP_SELF'].'?id='.$id.'">
<input name="title" type="text" placeholder="'.$title.'" size="100" disabled/>
<textarea name="comment" class="form-control" rows="3">Your comments</textarea>
</div>
<input name="send" type="submit" class="btn btn-info" value="send" />
</div>
</form>';
}else
{
echo '<div class="panel panel-info" >
  <div class="panel-heading" style="text-align: left;">Add comments:</div>
  <div class="panel-body">    
<input name="title" type="text" placeholder="'.$title.'" size="100" disabled/>
<textarea name="comment" class="form-control" rows="3">Your comments</textarea>
</div>
<a href="#popupBasic2" data-rel="popup" class="btn btn-info" style="color: white; text-decoration: none;" data-transition="pop">send</a>
<div data-role="popup" id="popupBasic2">
<p>Please log in or register to use this function.</p>
</div>
</div>';
}

if(isset($_REQUEST['send'])){
    if($_REQUEST['comment'] != null){
        $comment = $_REQUEST['comment'];
        $query = "INSERT INTO COMMENTS (id,id_item, user_comment, username )VALUES(seq_comment.NEXTVAL,'".$id."', '".$comment."', '".$username."')";
			$stmt = oci_parse($connect, $query);
			if(!$stmt) {
				echo "An error occurred in parsing the sql string.\n";
				exit;
			}
			oci_execute($stmt);
    }
}

$query_comment ="SELECT * FROM COMMENTS WHERE id_item ='".$id."' ORDER BY id desc";

/* check the sql statement for errors and if errors report them */
$stmt = oci_parse($connect, $query_comment);

if(!$stmt) {
echo "An error occurred in parsing the sql string.\n";
exit;
}
oci_execute($stmt);
while(oci_fetch($stmt)) {
echo '
<div class="panel panel-warning">
  <div style="text-align: left;" class="panel-heading">'.oci_result($stmt,'USERNAME').'</div>
  <div class="panel-body"> 
        '.oci_result($stmt,'USER_COMMENT').'
      </div>
</div>';
} ;


include("footer.php");
?>

