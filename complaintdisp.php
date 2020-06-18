<html>
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
</head>
</html>
<?php
        $cnt=0;
        $rnk=0;


        if (isset($_COOKIE['fcaotl'])) 

        {
            foreach ($_COOKIE['fcaotl'] as $name => $value) 
                {

                $name = htmlspecialchars($name);
                $value = htmlspecialchars($value);
                $arr[$cnt]=$value;
                $cnt=$cnt+1;
                }

            $rnk=$arr[0];
            $plid=$arr[1];

            if ($arr[0]==1)
            {
            include 'comnhometemp2.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');

            $query = "select * from onlinecomplaints order by cl_odate desc";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>"; // start a table tag in the HTML
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Police ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['cl_id'] . "</td><td>" . $row['cl_category'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['cl_opin'] . "</td><td>" . $row['cl_odate'] . "</td>";
            echo "<td>" . $row['cl_otime'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection


            }


            if ($arr[0]==2)
            {
            include 'dcphometemp2.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');

            $query = "select * from onlinecomplaints where c_dcp_z=$plid order by cl_odate desc";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['cl_id'] . "</td><td>" . $row['cl_category'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['cl_opin'] . "</td><td>" . $row['cl_odate'] . "</td>";
            echo "<td>" . $row['cl_otime'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection


            }


            if ($arr[0]==3)
            {
            include 'acphometemp2.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');

            $query = "select * from onlinecomplaints where c_acp_z=$plid order by cl_odate desc";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['cl_id'] . "</td><td>" . $row['cl_category'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['cl_opin'] . "</td><td>" . $row['cl_odate'] . "</td>";
            echo "<td>" . $row['cl_otime'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection


            }

            if ($arr[0]==4)
            {
            include 'pihometemp2.php';
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

            $sql="SELECT * from policestation where ps_id=$psid";
            $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $pin=$fdata['ps_pin'];
                    }



            $conn->close();


            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');

            $query = "select * from onlinecomplaints where cl_opin=$pin order by cl_odate desc";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['cl_id'] . "</td><td>" . $row['cl_category'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['cl_opin'] . "</td><td>" . $row['cl_odate'] . "</td>";
            echo "<td>" . $row['cl_otime'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection


            }


            if ($arr[0]==5)
            {
            include 'psihometemp2.php';
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

            $sql="SELECT * from policestation where ps_id=$psid";
            $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $pin=$fdata['ps_pin'];
                    }



            $conn->close();


            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');

            $query = "select * from onlinecomplaints where cl_opin=$pin order by cl_odate desc";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Category &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th>PIN Code&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Date of Crime&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Time of Crime &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['cl_id'] . "</td><td>" . $row['cl_category'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['cl_opin'] . "</td><td>" . $row['cl_odate'] . "</td>";
            echo "<td>" . $row['cl_otime'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection


            }



        }
?>



