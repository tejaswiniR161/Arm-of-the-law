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
My Cases
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
<h2 style='margin-left:9cm'> My Cases </h2>
<br/>
<br/>

<?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="SELECT * from allotedcases where pl_id=$plid";
            $result = $conn->query($sql);

                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('You Are Currently Not Assigned With Any Cases!'); </script>";
                    header("Refresh:0; url=backgo.php");
                    $conn->close();
                    }


            else
            {
            $conn->close();

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
         	$sql="select count(c_id) from allotedcases where pl_id='$plid'";
         	$result = $conn->query($sql);
         	$row = mysqli_fetch_array($result);
         	$count = $row[0];

         	echo "<br/><br/><h2 style='margin-left:2cm'> You Are Currently Assigned With ".$count." Case(s) </h2>";
         	$conn->close();


            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from allotedcases where pl_id=$plid";
            $result = mysql_query($query);

            echo "<br/> <br/>";
            echo "<table style='margin-left:2cm'>";

            echo "<tr> <th style='color:white'> Case ID(s) </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['c_id'] . "</td></tr>";
            }

            echo "</table>"; 

            mysql_close(); 
            }

?>