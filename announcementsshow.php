<style>
table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #3b7687;
    color: white;
}
</style>

<?php
include 'Mformtemp.php';

			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            
            $connection = mysql_connect('localhost', 'root', '');

            mysql_select_db('AOTL');

            $query = "select * from publicannouncements order by an_date desc";
            $result = mysql_query($query);

            echo "<div id='main'>";

            echo "<br/> <br/> <br/>";
            echo "<table style='margin-left:3cm'>";

            echo "<tr> <th> Subject </th> <th> Content </th> <th> Date </th> </tr>";

            while($row = mysql_fetch_array($result))
            {   
            echo "<tr><td>" . $row['an_subject'] . "</td><td>" . $row['an_content'] . "</td>";  
            echo "<td>" . $row['an_date'] . "</td></tr>";
            }

            echo "</table>"; 

            mysql_close(); 
?>