<?php
include 'comnhometemp2.php';
?>
<div id="section">
        <form action="addnewpltemp.php" method="post">
        <br/>
        <a href="backgo.php" style='margin-left:17cm'>Back</a>
        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter The New Staff Details</h2>
        <br/>
        <br/>
        <table>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank :</td><td> <input type="number" name="rnk" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name : </td> <td><input type="text" name="fn" pattern="[a-z\A-Z]*" title="Only Alphabets" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Second Name : </td> <td><input type="text" name="sn" pattern="[a-z\A-Z]*" title="Only Alphabets" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email ID :</td><td> <input type="email" name="em" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Of Reporting : &nbsp;&nbsp;&nbsp;&nbsp;</td><td> <input type="date" name="dor" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Station ID : </td> <td><input type="number" name="psid" placeholder="For 4th & 5th Ranks"/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACP Zone ID : </td><td> <input type="number" name="acpid" placeholder="For Rank 3" /></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DCP Zone ID : </td><td> <input type="number" name="dcpid" placeholder="For Rank 2"/></td></tr>
        </table>
        <br/>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="addpl" value="ADD"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="RESET"/>

        </form>

        </div>

        </div>
</div>
    </body>
    </html>