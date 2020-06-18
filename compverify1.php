<?php
include "Mformtemp.php";
?>
<?php

			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $e=$_POST['ve'];
            $rn=rand();

            $sql="INSERT INTO `otps` (`email`, `otp`, `verified`, `pri`) VALUES ('$e', '$rn', '0', NULL);";

             if ($conn->query($sql) === TRUE)
                echo "";
          
            else
                echo "Error: " . $sql . "<br>" . $conn->error;

            $conn->close();


            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $e . '>';
            $subject = 'Verify Your ID';
            $body = "Greetings,\n\n Use the below mentioned OTP to continue your complaint registration \n If it was not you who tried to register the complaint contact your near PS \n OTP : ";
   
            $body .= $rn ."\n\n Good Luck !! \n -Team AOTL";

            $headers = array(
            'From' => $from,
            'To' => $to,
            'Subject' => $subject
                );

        $smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'noreply.armofthelaw@gmail.com',
        'password' => 'armofthelaw100'
    		));

		$mail = $smtp->send($to, $headers, $body);

		if (PEAR::isError($mail)) {
    	echo('<p>' . $mail->getMessage() . '</p>');
		} 
		else 
    	echo "<script> alert('OTP was sent to your email !'); </script>";

    //session_start();
	//$_SESSION['rn'] = $rn;

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
	alert("Enter The OTP That Was Sent To Your email ID To Continue Registration!");
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
<form action="registercomplaint.php" method="post">
<table style='margin-left:3.5cm'>

<tr><th align="center" colspan="2">Verify Your email ID</th></tr>
<tr> <td>Enter OTP&nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="password" name="votp" required/></td> </tr>

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

            <input type="submit" value="Verify OTP" name="sc" />

</form>
</div>