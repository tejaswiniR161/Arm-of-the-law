
<html>
<style type="text/css" >
table, td 
    {
    font-style: "Myriad Pro";
    font-size:large;
    text-align:center;
    }

</style>
<head>

	<script type="text/javascript" src="webcam.js"></script>
    <script>
        webcam.set_api_url( 'upload.php' );
        webcam.set_quality( 90 ); // JPEG quality (1 - 100)
        webcam.set_shutter_sound( true ); // play shutter click sound
        
        webcam.set_hook( 'onComplete', 'my_completion_handler' );
        
        function take_snapshot() {
            // take snapshot and upload to server
            document.getElementById('upload_results').innerHTML = 'Snapshot<br>'+
            '<img src="uploading.gif">';
            webcam.snap();
        }
        
        function my_completion_handler(msg) {
            // extract URL out of PHP output
            if (msg.match(/(http\:\/\/\S+)/)) {
                var image_url = RegExp.$1;
                // show JPEG image in page
                document.getElementById('upload_results').innerHTML = 
                    'Snapshot<br>' + 
                    '<a href="'+image_url+'" target"_blank"><img src="' + image_url + '"></a>';
                
                // reset camera for another shot
                webcam.reset();
            }
            else alert("PHP Error: " + msg);
        }
		
    </script>
</head>
<link rel="stylesheet" type="text/css" href="image.css" />
<body>
<div id="container">

<div id="header">


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
        <a href="Mform.html">HOME</a>
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
 
<div id="section">
<h2 align="center" id="page">
<table class="main">
		
        <tr>
            <td align="top">
	            <div class="border">
                Live Webcam
				
                <script>
                document.write( webcam.get_html(320, 240) );
                </script>
                </div>
                
				<br>
                <br/><input type="button" class="snap" value="SNAP IT" onClick="take_snapshot()">
				<form method="POST" action="storeImg.php" enctype="multipart/form-data">
					<h3>Enter Visitor Details</h3>
					<table align="center" style='margin-left:1cm;'>
					<tr> <td> Visitor Name </td> <td> <input type="text" name="vname" required/> </td> </tr>
					<tr> <td> Address </td> <td> <input type="text" name="vaddr" required/>  </textarea></td></tr>
					<tr> <td> Phone Number </td> <td> <input type="number" id="vphone" name="vphone" required/> </td></tr> 
                    <tr> <td> Visiting Date </td> <td> <input type="date" id="vdate" name="vdate" required/> </td></tr>
                    <tr> <td> Visiting Time </td> <td> <input type="time" id="vtime" name="vtime" required/> </td></tr>
                    <tr> <td> Prisoner Name </td> <td> <input type="text" id="vpname" name="vpname" required/> </td></tr>
					
					</table>
					<div id="errph"></div>
					<br/>
					
 
					<input type="file" name="myimage" required/>
					<input type="submit" name="submit_image" value="Upload" required/>
				</form>
				
				<form method="POST" action="visitor_database.php" enctype="multipart/form-data">
			
					<input type="submit" name="view_database" value="View Database of Visitors" >
				</form>
				
            </td>
			
            <td width="50">&nbsp;</td>
            <td valign="top">
                <div id="upload_results" class="border">
                    Snapshot<br>
                    <img src="logo.jpg" />
                </div>
            </td>
        </tr>
    </table>


</h2>

</div>


</div>

</body>
</html>
