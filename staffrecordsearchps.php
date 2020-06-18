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
Search For Staff
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
<h2 style='margin-left:9cm'> Search Result </h2>
<br/>

<?php
$pin=$_POST['pin'];
$pin=(int)$pin;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="SELECT * from policestation where ps_pin=$pin";
            $result = $conn->query($sql);

                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('Wrong PIN Code!'); </script>";
                    header("Refresh:0; url=staffrecordsearch.php");
                    $conn->close();
                    }


            else
            {
            echo "<script> alert('Note The ID And Search Via ID To Check The Case ID(s) Assigned To The Staff'); </script>";
            $fdata = $result->fetch_array(MYSQLI_ASSOC);
            $psid=$fdata['ps_id'];
            $acp=$fdata['ps_acp_id'];
            $dcp=$fdata['ps_dcp_id'];
            $conn->close();

            echo "<h2 style='margin-left:8.5cm'> Police Station ID : ".$psid;
            echo "<br/><br/>PS ACP ID : ".$acp;
            echo "<br/>PS DCP ID : ".$dcp ."</h2>";

            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from policestaffdetails where pl_ps_id=$psid";
            $result = mysql_query($query);

            echo "<br/>";
            echo "<table style='margin-left:2cm'>";

            echo "<tr> <th> ID </th> <th> Name </th> <th> Rank </th> <th> Current Address </th> <th> Date Of Birth </th> <th> Date Of Joining </th> <th> Nominee Name </th> <th> Nominee Address </th>  <th> Nominee Relationship </th></tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['pl_id'] . "</td><td>" . $row['pl_fname'] . "</td>";  
            echo "<td>" . $row['pl_rank'] . "</td><td>" . $row['pl_caddress'] . "</td>";
            echo "<td>" . $row['pl_dob'] . "</td><td>" . $row['pl_doj'] . "</td>";
            echo "<td>" . $row['pl_nomine_name'] . "</td><td>" . $row['pl_nominee_address'] . "</td>";   
            echo "<td>" . $row['pl_nominee_relationship'] . "</td></tr>";
            }

            echo "</table>"; 

            mysql_close(); 

            }

?>