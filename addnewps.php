<?php
include 'comnhometemp.php';
?>

<div id="section">
        <form action="addnewpstemp.php" method="post">
        <br/>
        <a href="backgo.php" style='margin-left:17cm'>Back</a>
        <br/>
        <br/>
        <table style='margin-left:2cm'>
        <tr><th align='center' colspan='2'>Enter The New Police Station Details</th></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PS Name :</td><td> <input type="text" name="name" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PS Address : </td> <td><textarea name="add" required></textarea></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PS Pin :</td><td> <input type="number" name="pin" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACP Zone ID :</td><td> <input type="number" name="acpz" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DCP Zone ID :</td><td> <input type="number" name="dcpz" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PS Phone Number :</td><td> <input type="number" name="phno" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PS Email ID :</td><td> <input type="email" name="em" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PS PI ID : </td> <td><input type="number" name="ciid" placeholder="4th Rank" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACP ID : </td><td> <input type="number" name="acpid" placeholder="Rank 3" required/></td></tr>
        <tr> <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DCP ID : </td><td> <input type="number" name="dcpid" placeholder="Rank 2" required/></td></tr>
        </table>
        <br/>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="ReSet" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="addps" value="ADD"/>

        </form>

        </div>

        </div>
	</div>
    </body>
    </html>