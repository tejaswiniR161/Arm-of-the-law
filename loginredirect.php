<?php


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }

                $plid=$_POST['plid'];
                $plid=(int)$plid;
                $plpwd=$_POST['plpwd'];
                
                $sql="SELECT pl_rank, pl_newaccount, pl_fname, pl_sname from policestaffdetails where pl_id=$plid and pl_pwd='$plpwd'";
                $result = $conn->query($sql);

                	if ($result->num_rows > 0) 
                	{
                $fdata = $result->fetch_array(MYSQLI_ASSOC);
                $rnk=$fdata['pl_rank'];
                $newacc=$fdata['pl_newaccount'];
                $fn=$fdata['pl_fname'];
                $sn=$fdata['pl_sname'];
                //$acp=$fdata['pl_acp_zoneid'];
                //$dcp=$fdata['pl_dcp_zoneid'];
                //$ps=$fdata['pl_ps_id'];

                setcookie("fcaotl[rank]", $rnk);
                setcookie("fcaotl[id]", $plid);
                //setcookie("fcaotl[acpz]", $acp, time()+3600);
                //setcookie("fcaotl[dcpz]", $dcp, time()+3600);
                //setcookie("fcaotl[ps]", $ps, time()+3600);


                echo "<script> alert('Login successful, Welcome !'); </script>";

                if($newacc==1)
                {
                header("Refresh:0; url=pldetailsupdate.php");
                }

                else
                {		if ($rnk == 1)
                        {
                            //header("Refresh:0");
                			//include 'commhome.php';
                            header("Refresh:0; url=commhome.php");
                        }

                        elseif ($rnk == 2)
                        {
                            //header("Refresh:0");
                            //include 'commhome.php';
                            header("Refresh:0; url=dcphome.php");
                        }

                        elseif ($rnk == 3)
                        {
                            //header("Refresh:0");
                            //include 'commhome.php';
                            header("Refresh:0; url=acphome.php");
                        }

                        elseif ($rnk == 4)
                        {
                            header("Refresh:0; url=pihome.php");
                        }

                        elseif ($rnk == 5)
                        {
                            header("Refresh:0; url=psihome.php");
                        }
                		
           
				}
            }
					else
					{
				echo "<script> alert('Wrong ID or Password ! redirecting to login page'); </script>";
				//include 'login.html';
                header("Refresh:0; url=login.html");
					}

				$conn->close();

?>