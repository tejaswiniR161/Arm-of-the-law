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

<script>

function jshidadd()
{
	document.getElementById("hidden1").value=window.prompt("Enter victim ID :");
}

</script>

</head>
<div id="section">
<a href="backgo.php" style='margin-left:17cm'>Back</a>
<h2 style='margin-left:6.5cm'> First Information Report </h2>
<br/>

<form action="firfiletemp.php" method="post">
<input type="hidden" name="hidden1" id="hidden1" value="0" />

<table style='margin-left:5cm'>

<tr><th align="center" colspan="2">Victim Details</th></tr>
<tr> <td>Aadhar Number &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="vad" /></td> </tr>
<tr> <td>First Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vfn" pattern="[a-z\A-Z]*" title="Only Alphabets" /></td> </tr>
<tr> <td>Second Name &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vsn" pattern="[a-z\A-Z]*" title="Only Alphabets" /></td> </tr>
<tr> <td>Email &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="email" name="ve" /></td> </tr>
<tr> <td>Phone Number &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="vph" /></td> </tr>
<tr> <td>Address &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vadd" /></td> </tr>
<tr> <td>Occupation &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="vo" /></td> </tr>
<tr> <td>Date Of Birth &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="date" name="vdob" /></td> <td> <button name="oldvic" onclick="jshidadd()">Victim ID already given?</button> </td> </tr>


<tr><th align="center" colspan="2">Crime Details</th></tr>
<tr> <td>Category &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="cc" required/></td> </tr>
<tr> <td>Sub Category &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="csc" required/></td> </tr>
<tr> <td>Description &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="cd" required/></td> </tr>
<tr> <td>Location &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="text" name="cl" required/></td> </tr>
<tr> <td>Pin Code &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="number" name="cpin" required/></td> </tr>
<tr> <td>Date &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="date" name="cdate" required/></td> </tr>
<tr> <td>time &nbsp; &nbsp; &nbsp; &nbsp;</td> <td><input type="time" name="ctime" required/></td> </tr>
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
            <input type="submit" value="Submit Crime" name="sc" />

</form>
</div>
</div>

</body>

</html>