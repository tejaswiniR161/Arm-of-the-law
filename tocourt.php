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

$cid=$_POST['cid'];
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
                $sql="select * from cases where c_id=$cid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $flaf=1;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi<3 || $csi>3)
                      {
                        $flaf=2;
                      }
                    }

                }

                elseif($rnk==2)
                {
                $sql="select * from cases where c_id=$cid and c_dcp_z=$plid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $flaf=1;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi<3 || $csi>3)
                      {
                        $flaf=2;
                      }
                    }

                }

                elseif($rnk==3)
                {
                $sql="select * from cases where c_id=$cid and c_acp_z=$plid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0)
                    {
                    $flaf=1;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi<3 || $csi>3)
                      {
                        $flaf=2;
                      }
                    } 

                }

                elseif($rnk==4)
                {

                    $sql="SELECT * from policestaffdetails where pl_id=$plid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $psid=$fdata['pl_ps_id'];
                    //$oldpl=$fdata['t_frm_pl_id'];
                    }


                $sql="select * from cases where c_id=$cid and c_ps_id=$psid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $flaf=1;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi<3 || $csi>3)
                      {
                        $flaf=2;
                      }
                    }

                }

                if($flaf==1)
                {

                    $sql="UPDATE `cases` SET `c_cstatus` = 'In Court', `c_cstatus_i` = '4', `c_incourt` = '1', `c_incourt_frmdate` = '$d' WHERE `cases`.`c_id` = $cid ";

                    if ($conn->query($sql) === TRUE)
                    {
                    echo "<script> alert('Added To InCourt Successful!!'); </script>";
                    
                    }
          
                    else
                    echo "Error: " . $sql . "<br>" . $conn->error;

                    $sql="SELECT * from victimcases where c_id=$cid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $vid=$fdata['vic_id'];
                    //$oldpl=$fdata['t_frm_pl_id'];
                    }

                    $sql="SELECT * from victimdetails where vic_id=$vid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $vmail=$fdata['vic_email'];
                    //$oldpl=$fdata['t_frm_pl_id'];
                    }

            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $vmail . '>';
            $subject = 'Your Case Is Cleared';
            $body = "Greetings,\n\n Your Case Is Sent To Court. check under cases menu in AOTL home page to know more!  \n Case ID : ";
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
            echo "<script> alert('Mail was sent to victim successfully !'); </script>";

            header("Refresh:0; url=updatecasedetails.php");
               
            


                }

                elseif($flaf==2)
                {
                    echo "<script> alert('Case Is Already In Court Or Is Not Cleared!!'); </script>";
                    header("Refresh:0; url=updatecasedetails.php");

                }

                elseif($flaf==0)
                {
                    echo "<script> alert('Case Does Not Exist Or You Do Not Have Permission To Change The Case Details!!'); </script>";
                    header("Refresh:0; url=updatecasedetails.php");

                }

                $conn->close();

?>