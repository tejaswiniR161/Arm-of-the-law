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
	DCP's Home
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="Style/subsub.css" />

<script>
function functioncount()
{
    location.href = 'dcphome.php';
}
function functiontr()
{
    location.href = 'transferreqs.php';
}
function functionsr()
{
    location.href = 'suspendreqs.php';
}
function functionsd()
{
    location.href = 'suspendeddisp.php';
}
function functionsod()
{
    location.href = 'solveddisp.php';
}
function functionicd()
{
    location.href = 'incourtdisp.php';
}
function functionogd()
{
    location.href = 'goingdisp.php';
}
function functionfird()
{
    location.href = 'firdisp.php';
}
function functioncomd()
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
        <a href="logoutredirect.php">Log Out</a>
        <br />
        <br />
        <a href="announcement.php">Make New Announcement</a>
        <br />
        <br />
        <a href="appctransfer.php">Approve Case Transfer</a>
        <br />
        <br />
        <a href="appcsuspend.php">Suspend Case</a>
        <br />
        <br />
        <a href="updatecasedetails.php">Update Case Details</a>
        <br />
        <br />
        <a href="criminalrecordsearch.php">Criminal's Record</a>
        <br />
        <br />
        <a href="staffrecordsearch.php">Staff's Record</a>
        <br />
        <br />
        <a href="casesinps.php">Cases in PS</a>
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
