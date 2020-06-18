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
Suspend Request
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
                    header("Refresh:0; url=requestsuspend.php");
                    $conn->close();
                    }


            else
            {
           
            $conn->close();

            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                    die("Connection failed: " . $conn->connect_error);


                $sql = "UPDATE `cases` SET `c_s_r` = '1', `c_s_pl_id` = '$plid', `c_sreason` = '$r' WHERE `cases`.`c_id` = $cid ";

                 if ($conn->query($sql) === TRUE)
                echo "<script> alert('Request Successful!'); </script>";
          
                else
                echo "Error: " . $sql . "<br>" . $conn->error;

                $conn->close();

                header("Refresh:0; url=backgo.php");
        
            }

?>