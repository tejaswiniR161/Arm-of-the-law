<?php
include "Mformtemp.php";

			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


				$otp=$_POST['votp'];
				$otp=(int)$otp;

				$sql = "SELECT * FROM otps order by pri desc";
                $result = $conn->query($sql);

                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $em=$fdata['email'];
                $dbotp=$fdata['otp'];
                
                $sql="SELECT * from otps where email='$em' and otp=$otp";
                $result = $conn->query($sql);

                	if ($result->num_rows > 0) 
                	{
                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                echo "<script> alert('Verification successful !! Fill Up the information below to register your complaint !'); </script>";
                	}

                	else
                	{	

                		echo "<script> alert('Verification Unsuccessful !!'); </script>";
                		header("Refresh:0; url=Mform.html");
                	}
?>
<head>
<style>

table {
    border-collapse: collapse;
    width: 80%;
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

<script>
window.onload=function warn()
{
	alert("Registering a fake complaint is a punishable offence ! Fill Correct Dates And Time Or Else The Registration Will Not Be Successful !");
}
</script>

</head>
<title>Register Complaint</title>

<div id="main">

<form action="registercomplainttemp.php" method="post">
<table style='margin-left:3.5cm'>

<tr><th align="center" colspan="2">Your Details</th></tr>

<tr> <td>Aadhar Number &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="vad" required/></td> </tr>
<tr> <td>First Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vfn" pattern="[a-z\A-Z]*" title="Only Alphabets" required/></td> </tr>
<tr> <td>Second Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vsn" pattern="[a-z\A-Z]*" title="Only Alphabets" required/></td> </tr>
<!--<tr> <td>Email &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="email" name="ve" required/></td> </tr>-->
<tr> <td>Phone Number &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="vph" required/></td> </tr>
<tr> <td>Address &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><textarea name="vadd" required> </textarea></td> </tr>
<tr> <td>Occupation &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vo" required/></td> </tr>
<tr> <td>Date Of Birth &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="date" name="vdob" required/></td> </tr>


<tr><th align="center" colspan="2">Crime Details</th></tr>

<tr> <td>Category &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="cc" required/></td> </tr>
<tr> <td>Description &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><textarea name="cd" required></textarea></td> </tr>
<tr> <td>Location &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="cl" required/></td> </tr>
<tr> <td>Pin Code &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="cpin" required/></td> </tr>
<tr> <td>Date &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="date" name="cdate" required/></td> </tr>
<tr> <td>time &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="time" name="ctime" required/></td> </tr>
</table>
<br/>

			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			
			<input type="reset" value="Clear" />

			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;

            <input type="submit" value="Register Case" name="sc" />

</form>
</div>