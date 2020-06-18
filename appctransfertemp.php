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

$tid=$_POST['tid'];
$newpl=$_POST['newpl'];
$d=date('Y-m-d');
date_default_timezone_set('Asia/Calcutta');
$t=date("h:i:s");
$flaf=0;

			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if($rnk==1)
                {
                $sql="select * from transfer where t_id=$tid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    $flaf=1;

                }

                elseif($rnk==2)
                {
                $sql="select * from transfer where t_id=$tid and c_dcp_z=$plid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    $flaf=1;

                }

                elseif($rnk==3)
                {
                $sql="select * from transfer where t_id=$tid and c_acp_z=$plid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    $flaf=1;

                }


                if($flaf==1)
                {

                    $sql="SELECT * from transfer where t_id=$tid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $cid=$fdata['t_c_id'];
                    $oldpl=$fdata['t_frm_pl_id'];
                    }


                    $sql="SELECT * from allotedcases where pl_id=$oldpl and c_id=$cid ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $casepri=$fdata['pri'];
                    }


                $sql="UPDATE `allotedcases` SET `pl_id` = '$newpl', `ondate` = '$d' WHERE `allotedcases`.`pri` = $casepri";

                if ($conn->query($sql) === TRUE)
                  {
                echo "";
                  }
          
                else
                echo "Error: " . $sql . "<br>" . $conn->error;
                

                $sql="UPDATE `transfer` SET `t_to_pl_id` = '$newpl', `t_tdate` = '$d', `t_ttime` = '$t', `t_app_pl_id` = '$plid' WHERE `transfer`.`t_id` = $tid ";
            

                if ($conn->query($sql) === TRUE)
                  {
            	echo "<script> alert('Case Transfered Successfuly!!'); </script>";
                //header("Refresh:0; url=backgo.php");
                  }
          
                else
                echo "Error: " . $sql . "<br>" . $conn->error;

            $sql="SELECT * from policestaffdetails where pl_id=$newpl";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $newmail=$fdata['pl_email'];
                    //$oldpl=$fdata['t_frm_pl_id'];
                    }

            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $newmail . '>';
            $subject = 'Existing Case Transfered to you';
            $body = "Greetings,\n\n You are assigned with a new case!  \n Case ID : ";
            $body .= $cid ."\n\n Good Luck !! \n -Team AOTL";

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
            echo "<script> alert('Mail was sent to freshly alloted Staff successfully !'); </script>";


            $sql="SELECT * from policestaffdetails where pl_id=$oldpl";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $oldmail=$fdata['pl_email'];
                    //$oldpl=$fdata['t_frm_pl_id'];
                    }

            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $oldmail . '>';
            $subject = 'Your Transfer Request IS Accepted';
            $body = "Greetings,\n\n Your Case Was Transfered To another Staff!  \n Case ID : ";
            $body .= $cid ."\n\n Good Luck !! \n -Team AOTL";

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
            echo "<script> alert('Mail was sent successfully !'); </script>";

                header("Refresh:0; url=backgo.php");
            
        }

                else
                {
                    echo "<script> alert('Transfer ID does not exist or you do not have access to transfer the case !') </script>";
                    header("Refresh:0; url=backgo.php");
                }


            $conn->close();



?>