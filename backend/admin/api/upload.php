<?php
include "../../config.php";
if(isset($_POST['title']))
{
    $name="";
    $album=$_POST['Album'];   
    if($album==-1)
    {
        $sql="INSERT INTO  album(name)
          VALUES ('".$_POST['newAlbum']."') ";
        if($result=mysqli_query($conn,$sql))
        {
            $sql="SELECT * FROM album WHERE name='".$_POST['newAlbum']."'";
            if($result=mysqli_query($conn,$sql))
            {
                $album=mysqli_fetch_assoc($result)['id'];
            }else{
                echo("fetching data failed");
                die();
            }
        }
        else{
            echo("new album creation failed");
            die();
        }
        
    }
    if($album==="NULL") $album=0;
    $sql="INSERT INTO songs(title,lang,album)
          VALUES ('".$_POST["title"]."',".$_POST['langauge'].",".$album.") ";
    if($result=mysqli_query($conn,$sql))
    {
        echo("row created with title,lang,album id");
        $sql="SELECT id FROM songs WHERE title='".$_POST['title']."'";
        if($result=mysqli_query($conn,$sql))
        {
            $name=mysqli_fetch_assoc($result)['id'];
            $extimg=".".pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
            $extsong=".".pathinfo($_FILES['song']['name'], PATHINFO_EXTENSION);
            $sql="UPDATE songs SET image='".$name.$extimg."' ,audio='".$name.$extsong."' WHERE id=".$name."";
            if($result=mysqli_query($conn,$sql))
            {
                echo("song name & image name updated");
                if(isset($_FILES['cover'])&&isset($_FILES['song']))
                {
                    move_uploaded_file($_FILES['cover']['tmp_name'],"../../media/images/".$name.$extimg);
                    echo("done image");
                    move_uploaded_file($_FILES['song']['tmp_name'],"../../media/songs/".$name.$extsong);
                    echo("done song");
                }
               else{
                    echo("setting cover & song failed");
                }
            }else{
                echo("song image updation failed in database");
            }
        }
        else{
            echo("fetching id fails");
        }
           
            
    }else{
        echo("creating row failed");
    }
}


?>