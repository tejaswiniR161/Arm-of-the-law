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
<?php
//echo "<div id='section'>";
//echo "<div id='backgo' style='margin-left:15cm;'";
//echo "<a href='backgo.php'> Back </a> </div>";
//echo "<a href=''>Back</a>";
//echo "</div>";
/*echo " <h3> First Information Report </h3>";
echo "<p> <br/> hcdjh <br/> </p>";
echo "</div></div> </body> </html>";*/
?>
<head>
<style>
table, td 
    {
    color:#3b7687;
    font-style: "Myriad Pro";
    font-size:large;
    text-align:right;
    }
</style>

<script>

function jshidadd()
{
	document.getElementById("hidden1").value=window.prompt("Enter Accused ID :");
}

</script>

</head>
<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>

<br/>

<form action="addaccusedtemp.php" method="post">

<input type="hidden" name="hidden1" id="hidden1" value="0" />

<table style='margin-left:5cm'>

<tr><th align="center" colspan="2">Accused Details</th></tr>
<tr> <td>Case ID &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="caseid" /></td> </tr>
<tr> <td>Aadhar Number &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="vad" /></td> </tr>
<tr> <td>First Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vfn" /></td> </tr>
<tr> <td>Second Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vsn" /></td> </tr>
<tr> <td>Email &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="email" name="ve" /></td> </tr>
<tr> <td>Phone Number &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="vph" /></td> </tr>
<tr> <td>Address &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vadd" /></td> </tr>
<tr> <td>Occupation &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vo" /></td> </tr>
<tr> <td>Date Of Birth &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="date" name="vdob" /></td> <td> <button name="oldvic" onclick="jshidadd()">Accused ID already given?</button> </td> </tr>

</table>
<br/>
<br/>

			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			<input type="reset" value="ReSet" />
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Add Accused" name="sc" />


</form>

</div>
</div>

</body>

</html>