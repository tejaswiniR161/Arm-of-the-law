<?php
//include 'F:\xampp\htdocs\AOTL\comnhometemp.php';

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("AOTL") or die(mysql_error());

$vid=$_POST['vid'];

$sql = "SELECT * FROM testblob WHERE v_id=".$vid;
$result = mysql_query("$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());

while($row = mysql_fetch_array($result))
{

header("Content-type: " . $row["image_type"]);
echo $row["image"];
}

mysql_close($conn);

?>