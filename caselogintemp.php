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
Case Details
</title>
</head>

<?php
        include 'Mformtemp.php'
?>

<div id="main">
<?php
$cid=$_POST['cid'];
$cid=(int)$cid;
$pwd=$_POST['pwd'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
            $sql="SELECT * from cases where c_id=$cid and c_otp=$pwd";
            $result = $conn->query($sql);  


                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('Wrong Case ID Or Password!'); </script>";
                    header("Refresh:0; url=caselogin.html");
                    $conn->close();
                    }


            else
            {
           
            $conn->close();

            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from cases where c_id=$cid";
            $result = mysql_query($query);

            echo "<table style='margin-left:2cm'>";

            echo "<tr><th align='center' colspan='2'>General Details</th></tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td> Case ID </td><td>" . $row['c_id'] . "</td></tr>";
            echo "<tr><td> Category </td><td>" . $row['c_category'] . "</td></tr>";
            echo "<tr><td> Sub Category </td><td>" . $row['c_sub_category'] . "</td></tr>";
            echo "<tr><td> Current Status </td><td>" . $row['c_cstatus'] . "</td></tr>";
            echo "<tr><td> Police Station ID </td><td>" . $row['c_ps_id'] . "</td></tr>";
            echo "<tr><td> Crime Location </td><td>" . $row['c_crlocation'] . "</td></tr>";
            echo "<tr><td> Date Of Crime </td><td>" . $row['c_crdate'] . "</td></tr>";
            echo "<tr><td> Time Of Crime </td><td>" . $row['c_crtime'] . "</td></tr>";
            echo "<tr><td> Reported Date </td><td>" . $row['c_rdate'] . "</td></tr>";
            echo "<tr><td> Reported Time </td><td>" . $row['c_rtime'] . "</td></tr>";

            $status=$row['c_cstatus_i'];

            if($status>=2 && $status!=6)
                {
                echo "<tr><th align='center' colspan='2'>Clearance Details</th></tr>";
                echo "<tr><td> Cleared On </td><td>" . $row['c_cldate'] . "</td></tr>";
                echo "<tr><td> Cleared At </td><td>" . $row['c_cltime'] . "</td></tr>";
                }

            if($status>=3 && $status!=6)
                {
                echo "<tr><th align='center' colspan='2'>Ongoing Details</th></tr>";
                echo "<tr><td> Ongoing From Date </td><td>" . $row['c_gdate'] . "</td></tr>";
                echo "<tr><td> Ongoing From Time </td><td>" . $row['c_gtime'] . "</td></tr>";
                }

            if($status>=4 && $status!=6)
                {
                echo "<tr><th align='center' colspan='2'>InCourt Details</th></tr>";
                echo "<tr><td> In Court -From Date </td><td>" . $row['c_incourt_frmdate'] . "</td></tr>";
                }

            if($status>=5 && $status!=6)
                {
                echo "<tr><th align='center' colspan='2'>Judgement Details</th></tr>";
                echo "<tr><td> In Court -To Date</td><td>" . $row['c_incourt_todate'] . "</td></tr>";
                echo "<tr><td> Court Judgement </td><td>" . $row['c_court_judgement'] . "</td></tr>";
                echo "<tr><td> Court Judgement To Accused </td><td>" . $row['c_court_acc_judgement'] . "</td></tr>";
                echo "<tr><td> Solved Date </td><td>" . $row['c_solveddate'] . "</td></tr>";
                echo "<tr><td> Solved Time </td><td>" . $row['c_solvedtime'] . "</td></tr>";
                }

            if($status==6)
                {
                echo "<tr><th align='center' colspan='2'>Suspenssion Details</th></tr>";
                echo "<tr><td> Reason </td><td>" . $row['c_sreason'] . "</td></tr>";
                echo "<tr><td> Suspended Date </td><td>" . $row['c_sdate'] . "</td></tr>";
                echo "<tr><td> Suspended Time </td><td>" . $row['c_stime'] . "</td></tr>";
                }

            }

            echo "</table>"; 
            mysql_close(); 

            
        }

?>