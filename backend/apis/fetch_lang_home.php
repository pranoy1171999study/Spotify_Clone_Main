<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "http://127.0.0.1:5501" || $http_origin == "https://pranoy1171999study.github.io")
{  
    header("Access-Control-Allow-Origin: $http_origin");
}
$output=new stdClass;
$output->status=false;
$output->path="http://localhost/phppranoy/projects/Spotify_Clone/backend/media/";
$output->data="null";
$sql="SELECT * FROM languages WHERE sort_path IS NOT NULL ORDER BY id DESC LIMIT 10";
include "../config.php";
$result=mysqli_query($conn,$sql) or die(json_encode($output));
if(mysqli_num_rows($result)>0)
{
    $output->status=true;
    $output->data=mysqli_fetch_all($result,MYSQLI_ASSOC);
}
echo json_encode($output);
?>