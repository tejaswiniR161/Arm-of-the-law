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
Search For Cases
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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                if($rank==1)
                {
            $sql="SELECT * from cases where c_id=$cid";
            $result = $conn->query($sql);
                }
                elseif($rank==2)
                {
            $sql="SELECT * from cases where c_id=$cid and c_dcp_id=$plid";
            $result = $conn->query($sql);  
                }
                elseif($rank==3)
                {
            $sql="SELECT * from cases where c_id=$cid and c_acp_id=$plid";
            $result = $conn->query($sql);  
                }

                elseif($rank==4)
                {
            $sql="SELECT * from allotedcases where c_id=$cid and pl_id=$plid";
            $result = $conn->query($sql);  
                }

                elseif($rank==5)
                {
            $sql="SELECT * from allotedcases where c_id=$cid and pl_id=$plid";
            $result = $conn->query($sql);  
                }


                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('Wrong Case ID! Or You Do Not Have Access To The Case Details'); </script>";
                    header("Refresh:0; url=casedetails.php");
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

            echo "<tr><th align='center' colspan='2' style='color:white'>General Details</th></tr>";

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
                echo "<tr><th align='center' colspan='2' style='color:white'>Clearance Details</th></tr>";
                echo "<tr><td> Cleared On </td><td>" . $row['c_cldate'] . "</td></tr>";
                echo "<tr><td> Cleared At </td><td>" . $row['c_cltime'] . "</td></tr>";
                echo "<tr><td> Cleared By </td><td>" . $row['c_cl_pl_id'] . "</td></tr>";
                }

            if($status>=3 && $status!=6)
                {
                echo "<tr><th align='center' colspan='2' style='color:white'>Ongoing Details</th></tr>";
                echo "<tr><td> Ongoing From Date </td><td>" . $row['c_gdate'] . "</td></tr>";
                echo "<tr><td> Ongoing From Time </td><td>" . $row['c_gtime'] . "</td></tr>";
                }

            if($status>=4 && $status!=6)
                {
                echo "<tr><th align='center' colspan='2' style='color:white'>InCourt Details</th></tr>";
                echo "<tr><td> In Court -From Date </td><td>" . $row['c_incourt_frmdate'] . "</td></tr>";
                }

            if($status>=5 && $status!=6)
                {
                echo "<tr><th align='center' colspan='2' style='color:white'>Judgement Details</th></tr>";
                echo "<tr><td> In Court -To Date</td><td>" . $row['c_incourt_todate'] . "</td></tr>";
                echo "<tr><td> Court Judgement </td><td>" . $row['c_court_judgement'] . "</td></tr>";
                echo "<tr><td> Court Judgement To Accused </td><td>" . $row['c_court_acc_judgement'] . "</td></tr>";
                echo "<tr><td> Solved Date </td><td>" . $row['c_solveddate'] . "</td></tr>";
                echo "<tr><td> Solved Time </td><td>" . $row['c_solvedtime'] . "</td></tr>";
                }

            if($status==6)
                {
                echo "<tr><th align='center' colspan='2' style='color:white'>Suspenssion Details</th></tr>";
                echo "<tr><td> Suspended By Police ID</td><td>" . $row['c_s_pl_id'] . "</td></tr>";
                echo "<tr><td> Reason </td><td>" . $row['c_sreason'] . "</td></tr>";
                echo "<tr><td> Susspension Approved By </td><td>" . $row['c_s_app_pl_id'] . "</td></tr>";
                echo "<tr><td> Suspended Date </td><td>" . $row['c_sdate'] . "</td></tr>";
                echo "<tr><td> Suspended Time </td><td>" . $row['c_stime'] . "</td></tr>";
                }

            }

            echo "</table>"; 
            mysql_close(); 

            if($status<=4)
            {
            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from allotedcases where c_id=$cid";
            $result = mysql_query($query);

            echo "<br/> <br/>";
            echo "<table style='margin-left:2cm'>";

            echo "<tr> <th style='color:white'> Alloted Staff ID(s) </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['pl_id'] . "</td></tr>";
            }

            echo "</table>"; 

            $query = "select * from accusedcases where c_id=$cid";
            $result = mysql_query($query);

            echo "<br/> <br/>";
            echo "<table style='margin-left:2cm'>";

            echo "<tr> <th style='color:white'> Accused ID(s) </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['acc_id'] . "</td></tr>";
            }

            echo "</table>"; 

            $query = "select * from victimcases where c_id=$cid";
            $result = mysql_query($query);

            echo "<br/> <br/>";
            echo "<table style='margin-left:2cm'>";

            echo "<tr> <th style='color:white'> Victim ID </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['vic_id'] . "</td></tr>";
            }

            echo "</table>"; 

            mysql_close(); 

            }
        }

?>