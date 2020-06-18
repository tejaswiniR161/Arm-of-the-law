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
Search For Accused
</title>
</head>

<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>
<h2 style='margin-left:9cm'> Search For Accused </h2>
<br/>
<br/>
<br/>
<form action="criminalrecordsearchaadhar.php" method="post">
<table style='margin-left:4cm'>
<tr><th align="center" colspan="2">Search Using Aadhar Number</th></tr>
<tr> <td>Aadhar Number &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="ad" required/></td> </tr>
</table>
<br/>
<br/>

            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="reset" value="ReSet" />
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Search" name="s" />
</form>

<br/>
<br/>
<br/>
<br/>
<br/>


<form action="criminalrecordsearchname.php" method="post">
<table style='margin-left:4cm'>
<tr><th align="center" colspan="2">Search Using First And Second Name</th></tr>
<tr> <td>First Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="fn" required/></td> </tr>
<tr> <td>Second Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="sn" required/></td> </tr>
</table>
<br/>
<br/>

            
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="reset" value="ReSet" />
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Search" name="s" />
</form>

</div>
</div>

</body>

</html>