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
        }
?>

<head>

<style>
table {
    border-collapse: collapse;
    width: 70%;
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

<body>
<form action="makeclearance.php" method="post">

<table style='margin-left:0.5cm'>

<tr><th align="center" colspan="2">Enter Case ID To Clear The Case</th></tr>

<tr> <td>Case ID  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="cid" required/></td> </tr>
</table>
          
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Make Clearance" name="sub" />
</form>

<br/>
<br/>
<form action="allotstaff.php" method="post">

<table style='margin-left:0.5cm'>

<tr><th align="center" colspan="2">Enter Details To Allot Staff</th></tr>

<tr> <td>Case ID  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="cid" required/></td> </tr>
<tr> <td>Police ID  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="newplid" required/></td> </tr>

</table>

            
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Allot Staff" name="sub" />
</form>


<br/>
<br/>
<form action="addaccused.php" method="post">

<table style='margin-left:0.5cm'>

<tr><th align="center" colspan="2">Enter Case ID To Add Accused</th></tr>

<tr> <td>Case ID  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="cid" required/></td> </tr>
</table>
            
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Add Accused" name="sub" />
</form>

<br/>
<br/>
<form action="tocourt.php" method="post">

<table style='margin-left:0.5cm'>

<tr><th align="center" colspan="2">Enter Case ID To Send Case To Court</th></tr>

<tr> <td>Case ID  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="cid" required/></td> </tr>
</table>
            
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Add To InCourt" name="sub" />
</form>

<br/>
<br/>
<form action="casejudgement.php" method="post">

<table style='margin-left:0.5cm'>

<tr><th align="center" colspan="2">Enter Case ID To Add Court Judgement</th></tr>

<tr> <td>Case ID  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="cid" required/></td> </tr>
<tr> <td>Judgement Date  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="date" name="jd" required/></td> </tr>
<tr> <td>Judgement  &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="j" required/></td> </tr>
<tr> <td>What Happened To The Accused? &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="ja" required/></td> </tr>
</table>          
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Add Judgement" name="sub" />
</form>
