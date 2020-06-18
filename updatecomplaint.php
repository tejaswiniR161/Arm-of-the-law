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
Update Complaint
</title>
</head>

<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>
<h2 style='margin-left:7.5cm'> Complaints Reported </h2>

<?php
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
                
            $sql="SELECT * from policestaffdetails where pl_id=$plid";
            $result = $conn->query($sql); 


                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $psid=$fdata['pl_ps_id'];
                    }

            $sql="SELECT * from onlinecomplaints where cl_ps_id=$psid";
            $result = $conn->query($sql); 


                    if ($result->num_rows == 0) 
                    {
                    echo "<script> alert('No New Complaint Is Filed In Your PS'); </script>";
                    header("Refresh:0; url=backgo.php");
                    $conn->close();
                    }

                    else
                    {
            $sql="select count(cl_id) from onlinecomplaints where cl_ps_id=$psid";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);
            $count = $row[0];

            echo "<br/><h2 style='margin-left:2cm'> Number OF Online Complaints Filed =  ".$count."</h2>";
            $conn->close();

            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');
         
            $query = "select * from onlinecomplaints where cl_ps_id=$psid";
            $result = mysql_query($query);

            echo "<br/>";
            echo "<table style='margin-left:4cm'>";

            echo "<tr> <th> Complaint ID </th> <th> Category </th> <th> Description </th> <th> Location </th> <th> Date </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['cl_id'] . "</td>";
            echo "<td>" . $row['cl_category'] . "</td>";
            echo "<td>" . $row['cl_description'] . "</td>";
            echo "<td>" . $row['cl_olocation'] . "</td>";
            echo "<td>" . $row['cl_odate'] . "</td>";
            }

            echo "</table>"; 

            mysql_close(); 



                    }


?>
<br/>
<br/>
<form action="updatecomplainttemp.php" method="post">
<table style='margin-left:4cm'>
<tr><th align="center" colspan="2">Enter Complaint ID</th></tr>
<tr> <td>ID &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="id" required/></td> </tr>
<tr> <td>Sub Category &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="sc" required/></td> </tr>
</table>
<br/>

            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="reset" value="ReSet" />
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Update As FIR" name="s" />
</form>
