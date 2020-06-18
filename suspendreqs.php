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

            $query = "select * from cases where c_s_r is not NULL and c_suspended is NULL"; //You don't need a ; like you do in SQL
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:1cm'>"; // start a table tag in the HTML
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Police ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['c_id'] . "</td><td>" . $row['c_s_pl_id'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['c_sreason'] . "</td></tr>";
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

            $query = "select * from cases where c_s_r=1 and c_dcp_z=$plid";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:1cm'>"; // start a table tag in the HTML
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Police ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Police ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['c_id'] . "</td><td>" . $row['c_s_pl_id'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['c_sreason'] . "</td></tr>";
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

            $query = "select * from cases where c_s_r=1 and c_acp_z=$plid";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:1cm'>"; // start a table tag in the HTML
            //echo "<tr><th> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Police ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            echo "<tr><th style='color:white'> Case ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Police ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th></tr>";
            while($row = mysql_fetch_array($result))
            {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['c_id'] . "</td><td>" . $row['c_s_pl_id'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['c_sreason'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection


            }



        }
?>



