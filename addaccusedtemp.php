<?php
$hidval=$_POST['hidden1'];
//session_start();
//$cid=$_POST['cid'];
$cid=$_POST['caseid'];
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
            $sql="SELECT * from accuseddetails where acc_id=$vid";
            $result = $conn->query($sql);

                	if ($result->num_rows > 0) 
                	{
                	echo "<script> alert('Record Was Found!'); </script>";
                	$flag=1;
                	$fdata = $result->fetch_array(MYSQLI_ASSOC);
                	$vemail=$fdata['acc_email'];
                	}

                	else
                	{
                		$conn->close();
                		echo "<script> alert('Record Was Not Found!'); </script>";
                		
                		header("Refresh:0; url=addaccused.php");
                	}

                	if($flag==1)
                	{

             $d=date('Y-m-d');
			 date_default_timezone_set('Asia/Calcutta');
			 $t=date("h:i:s"); 


                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                    die("Connection failed: " . $conn->connect_error);


                $sql = "INSERT into victimcases values(NULL,'$vid','$cid')";
                 if ($conn->query($sql) === TRUE)
                echo "<script> alert('Addition of Accused Successful!'); </script>";
          
            	else
                echo "Error: " . $sql . "<br>" . $conn->error;

            	$conn->close();

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

             $sql="INSERT into accuseddetails values ( NULL,'$va','$vfn','$vsn','$ve','$vph','$vadd','$vo','$vdob')";

             if ($conn->query($sql) === TRUE)
             {
                echo "<script> alert('Addition of Accused Successful!'); </script>";
                //header("Refresh:0; url=backgo.php");
             }
          
            else
                echo "Error: " . $sql . "<br>" . $conn->error;

            //$conn->close();

//header("Refresh:0; url=backgo.php");       

                $sql="SELECT acc_id from accuseddetails order by acc_id desc";
                $result = $conn->query($sql);

                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $vid=$fdata['acc_id'];
                //$vemail=$fdata['vic_email'];



                $sql="INSERT INTO accusedcases (`acc_id`, `c_id`) VALUES ('$vid', '$cid')";

                if ($conn->query($sql) === TRUE)
                {
                echo "";
                header("Refresh:0; url=backgo.php");
                }
          
                else
                echo "Error: " . $sql . "<br>" . $conn->error;

            $conn->close();         
}
                


?>