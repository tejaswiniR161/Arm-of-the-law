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
Search For Accused
</title>
</head>

<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>
<h2 style='margin-left:9cm'> Search Result </h2>
<br/>
<br/>

<?php
$ad=$_POST['ad'];
$ad=(int)$ad;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="SELECT * from accuseddetails where acc_aadhar=$ad";
            $result = $conn->query($sql);

                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('Record Was Not Found!'); </script>";
                    header("Refresh:0; url=criminalrecordsearch.php");
                    $conn->close();
                    }


            else
            {
            $conn->close();

            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from accuseddetails where acc_aadhar=$ad";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:3cm'>";

            echo "<tr> <th> Accused ID </th> <th> Phone Number </th> <th> Name </th> <th> Address </th> <th> Date Of Birth </th> </tr>";

            while($row = mysql_fetch_array($result))
            {  
            $aid=$row['acc_id']; 
            echo "<tr><td>" . $row['acc_id'] . "</td><td>" . $row['acc_ph_no'] . "</td>";  
            echo "<td>" . $row['acc_fn'] . "</td><td>" . $row['acc_address'] . "</td>"; 
            echo "<td>" . $row['acc_dob'] . "</td></tr>";
            }

            echo "</table>"; 

            mysql_close(); 


            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from accusedcases where acc_id=$aid";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:3cm'>";

            echo "<tr> <th> Case ID(s) </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['c_id'] . "</td></tr>";
            }

            echo "</table>"; 

            mysql_close(); 
            }

?>