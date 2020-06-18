<?php
include 'Mformtemp.php';

echo "<div id='main'>";

$vdob=$_POST['vdob'];
$cdate=$_POST['cdate'];
$ctime=$_POST['ctime'];
$d=date('Y-m-d');
date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:s"); 

echo "<br/><br/>";

if($vdob>$d)
	die("Date Of Birth Is Invalid. Case is not registered");
if($cdate>$d)
	die("Crime Date Is Invalid. Case is not registered");
//if($ctime>$time)
	//die("Crime Time Is Invalid. Case is not registered");

?>
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


<?php

$acp=0;
$dcp=0;
$psid=0;

			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

             $va=$_POST['vad'];
             $vfn=$_POST['vfn'];
             $vsn=$_POST['vsn'];
             $sql = "SELECT * FROM otps order by pri desc";
                $result = $conn->query($sql);
                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $ve=$fdata['email'];

             //$ve=$_POST['ve'];
             $vph=$_POST['vph'];
             $vadd=$_POST['vadd'];
             $vo=$_POST['vo'];
             $vdob=$_POST['vdob'];


             $cc=$_POST['cc'];
             //$csc=$_POST['csc'];
             $cd=$_POST['cd'];
             $cl=$_POST['cl'];
             $cpin=$_POST['cpin'];
             $cdate=$_POST['cdate'];
             $ctime=$_POST['ctime'];
             $d=date('Y-m-d');
			 date_default_timezone_set('Asia/Calcutta');
			 $t=date("h:i:s"); 


			 $sql="SELECT ps_id, ps_email, ps_dcp_id, ps_acp_id from policestation where ps_pin=$cpin ";

             $result = $conn->query($sql);

                	if ($result->num_rows > 0) 
                	{
                	$fdata = $result->fetch_array(MYSQLI_ASSOC);
                	$psid=$fdata['ps_id'];
                	$psemail=$fdata['ps_email'];
                    $dcp=$fdata['ps_dcp_id'];
                    $acp=$fdata['ps_acp_id'];
                	}

              $sql="INSERT INTO `onlinecomplaints` (`cl_id`, `cl_by_fn`, `cl_by_sn`, `cl_by_phno`, `cl_by_email`, `cl_by_aadhar`, `cl_by_address`, `cl_by_occupation`, `cl_by_dob`, `cl_category`, `cl_description`, `cl_olocation`, `cl_opin`, `cl_ps_id`, `c_acp_z`, `c_dcp_z`, `cl_otime`, `cl_odate`, `cl_rdate`, `cl_rtime`) VALUES (NULL, '$vfn', '$vsn', '$vph', '$ve', '$va', '$vadd', '$vo', '$vdob', '$cc', '$cd', '$cl', '$cpin', '$psid', '$acp', '$dcp', '$ctime', '$cdate', '$d', '$t')";

              if ($conn->query($sql) === TRUE)
                echo "";
          
              else
                echo "Error: " . $sql . "<br>" . $conn->error;

            echo "<script> alert('Complaint Registration Successful !!'); </script>";

            echo "<table style='margin-left:5cm'>";

            echo "<th> Complaint Registration Was Successful! </th>";

            echo "</table>";


            $sql="SELECT cl_id, cl_by_email from onlinecomplaints order by cl_id desc";
                $result = $conn->query($sql);

                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $clid=$fdata['cl_id'];
                $cleid=$fdata['cl_by_email'];

            $conn->close();

            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $cleid . '>';
            $subject = 'Complaint registration successful';
            $body = "Greetings,\n\n Your Complaint ID is mentioned below.  \n Complaint ID : ";
            
            $body .= $clid ."\n\n Good Luck !! \n -Team AOTL";

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
			} else 
    		echo "<script> alert('Complaint ID was sent to your email ID!'); </script>";


    		require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $psemail . '>';
            $subject = 'New Complaint registered Online';
            $body = "Greetings,\n\n Complaint ID of the newly registered complaint is mentioned \n Complaint ID : ";
            $body .= $clid ."\n\n Good Luck !! \n -Team AOTL";

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
			} else 
    		echo "<script> alert('Police Staton received your complaint details !'); </script>";




?>

