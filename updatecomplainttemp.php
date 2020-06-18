<?php
        $cnt=0;

        if (isset($_COOKIE['fcaotl'])) 

        {
            foreach ($_COOKIE['fcaotl'] as $name => $value) 
                {

                $name = htmlspecialchars($name);
                $value = htmlspecialchars($value);
                $arr[$cnt]=$value;
                $cnt=$cnt+1;
                }

            $rank=$arr[0];
            $plid=$arr[1];

            if ($arr[0]==1)
            include 'comnhometemp.php';
            elseif ($arr[0]==2)
            include 'dcphometemp.php';
            elseif ($arr[0]==3)
            include 'acphometemp.php';
            elseif ($arr[0]==4)
            include 'pihometemp.php';
            elseif ($arr[0]==5)
            include 'psihometemp.php';
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
<title>
Update Complaint
</title>
</head>

<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>

<?php
$cid=$_POST['id'];
$cid=(int)$cid;
$sc=$_POST['sc'];
$d=date('Y-m-d');
date_default_timezone_set('Asia/Calcutta');
$t=date("h:i:s"); 
$rn=rand();


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
            $sql="SELECT * from policestaffdetails where pl_id=$plid";
            $result = $conn->query($sql); 


                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $psid=$fdata['pl_ps_id'];
                    }

            $sql="SELECT * from onlinecomplaints where cl_ps_id=$psid and cl_id=$cid";
            $result = $conn->query($sql); 


                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('Complaint Does Not Exist Or You Do Not Have Access To This Complaint'); </script>";
                    header("Refresh:0; url=updatecomplaint.php");
                    $conn->close();
                    }

                    else
                    {
                    $sql="select * from onlinecomplaints where cl_ps_id=$psid and cl_id=$cid";
                    $result = $conn->query($sql); 


                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $ad=$fdata['cl_by_aadhar'];
                    $fn=$fdata['cl_by_fn'];
                    $sn=$fdata['cl_by_sn'];
                    $em=$fdata['cl_by_email'];
                    $ph=$fdata['cl_by_phno'];
                    $add=$fdata['cl_by_address'];
                    $occ=$fdata['cl_by_occupation'];
                    $dob=$fdata['cl_by_dob'];

                    $sql="INSERT into victimdetails values ( NULL,'$ad','$fn','$sn','$em','$ph','$add','$occ','$dob')";

                        if ($conn->query($sql) === TRUE)
                        echo "";
          
                        else
                        echo "Error: " . $sql . "<br>" . $conn->error;

                    $clid=$fdata['cl_id'];
                    $cat=$fdata['cl_category'];
                    $d=$fdata['cl_description'];
                    $psid=$fdata['cl_ps_id'];
                    $acp=$fdata['c_acp_z'];
                    $dcp=$fdata['c_dcp_z'];
                    $ol=$fdata['cl_olocation'];
                    $op=$fdata['cl_opin'];
                    $ot=$fdata['cl_otime'];
                    $od=$fdata['cl_odate'];
                    $rd=$fdata['cl_rdate'];
                    $rt=$fdata['cl_rtime'];

                    $sql="INSERT INTO cases (`c_id`, `c_category`, `c_sub_category`, `c_description`, `c_cstatus`, `c_cstatus_i`, `c_ps_id`,  `c_acp_z`, `c_dcp_z`,`c_crlocation`, `c_crpin`, `c_crdate`, `c_crtime`, `c_rdate`, `c_rtime`, `c_otp` ) VALUES (NULL, '$cat', '$sc', '$d', 'filed', '1', '$psid','$acp','$dcp', '$ol', '$op', '$od', '$ot', '$rd', '$rt', '$rn')";

                    if ($conn->query($sql) === TRUE)
                    echo "";
          
                    else
                    echo "Error: " . $sql . "<br>" . $conn->error;


                    $conn->close();

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

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                    die("Connection failed: " . $conn->connect_error);


            $sql="DELETE FROM `onlinecomplaints` WHERE `onlinecomplaints`.`cl_id` = $clid";

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
            $subject = 'Your Complaint Is registered as FIR';
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
            echo "<script> alert('Complaint Was Updated And The Details Were Sent To The Victim !'); </script>";

            }

            header("Refresh:0; url=backgo.php");

                    }


?>
