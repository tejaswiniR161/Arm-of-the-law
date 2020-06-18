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
            header("Refresh:0; url=commhome.php");
            elseif ($arr[0]==2)
            header("Refresh:0; url=dcphome.php");
            elseif ($arr[0]==3)
            header("Refresh:0; url=acphome.php");
            elseif ($arr[0]==4)
            header("Refresh:0; url=pihome.php");
            elseif ($arr[0]==5)
            header("Refresh:0; url=psihome.php");
        }
?>