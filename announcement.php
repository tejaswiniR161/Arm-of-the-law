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
</head>

<div id="section">
<a href="backgo.php" style='margin-left:17cm;'>Back</a>
<form action="announcementtemp.php" method="post">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<table style='margin-left:5cm'>

<tr><th align="center" colspan="2">New Announcement Details</th></tr>

<tr> <td>Subject  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="as" required/></td> </tr>

<!--<tr> <td>Content : &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="textarea" name="ac" cols="40" rows="5" /></td> </tr>-->

<tr> <td>content  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="ac" required/></td> </tr>

</table>

<br/>
<br/>

            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="reset" value="ReSet" />
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Announce" name="sub" />
</form>
</div>
</div>

</body>

</html>