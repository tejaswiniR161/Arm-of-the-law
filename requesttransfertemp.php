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
Transfer Request
</title>
</head>

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

<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>
<?php
$cid=$_POST['cid'];
$cid=(int)$cid;
$r=$_POST['reason'];
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
                
            $sql="SELECT * from allotedcases where c_id=$cid and pl_id=$plid";
            $result = $conn->query($sql); 


                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('Case ID Does Not Exist! Or You Do Not Have Access To The Case'); </script>";
                    header("Refresh:0; url=requesttransfer.php");
                    $conn->close();
                    }


            else
            {
           

            $sql="SELECT * from policestaffdetails where pl_id=$plid";
            $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $psid=$fdata['pl_ps_id'];
                    }

            $sql="SELECT * from policestation where ps_id=$psid";
            $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $acp=$fdata['ps_acp_id'];
                    $dcp=$fdata['ps_dcp_id'];
                    }
            $conn->close();



            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                    die("Connection failed: " . $conn->connect_error);


                $sql = "INSERT INTO `transfer` (`t_id`, `t_c_id`, `t_frm_pl_id`, `t_to_pl_id`, `t_rdate`, `t_tdate`, `t_ttime`, `t_app_pl_id`, `t_reason`, `c_acp_z`, `c_dcp_z`) VALUES (NULL, '$cid', '$plid', NULL, '$d', NULL, NULL, NULL, '$r', '$acp', '$dcp');";

                 if ($conn->query($sql) === TRUE)
                echo "<script> alert('Case Transfer Request Successful!'); </script>";
          
                else
                echo "Error: " . $sql . "<br>" . $conn->error;

                $conn->close();

                header("Refresh:0; url=backgo.php");
        
            }

?>