<?php    
	include("header.php");

$id = $_GET["id"];

/* build sql statement using form data */
$query ="SELECT * FROM ITEM WHERE CATEGORIES_ID='".$id."'";//'".$ID."'";

/* check the sql statement for errors and if errors report them */
$stmt = oci_parse($connect, $query);

if(!$stmt) {
echo "An error occurred in parsing the sql string.\n";
exit;
}
oci_execute($stmt);
echo '<ul data-role="listview" data-filter="true" data-filter-placeholder="Search fruits..." data-inset="true">';
while(oci_fetch($stmt)) {
echo '<li><a href="item.php?id='.oci_result($stmt,'ITEM_ID').'">'.oci_result($stmt,'NAME').'</a></li>';
}
echo '</ul>';

include("footer.php");
?> 

