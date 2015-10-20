<?php
include("header.php");
include("db_info.php");
echo '<div class="panel panel-primary" style="margin-bottom:0px">
  <div class="panel-heading">Adv</div>
  <div class="panel-body"><div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url(\'img/loading.gif\') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
            <div style="display: none;">
                <img data-u="image" src="img/pizzaads.jpg" />
                <div data-u="thumb">Best pizza restaurant!</div>
            </div>
            <div style="display: none;">
                <img data-u="image" src="img/burger.jpg" />
                <div data-u="thumb">Best beef burger!</div>
            </div>
            
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort09-600-45" style="position:absolute;bottom:0px;left:0px;width:600px;height:45px;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #000; filter:alpha(opacity=40.0); opacity:0.4;"></div>
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div data-u="thumbnailtemplate" class="t"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:10px;">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:123px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora05r" style="top:123px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
        <a href="http://www.jssor.com" style="display:none">Jssor Slider</a>
    </div></div>
</div><br />';


/* build sql statement using form data */
$query1 ="SELECT DISTINCT ITEM.ITEM_ID, ITEM.NAME FROM ITEM,wcd_yt_rate WHERE ITEM.ITEM_ID = wcd_yt_rate.id_item AND wcd_yt_rate.rate = 1 and ROWNUM < 10";

/* check the sql statement for errors and if errors report them */
$stmt1 = oci_parse($connect, $query1);

if(!$stmt1) {
echo "An error occurred in parsing the sql string.\n";
exit;
}
oci_execute($stmt1);
//Retrived all categories from database

echo '<div class="panel panel-primary" style="margin-bottom:0px">
<div class="panel-heading">Statistics</div>
  <div class="panel-body">    
  <div id="container">
<div id="left" class="list-group">
  <span class="list-group-item active">
    Top Ten Restaurants
  </span>';
while(oci_fetch($stmt1)) {
echo '
  <a href="item.php?id='.oci_result($stmt1,'ITEM_ID').'" class="list-group-item">'.oci_result($stmt1,'NAME').'</a>'; 
   
  }

/* build sql statement using form data */
$query2 ="SELECT * FROM ITEM WHERE  ROWNUM < 10 order by item_id desc";

/* check the sql statement for errors and if errors report them */
$stmt2 = oci_parse($connect, $query2);

if(!$stmt2) {
echo "An error occurred in parsing the sql string.\n";
exit;
}
oci_execute($stmt2);
echo '</div>
<div id="right" class="list-group">
  <span class="list-group-item active">
    New restaurants
  </span>';
  while(oci_fetch($stmt2)) {
  echo '<a href="item.php?id='.oci_result($stmt2,'ITEM_ID').'" class="list-group-item">'.oci_result($stmt2,'NAME').'</a>';
}
echo '</div>
</div></div>
</div><br />';

/* build sql statement using form data */
$query ="SELECT * FROM categories";

/* check the sql statement for errors and if errors report them */
$stmt = oci_parse($connect, $query);

if(!$stmt) {
echo "An error occurred in parsing the sql string.\n";
exit;
}
oci_execute($stmt);
//Retrived all categories from database
echo '<br /><div class="panel panel-primary"><div class="panel-heading">
    <h3 class="panel-title">Restaurants sections</h3>
    </div>
  <div class="panel-body">
    <ul data-role="listview" data-inset="true" style="margin-top:0px !important;">';
while(oci_fetch($stmt)) {
	echo '<li style="margin-bottom:0px"><a href="category.php?id='.oci_result($stmt,'CATEGORIES_ID').'">        
    '.oci_result($stmt,'TITLE').'
    </a>
    </li>';
}
 echo '</ul>
  </div>
</div>';        
// Close the connection
OCILogOff ($connect);
include("footer.php");

?> hh
