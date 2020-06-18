<?php
	setcookie("fcaotl[id]"," ",time()-3600);
    setcookie("fcaotl[rank]"," ",time()-3600);
    //setcookie("fcaotl[acpz]"," ",time()-3600);
    //setcookie("fcaotl[dcpz]"," ",time()-3600);
    //setcookie("fcaotl[ps]"," ",time()-3600);
    echo "<script> alert('logout successful redirecting to home page'); </script>";
    header("Refresh:0; url=Mform.html");
?>