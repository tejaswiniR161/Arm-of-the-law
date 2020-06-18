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
                $rnk=$arr[0];
                $plid=$arr[1];
            
        }


//$cid=$_POST['cid'];
$d=date('Y-m-d');
date_default_timezone_set('Asia/Calcutta');
$t=date("h:i:s");

$ca=$_POST['ca'];
$pa=$_POST['pa'];
$dob=$_POST['dob'];
$g=$_POST['g'];
$ph=$_POST['ph'];
$pwd=$_POST['pwd'];
$n=$_POST['n'];
$nr=$_POST['nr'];
$na=$_POST['na'];

if($dob>$d)
{
echo "<script> alert('Date Of Birth Is Invalid! Login And Fill Up Again!!'); </script>";
//header("Refresh:0;url=pldetailsupdate");
header("Refresh:0; url=login.html");
}
else
{			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="UPDATE `policestaffdetails` SET `pl_caddress` = '$ca', `pl_paddress` = '$pa', `pl_dob` = '$dob', `pl_gender` = '$g', `pl_newaccount` = '0', `pl_ph_no` = '$ph', `pl_pwd` = '$pwd', `pl_nomine_name` = '$n', `pl_nominee_address` = '$na', `pl_nominee_relationship` = '$nr' WHERE `policestaffdetails`.`pl_id` = $plid";

            if ($conn->query($sql) === TRUE)
                    {
                    echo "<script> alert('Update Successful!! Login Again And Continue..'); </script>";
                    header("Refresh:0; url=login.html");
                    }
          
                    else
                    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>