<?php
include "allowHeader.php";
$string=$_POST['name'];
$string=" ".$string;
$sendIt=new stdClass;
$sendIt->status=false;
$sendIt->songs=false;
$sendIt->albums=false;
$sendIt->songsStatus=false;
$sendIt->albumsStatus=false;
$sendIt->path=$url;
$sendIt->massage="available";
        include "../config.php";
        $words=array();
        $count=0;
        $l=1;
        for($i=0;$i<strlen($string);$i++)
        {
            if($string[$i]===" "||$i==strlen($string)-1)
            {
                $word=substr($string,$l,$i-$l);
                if(strlen($word)>0)
                {
                    $words[$count]=$word;
                    $l=$i+1;
                    $count++;
                }
            }
        }
        if($count>0)
        {
             //fetch songs
        $sqls="SELECT * FROM songs WHERE";//title='{$tname}'
        $temp="";
        $count=0;
        foreach($words as $val)
        {
            if($count==0)
                $temp.=" title LIKE '%{$val}%'";
            else 
                $temp.=" AND title LIKE '%{$val}%'";
            $count++;
        }
        //echo($sql.$temp);
        if($query=mysqli_query($conn,$sqls.$temp))//." LIMIT 10 "
        {
            //query successfull
            if(mysqli_num_rows($query)>0)
            {
                $sendIt->songs=mysqli_fetch_all($query,MYSQLI_ASSOC);
                $sendIt->status=true;
                $sendIt->songsStatus=true;

            }
        }

        //fetch albums
        $sqla="SELECT * FROM album WHERE";//title='{$tname}'
        $temp="";
        $count=0;
        foreach($words as $val)
        {
            trim($string,'\n');
            if($count==0)
                $temp.=" name LIKE '%".substr($val,strlen($val)-1)."%'";
            else 
                $temp.=" AND name LIKE '%{$val}%'";
            $count++;
        }
        //echo($sql.$temp);
        if($query=mysqli_query($conn,$sqla.$temp." LIMIT 10"))
        {
            //$sendIt->albums=$sqla.$temp;//
            //query successfull
            if(mysqli_num_rows($query)>0)
            {
                $sendIt->albums=mysqli_fetch_all($query,MYSQLI_ASSOC);
                $sendIt->status=true;
                $sendIt->albumsStatus=true;
            }
        }
    }
       
       
        echo json_encode($sendIt);
?>