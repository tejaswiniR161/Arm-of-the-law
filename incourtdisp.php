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

            $query = "select * from cases where c_cstatus_i='4' order by c_incourt_frmdate";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>From Date &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th>From Date &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['c_id'] . "</td><td>" . $row['c_incourt_frmdate'] . "</td></tr>";  //$row['index'] the index here is a field name
            //echo "<td>" . $row['c_s_app_pl_id'] . "</td><td>" . $row['c_sreason'] . "</td>";
            //echo "<td>" . $row['c_solvedtime'] . "</td></tr>";
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

            $query = "select * from cases where c_cstatus_i='4' and c_dcp_z=$plid order by c_incourt_frmdate";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>From Date &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['c_id'] . "</td><td>" . $row['c_incourt_frmdate'] . "</td></tr>";
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

            $query = "select * from cases where c_cstatus_i='4' and c_acp_z=$plid order by c_incourt_frmdate";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>From Date &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th>From Date &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['c_id'] . "</td><td>" . $row['c_incourt_frmdate'] . "</td></tr>"; 
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

            $conn->close();


            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');

            $query = "select * from cases where c_cstatus_i='4' and c_ps_id=$psid order by c_incourt_frmdate";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:2cm'>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'>From Date &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th>From Date &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";

            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['c_id'] . "</td><td>" . $row['c_incourt_frmdate'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection


            }


        }
?>



