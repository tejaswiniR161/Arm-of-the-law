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
Search For Victim
</title>
</head>

<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>
<h2 style='margin-left:9cm'> Search Result </h2>
<br/>
<br/>

<?php
$vfn=$_POST['vfn'];
$vsn=$_POST['vsn'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            $sql="SELECT * from victimdetails where vic_fn='$vfn' and vic_sn='$vsn'";
            $result = $conn->query($sql);

                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('Record Was Not Found!'); </script>";
                    header("Refresh:0; url=publicrecordsearch.php");
                    $conn->close();
                    }


            else
            {
                echo "<script> alert('Note The Aadhar Number And Search Via Aadhar Number To Check The Case ID(s) Filed By The Victim'); </script>";
            $conn->close();

            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from victimdetails where vic_fn='$vfn' and vic_sn='$vsn'";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:3cm'>";

            echo "<tr> <th> Victim ID </th> <th> Aadhar Number </th> <th> Phone Number </th> <th> Name </th> <th> Address </th> <th> Date Of Birth </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['vic_id'] . "</td><td>"  . $row['vic_aadhar'] . "</td><td>" . $row['vic_ph_no'] . "</td>";  
            echo "<td>" . $row['vic_fn'] . "</td><td>" . $row['vic_address'] . "</td>"; 
            echo "<td>" . $row['vic_dob'] . "</td></tr>";
            }

            echo "</table>"; 

            mysql_close(); 

            }

?>