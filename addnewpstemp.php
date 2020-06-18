
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
                $name=$_POST['name'];
                $add=$_POST['add'];
                $pin=$_POST['pin'];
                $em=$_POST['em'];
                $phno=$_POST['phno'];
                $ciid=$_POST['ciid'];
                $acpid=$_POST['acpid'];
                $dcpid=$_POST['dcpid'];
                $acpz=$_POST['acpz'];
                $dcpz=$_POST['dcpz'];

            $sql="INSERT INTO `policestation` (`ps_id`, `ps_name`, `ps_address`, `ps_pin`, `ps_dcp_zone`, `ps_acp_zone`, `ps_ph_no`, `ps_email`, `ps_ci_id`, `ps_acp_id`, `ps_dcp_id`) VALUES (NULL, '$name', '$add', '$pin', '$dcpz', '$acpz', '$phno', '$em', '$ciid', '$acpid', '$dcpid');";

            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('Police Station Details Added Successfuly!'); </script>";
                header("Refresh:0;url=commhome.php");

                } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                    }

            $conn->close();

        
        ?>
