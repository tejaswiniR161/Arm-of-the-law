<?php
include "Mformtemp.php";
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
	alert("Registering a fake complaint is a punishable offence ! Verify Your email ID To Continue With Registration of Your Complaint !!");
}
</script>
</head>
<title>Register Complaint</title>

<div id="main">

<br/>
<br/>
<br/>
<br/>
<br/>
<form action="compverify1.php" method="post">
<table style='margin-left:3.5cm'>

<tr><th align="center" colspan="2">Verify Your email ID</th></tr>
<tr> <td>Your Email ID&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="email" name="ve" required/></td> </tr>

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

            <input type="submit" value="Send OTP" name="sc" />

</form>
</div>