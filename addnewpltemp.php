
        <?php


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $rn=rand();
                $fn=$_POST['fn'];
                $sn=$_POST['sn'];
                $rnk=$_POST['rnk'];
                $em=$_POST['em'];
                $dor=$_POST['dor'];
                $psid=$_POST['psid'];
                $acpid=$_POST['acpid'];
                $dcpid=$_POST['dcpid'];

            $sql="INSERT INTO `policestaffdetails` (`pl_id`, `pl_fname`, `pl_sname`, `pl_rank`, `pl_caddress`, `pl_paddress`, `pl_dob`, `pl_gender`, `pl_newaccount`, `pl_email`, `pl_ph_no`, `pl_pwd`, `pl_doj`, `pl_noofcases`, `pl_ps_id`, `pl_acp_zoneid`, `pl_dcp_zoneid`, `pl_nomine_name`, `pl_nominee_address`, `pl_nominee_relationship`) VALUES (NULL, '$fn', '$sn', '$rnk', '', '', '', '', '1', '$em', '', '$rn', '$dor', '0', '$psid', '$acpid','$dcpid', '', '', '')";

            if ($conn->query($sql) === TRUE) {
                echo "";
                } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                    }

            $conn->close();

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                                            }

                $sql = "SELECT pl_id, pl_pwd FROM policestaffdetails order by pl_id desc";
                $result = $conn->query($sql);

                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $id=$fdata['pl_id'];
                $otp=$fdata['pl_pwd'];
                $conn->close();

            require_once "Mail.php";
            $from = '<noreply.armofthelaw@gmail.com>';
            $to='';
            //$to = '<tejaswinigowda161@gmail.com>';
            $to .= '<' .  $em . '>';
            $subject = 'Congrats Your AOTL Acoount Is Ready To Use!';
            $body = "Greetings,\n\n Your ID and OTP are mentioned below. LogIn to provide your complete information and change your password \n Police ID : ";
            $body .= $id . "\n OTP :";
            $body .= $otp ."\n Date Of Reporting :";
            $body .= $dor ."\n\n Good Luck !! \n -Team AOTL";

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
           echo "<script> alert('Addition Of Staff Successful And Mail Was Sent Successfuly!'); </script>";
       header("Refresh:0;url=commhome.php");


        ?>
