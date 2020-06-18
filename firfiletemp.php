<?php
$hidval=$_POST['hidden1'];
if ($hidval!=0)
{
  			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            $flag=0;
            $vid=$_POST['hidden1'];
            $vid=(int)$vid;
            $sql="SELECT * from victimdetails where vic_id=$vid";
            $result = $conn->query($sql);

                	if ($result->num_rows > 0) 
                	{
                	echo "<script> alert('Record Was Found!'); </script>";
                	$flag=1;
                	$fdata = $result->fetch_array(MYSQLI_ASSOC);
                	$vemail=$fdata['vic_email'];
                	}

                	else
                	{
                		$conn->close();
                		echo "<script> alert('Record Was NotFound!'); </script>";
                		
                		header("Refresh:0; url=firredirect.php");
                	}

                	if($flag==1)
                	{

             $cc=$_POST['cc'];
             $csc=$_POST['csc'];
             $cd=$_POST['cd'];
             $cl=$_POST['cl'];
             $cpin=$_POST['cpin'];
             $cdate=$_POST['cdate'];
             $ctime=$_POST['ctime'];
             $d=date('Y-m-d');
			 date_default_timezone_set('Asia/Calcutta');
			 $t=date("h:i:s"); 
			 $rn=rand();

             if($cdate>$d)
                die("Crime Date Is Invalid. Case is not registered");

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

            $conn->close();

            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="INSERT INTO cases (`c_id`, `c_category`, `c_sub_category`, `c_description`, `c_cstatus`, `c_cstatus_i`, `c_ps_id`, `c_acp_z`,`c_dcp_z`,`c_crlocation`, `c_crpin`, `c_crdate`, `c_crtime`, `c_rdate`, `c_rtime`, `c_otp` ) VALUES (NULL, '$cc', '$csc', '$cd', 'filed', '1', '$psid','$acp', '$dcp', '$cl', '$cpin', '$cdate', '$ctime', '$d', '$t', '$rn')";

             if ($conn->query($sql) === TRUE)
                echo "";
          
            else
                echo "Error: " . $sql . "<br>" . $conn->error;


            $conn->close();

            echo "<script> alert('Case Registration Is Successful !!'); </script>";

            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                    die("Connection failed: " . $conn->connect_error);


                $sql = "SELECT c_id, c_otp FROM cases order by c_id desc";
                $result = $conn->query($sql);

                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $id=$fdata['c_id'];
                $otp=$fdata['c_otp'];

                $sql = "INSERT into victimcases values(NULL,'$vid','$id')";
                 if ($conn->query($sql) === TRUE)
                echo "";
          
            	else
                echo "Error: " . $sql . "<br>" . $conn->error;

            	$conn->close();


            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $vemail . '>';
            $subject = 'FIR registration successful';
            $body = "Greetings,\n\n Your Case ID and OTP are mentioned below. LogIn under cases menu in the AOTL home page to track your case \n Case ID : ";
            $body .= $id . "\n OTP :";
            $body .= $otp ."\n Victim ID :";
            $body .= $vid ."\n\n Good Luck !! \n -Team AOTL";

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
    echo "<script> alert('Mail was sent to the victim successfully !'); </script>";





    require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $psemail . '>';
            $subject = 'New FIR registered';
            $body = "Greetings,\n\n Case ID of the newly registered case is mentioned \n Case ID : ";
            $body .= $id ."\n\n Good Luck !! \n -Team AOTL";

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
    echo "<script> alert('case details are sent to the police station'); </script>";

                	

header("Refresh:0; url=backgo.php");

}
}




else
{
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
             $ve=$_POST['ve'];
             $vph=$_POST['vph'];
             $vadd=$_POST['vadd'];
             $vo=$_POST['vo'];
             $vdob=$_POST['vdob'];

             if($vdob>$d)
                die("Date Of Birth Is Invalid. Case is not registered");

             $sql="INSERT into victimdetails values ( NULL,'$va','$vfn','$vsn','$ve','$vph','$vadd','$vo','$vdob')";

             if ($conn->query($sql) === TRUE)
                echo "";
          
            else
                echo "Error: " . $sql . "<br>" . $conn->error;

            //$conn->close();

             $cc=$_POST['cc'];
             $csc=$_POST['csc'];
             $cd=$_POST['cd'];
             $cl=$_POST['cl'];
             $cpin=$_POST['cpin'];
             $cdate=$_POST['cdate'];
             $ctime=$_POST['ctime'];
             $d=date('Y-m-d');
			 date_default_timezone_set('Asia/Calcutta');
			 $t=date("h:i:s"); 
			 $rn=rand();

             if($cdate>$d)
                die("Crime Date Is Invalid. Case is not registered");

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

            $conn->close();

            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="INSERT INTO cases (`c_id`, `c_category`, `c_sub_category`, `c_description`, `c_cstatus`, `c_cstatus_i`, `c_ps_id`,  `c_acp_z`, `c_dcp_z`,`c_crlocation`, `c_crpin`, `c_crdate`, `c_crtime`, `c_rdate`, `c_rtime`, `c_otp` ) VALUES (NULL, '$cc', '$csc', '$cd', 'filed', '1', '$psid','$acp','$dcp', '$cl', '$cpin', '$cdate', '$ctime', '$d', '$t', '$rn')";

            if ($conn->query($sql) === TRUE)
                echo "";
          
            else
                echo "Error: " . $sql . "<br>" . $conn->error;


            $conn->close();

            echo "<script> alert('Case Registration Is Successful !!'); </script>";

            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                    die("Connection failed: " . $conn->connect_error);


                $sql = "SELECT c_id, c_otp FROM cases order by c_id desc";
                $result = $conn->query($sql);

                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $id=$fdata['c_id'];
                $otp=$fdata['c_otp'];

                $sql="SELECT vic_id, vic_email from victimdetails order by vic_id desc";
                $result = $conn->query($sql);

                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $vid=$fdata['vic_id'];
                $vemail=$fdata['vic_email'];



                $sql="INSERT INTO victimcases VALUES (NULL,'$vid', '$id')";

             	if ($conn->query($sql) === TRUE)
                echo "";
          
            	else
                echo "Error: " . $sql . "<br>" . $conn->error;

            $conn->close();

            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $vemail . '>';
            $subject = 'FIR registration successful';
            $body = "Greetings,\n\n Your Case ID and OTP are mentioned below. LogIn under cases menu in the AOTL home page to track your case \n Case ID : ";
            $body .= $id . "\n OTP :";
            $body .= $otp ."\n Victim ID :";
            $body .= $vid ."\n\n Good Luck !! \n -Team AOTL";

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
    echo "<script> alert('Mail was sent to the victim successfully !'); </script>";





            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $psemail . '>';
            $subject = 'New FIR registered';
            $body = "Greetings,\n\n Case ID of the newly registered case is mentioned \n Case ID : ";
            $body .= $id ."\n\n Good Luck !! \n -Team AOTL";

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
    echo "<script> alert('case details are sent to the police station'); </script>";

header("Refresh:0; url=backgo.php");
                
                
}
                


?>