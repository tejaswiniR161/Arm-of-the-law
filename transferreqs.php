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
    color:white;
}
</style>
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

            $query = "select * from transfer where t_tdate is NULL";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:1cm'>"; 
            echo "<tr><th style='color:white'> Request ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Case ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Police ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> </tr>";
            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_c_id'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['t_frm_pl_id'] . "</td><td>" . $row['t_reason'] . "</td></tr>";
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

            $query = "select * from transfer where t_tdate is NULL and c_dcp_z=$plid";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:1cm'>"; 
            //echo "<tr><th> Request ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Case ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Police ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> </tr>";
            echo "<tr><th style='color:white'> Request ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Case ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Police ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> </tr>";
            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_c_id'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['t_frm_pl_id'] . "</td><td>" . $row['t_reason'] . "</td></tr>";
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

            $query = "select * from transfer where t_tdate is NULL and c_acp_z=$plid";
            $result = mysql_query($query);

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:1cm'>"; 
            //echo "<tr><th> Request ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Case ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Police ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> </tr>";
            echo "<tr><th style='color:white'> Request ID &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Case ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Police ID&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> <th style='color:white'> Reason&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</th> </tr>";
            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_c_id'] . "</td>";  //$row['index'] the index here is a field name
            echo "<td>" . $row['t_frm_pl_id'] . "</td><td>" . $row['t_reason'] . "</td></tr>";
            }

            echo "</table>"; //Close the table in HTML

            mysql_close(); //Make sure to close out the database connection

            }
        }
?>



