<?php
$tname=$_POST['name'];
$sendIt=new stdClass;
$sendIt->status=false;
$sendIt->massage="available";

        include "../../config.php";
        $sql="SELECT * FROM songs WHERE title='{$tname}'";
        if($query=mysqli_query($conn,$sql))
        {
            //query successfull
            if(mysqli_num_rows($query)>0)
            {
                $sendIt->massage="Title Name already Exists Kindly use another one";
            }
            else  $sendIt->status=true;
        }else $sendIt->massage="Technical Error(query failed)";

        echo json_encode($sendIt);
?>