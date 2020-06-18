<?php

$as=$_POST['as'];
$ac=$_POST['ac'];
$d=date('Y-m-d');
date_default_timezone_set('Asia/Calcutta');
$t=date("h:i:s");

			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="INSERT INTO `publicannouncements` (`an_subject`, `an_content`, `an_date`, `an_time`) VALUES ('$as', '$ac', '$d', '$t')";
            

            if ($conn->query($sql) === TRUE)
            {
            	echo "<script> alert('Announcement Successful!!'); </script>";
                header("Refresh:0; url=backgo.php");
            }
          
            else
                echo "Error: " . $sql . "<br>" . $conn->error;


            $conn->close();

            


?>