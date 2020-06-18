<?php
include 'Mformtemp.php';
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
	alert("Fill Up The Below Details And Your New Account Will Be Ready To Use !");
}
</script>
</head>

<title>Update Profile</title>

<div id="main">

<br/>
<br/>
<br/>
<br/>
<br/>
<form action="pldetailsupdatetemp.php" method="post">
<table style='margin-left:3.5cm'>

<tr><th align="center" colspan="2">Your Details</th></tr>

<tr> <td>Date Of Birth&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="date" name="dob" required/></td> </tr>
<tr> <td>Gender&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="g" required/></td> </tr>
<tr> <td>Current Address&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><textarea name="ca" required> </textarea></td> </tr>
<tr> <td>Permanent Address&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><textarea name="pa" required> </textarea></td> </tr>
<tr> <td>Phone Number&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="ph" required/></td> </tr>
<tr> <td>New Password&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="password" name="pwd" pattern=".{6,}" title="Six or more characters" required/></td> </tr>

<tr><th align="center" colspan="2">Nominee Details</th></tr>

<tr> <td>Name&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="n" pattern="[a-z\A-Z]*" title="Only Alphabets"
required/></td> </tr>
<tr> <td>Relationship&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="nr" pattern="[a-z\A-Z]*" title="Only Alphabets"
 required/></td> </tr>
<tr> <td>Address&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><textarea name="na" required> </textarea></td> </tr>

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

            <input type="submit" value="Update Details" name="ud" />

</form>
</div>