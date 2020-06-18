<style>
table {
    border-collapse: collapse;
    width: 40%;
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

<form method="post" action="viewimgtemp.php">
<table style='margin-left:3cm'>
<tr><th colspan='2' align='center' >Enter Visitor ID</th></tr>
<tr> <td> ID </td> <td> <input type='text' name='vid' required/></td></tr>
</table>
<br/>
<input style='margin-left:3cm' type="submit" value='Show Image'/>
</form>