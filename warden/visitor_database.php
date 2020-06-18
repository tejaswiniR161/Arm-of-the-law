<head>
<style>

table {
    border-collapse: collapse;
    width: 60%;
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

p {
	margin-left:3.5cm;
}

</style>
<script>

</script>
</head>
<title>Visitor Details</title>

<div id="main">

<br/>
<br/>
<br/>
<br/>
<br/>
<form action="view_image.php" method="post">
<?php

		
	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("AOTL") or die(mysql_error());

	
	
	$strQuery = "SELECT * FROM testblob ";
	$rsrcResult = mysql_query($strQuery) or die(mysql_error());
	

?>
<table style='margin-left:3.5cm'>
<tr><th align="center" colspan="2">Visitor ID <?php 
$result = mysql_query("SELECT * FROM testblob");
	$rows = mysql_num_rows($result);

	echo "(Record Count : " . $rows.")";
?></th></tr> 
	<?php
		 
		
		 while ($row = mysql_fetch_array($rsrcResult) )
		 {
			 echo "<tr><td>".$row['v_id']."</tr></td>";
		 }
			

	
	?>
</table>
<table style='margin-left:3.5cm'>

<tr><th align="center" colspan="2">Search By Visitor ID</th></tr>
<tr> <td>Enter Visitor ID&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vid" required/></td> </tr>

</table>
<br/>

			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			
			
			<input type="reset" value="Reset" />

			
            <input type="submit" value="Submit" id="Submit" required/ >

</form>
</div>




