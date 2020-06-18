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
                $rnk=$arr[0];
                $plid=$arr[1];
            
        }

$cid=$_POST['cid'];
$newpl=$_POST['newplid'];
$d=date('Y-m-d');
date_default_timezone_set('Asia/Calcutta');
$t=date("h:i:s");
$flaf=0;

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AOTL";
            $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if($rnk==1)
                {
                $sql="select * from cases where c_id=$cid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $flaf=3;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi>4)
                      {
                        $flaf=2;
                      }
                    }

                }

                elseif($rnk==2)
                {
                $sql="select * from cases where c_id=$cid and c_dcp_z=$plid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $flaf=3;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi>4)
                      {
                        $flaf=2;
                      }
                    }

                }

                elseif($rnk==3)
                {
                $sql="select * from cases where c_id=$cid and c_acp_z=$plid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0)
                    {
                    $flaf=3;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi>4)
                      {
                        $flaf=2;
                      }
                    } 

                }

                elseif($rnk==4)
                {

                    $sql="SELECT * from policestaffdetails where pl_id=$plid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $psid=$fdata['pl_ps_id'];
                    //$oldpl=$fdata['t_frm_pl_id'];
                    }


                $sql="select * from cases where c_id=$cid and c_ps_id=$psid";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $flaf=3;
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $csi=$fdata['c_cstatus_i'];
                      if($csi>4)
                      {
                        $flaf=2;
                      }
                    }

                }

                if($flaf==3)
                {
                    $sql="SELECT * from policestaffdetails where pl_id=$newpl";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    $fdata = $result->fetch_array(MYSQLI_ASSOC);
                    $newrnk=$fdata['pl_rank'];
                    //$oldpl=$fdata['t_frm_pl_id'];
                    } 

                    if($rnk<$newrnk)
                        $flaf=1;
                    else if($plid==$newpl)
                        $flaf=1;
                    else
                        echo "<script> alert('You Do Not Have Permission To Add This Staff'); </script>";
                        header("Refresh:0; url=updatecasedetails.php");
                }


                if($flaf==1)
                {

                   $sql="select * from allotedcases where c_id=$cid and pl_id=$newpl ";

                   $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                        echo "<script> alert('This Staff Is Already Assigned With The Same Case!!'); </script>";
                    header("Refresh:0; url=updatecasedetails.php");
                    
                    }

                    else
                    {


                    $sql="INSERT into allotedcases values(NULL,'$newpl','$cid','$d')";
                    if ($conn->query($sql) === TRUE) {
                    echo "<script> alert('Addition Of Staff successfully !'); </script>";
                    header("Refresh:0; url=updatecasedetails.php");
                    } 
                    else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    }


                }

                elseif($flaf==2)
                {
                    echo "<script> alert('Case Has Been Solved Or Suspended!!'); </script>";
                    header("Refresh:0; url=updatecasedetails.php");

                }

                elseif($flaf==0)
                {
                    echo "<script> alert('Case Does Not Exist Or You Do Not Have Permission To Add Staff To The Case!!'); </script>";
                    header("Refresh:0; url=updatecasedetails.php");

                }

                $conn->close();

?>