<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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
<title>
	PSI's Home
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="Style/subsub.css" />

<script>
function functioncount()
{
    location.href = 'psihome.php';
}
function functionoc()
{
    location.href = 'complaintdisp.php';
}

</script>

</head>

<body>
<div id="container">
    <div id="nav1">
        <br />
        
        <?php 
        /*if (isset($fn))
        echo "<html> <a> Welcome,<br/> &nbsp; &nbsp; $fn $sn! </a> </html>";
        else 
        echo " ";*/

        /*$cnt=0;

        if (isset($_COOKIE['fcaotl'])) 

        {
            foreach ($_COOKIE['fcaotl'] as $name => $value) 
                {

                $name = htmlspecialchars($name);
                $value = htmlspecialchars($value);
                $arr[$cnt]=$value;
                $cnt=$cnt+1;
                }
                echo " Welcome, <br/> ".$arr[0];
        }*/

        ?>
        
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <a href="logoutredirect.php">Log Out</a>
        <br />
        <br />
        <a href="updatecomplaint.php">Update Online Filed Complaints</a>
        <br />
        <br />
        <a href="mycases.php">MY Cases</a>
        <br />
        <br />
        <a href="casedetails.php">Case Details</a>
        <br />
        <br />
        <a href="firredirect.php">File F.I.R</a>
        <br />
        <br />
        <a href="editaccount.php">Edit Account</a>
        <br />
        <br />
        </div>

        <div id="nav">
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <a href="announcementsshow.php">ANNOUNCEMENTS</a>
        <br />
        <br />
        <a href="comp.php">REGISTER COMPLAINT</a>
        <br />
        <br />
        <a href="caselogin.html">CASES</a>
        <br />
        <br />
        <a href="stat.html">STATISTICS</a>
        <br />
        <br />
        <a href="lawandorder.html">LAW AND ORDER</a>
        <br />
        <br />
        <a href="ContactUs.html">CONTACT US</a>
        <br />
        <br />
        <a href="findtry.html">FIND YOUR STATION</a>
        <br />
        <br />
        <a href="FAQ.html">FAQ</a>
        <br />
        <br />
        <a href="about.html">ABOUT</a>
        <br />
        <br />
        </div>


        <div id="section">

        <div id="choicesbk">
        <div>
        <button onclick="functioncount()" name="" class="labelhstyle" style="border: 1px solid lightblue; text-align:center">Count</button>
        <button onclick="functionoc()" name="" class="labelhstyle" style="border: 1px solid lightblue; text-align:center">Online Filed Complaints</botton>
        <br/>
        </div>
        <p>
        <br/>
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

            $plid=$arr[1];
            //header("Refresh:0; url=commhome.php");
        }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }

    
         $sql="select count(c_id) from allotedcases where pl_id=$plid";
         $result = $conn->query($sql);
         $row = mysqli_fetch_array($result);
         $myc = $row[0];

         echo "<br/> <br/>";
         echo "<br/> <br/>";
         echo "<br/> <br/>";

         echo "<h2 style='margin-left:6cm'> &nbsp;&nbsp;&nbsp; You are Currently Assigned with ".$myc." Cases  </h2>";
         
        $conn->close();

        ?>
        </p>