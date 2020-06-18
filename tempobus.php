<html>
<body>
welcome the pin yoy entered = 
<?php 
echo "bkuvjhdsvkh \n";
function poop()
{
echo "dfdjuhjnjgfjhgl";
echo $_POST["ipin"]; 
}

if (isset($_POST["submitbtn"])) 
	{
        poop();
    }

?>
</body>
</html>

border: 1px solid #000;










<html> 
	<link rel='stylesheet' type='text/css' href='Style/SubFormStyle.css' />
	<body> 
	<div id='container'>
    <div id='menu'>
        &nbsp;<br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <a href='Mform.html'>HOME</a> &nbsp; &nbsp;
        <br />
        <br />
        <a href=''>SERVICES</a> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <br />
        <br />
        <a href=''>CASES</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <br />
        <br />
        <a href=''>STATISTICS</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <br />
        <br />
        <a href='lawandorder.html'>LAW AND ORDER</a>&nbsp; &nbsp; &nbsp; &nbsp;
        <br />
        <br />
        <a href=''>CONTACT US</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <br />
        <br />
        <a href=''>FIND YOUR STATION</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <br />
        <br />
        <a href=''>FAQ</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <br />
        <br />
        <a href='about.html'>ABOUT</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <br />
        <br />
        <div id='main'> 
        <p>
        </p>
        </div>
        </div>
        </div>
        </body> </html>
<?php 


function poop()
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aotl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$spin=$_POST['ipin'];
$sfpin=(int)$spin;
//$sql = "SELECT ps_name, ps_address, ps_ph_no FROM policeStation WHERE ps_pin='sfpin'";
$sql="SELECT ps_name, ps_address, ps_ph_no from policestation where ps_pin=$sfpin";
$result = $conn->query($sql);

		$fdata = $result->fetch_array(MYSQLI_ASSOC);
        echo "name: " . $fdata["ps_name"]. " - pwd: " . $fdata["ps_address"]. " " . "<br>";
 
$conn->close();
//echo "<script>alert('teju here you go');</script>"; 

}

if (isset($_POST["submitbtn"])) 
	{
        poop();
    }

?>






<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@example.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'from@example.com';
$mail->FromName = 'Mailer';
$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}



require_once "Mail.php";

$from = '<fromaddress@gmail.com>';
$to = '<toaddress@yahoo.com>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'johndoe@gmail.com',
        'password' => 'passwordxxx'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}



echo "<div id='section' style='margin-left:8cm;'>";
echo "<p> hdcduhh <br/> hcdjh <br/> </p>";
echo "</div></div> </body> </html>";