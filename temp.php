
<html> 

	<style>
	table
	{
			border-collapse: collapse;
	}
	
	table, th, td 
	{
    border: 1px solid black;
    font-style: "Myriad Pro";
    font-size:large;
	text-align:center;
	}

	</style>
	<link rel='stylesheet' type='text/css' href='Style/SubFormStyle.css' />
	<body> 
	<div id='container'>
    <div id='menu'>
        &nbsp;<br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <a href="announcementsshow.php">ANNOUNCEMENTS</a>
        <br />
        <br />
        <a href="comp.php">REGISTER COMPLAINT</a>
        <br />
        <br />
        <a href="caselogin.html">CASES</a>
        <br />
        <br />
        <a href="stat.html">STATISTICS</a>
        <br />
        <br />
        <a href="lawandorder.html">LAW AND ORDER</a>
        <br />
        <br />
        <a href="ContactUs.html">CONTACT US</a>
        <br />
        <br />
        <a href="findtry.html">FIND YOUR STATION</a>
        <br />
        <br />
        <a href="FAQ.html">FAQ</a>
        <br />
        <br />
        <a href="about.html">ABOUT</a>
        <br />
        <br />
        <div id='main'> 
        <br/>
        <u><a style="align:right;font-size:medium;" href="findtry.html">Back</a></u>
        <p>
        <h2>Police Station Details : </h2>
        <br/>
        <table height='15%' width='90%'>
        <tr>
        <th>PS Name</th>
        <th>PS Address</th>
        <th>PS Phone</th>
        </tr>


<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aotl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$spin=$_POST['ipin'];
$sfpin=(int)$spin;
//$sql = "SELECT ps_name, ps_address, ps_ph_no FROM policeStation WHERE ps_pin='sfpin'";
$sql="SELECT ps_name, ps_address, ps_ph_no from policestation where ps_pin=$sfpin";
$result = $conn->query($sql);

		$fdata = $result->fetch_array(MYSQLI_ASSOC);
		/*print "<tr>
			<td align=center>.$fdata['ps_name'].</td>
            <td align=center>.$fdata['ps_address'].</td>
            <td align=center>.$fdata['ps_ph_no'].</td>
            </tr>";*/
        //echo "name: " . $fdata["ps_name"]. " - pwd: " . $fdata["ps_address"]. " " . "<br>";
 		echo "<tr><td>"; 
  		echo $fdata['ps_name'];
  		echo "</td><td>";   
  		echo $fdata['ps_address'];
  		echo "</td><td>";    
  		echo $fdata['ps_ph_no'];
  		echo "</td></tr>";  
$conn->close();

?>
		</table>
        </p>
        <hr/>
        <br/>
        <br/>
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=zPrN9GbJ7t20.kJdNKKlGPBJE" height="50%" width="90%" height="480"></iframe>
        </div>
        </div>
        </div>
        </body> 
        </html>
