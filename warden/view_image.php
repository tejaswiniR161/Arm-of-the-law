<style>
table {
    border-collapse: collapse;
    width: 40%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #3b7687;
    color: white;
}
</style>

<br/>
<br/>

<?php
//include 'F:\xampp\htdocs\AOTL\comnhometemp.php';

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("AOTL") or die(mysql_error());

$vid=$_POST['vid'];

$sql = "SELECT * FROM testblob WHERE v_id=".$vid;
$result = mysql_query("$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());

echo "<table style='margin-left:3cm'>";
echo "<tr><th colspan='2' align='center' >Details</th></tr>";
while($row = mysql_fetch_array($result))
{
//header("Content-type: " . $row["image_type"]);
//$op=$row['image'];
//echo $row['image'];

echo "<tr> <td> Name </td> <td> ".$row['v_name']."</td></tr>";
echo "<tr> <td> Address </td> <td> ".$row['v_add']."</td></tr>";
echo "<tr> <td> Phone </td> <td> ".$row['v_phone']."</td></tr>";
echo "<tr> <td> Date </td> <td> ".$row['v_date']."</td></tr>";
echo "<tr> <td> Time </td> <td> ".$row['v_time']."</td></tr>";
echo "<tr> <td> Prisoner Name </td> <td> ".$row['v_pri_name']."</td></tr>";

}

mysql_close($conn);

?>
<br/>
<br/>
<form method="post" action="viewimg.php">
<input style='margin-left:3cm' type="submit" value='Show Image'/>
</form>
