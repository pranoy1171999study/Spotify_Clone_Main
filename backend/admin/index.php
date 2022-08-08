<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loader.css">

    <?php
    include "../config.php";
    
    $sqllang="SELECT id,name FROM languages";
    $resultlang=mysqli_query($conn,$sqllang) or die("query failed");
    $sqlalb="SELECT id,name FROM album";
    $resultalb=mysqli_query($conn,$sqlalb) or die("query failed");
    ?>
    <script src="jquery.js"></script>
    <script src="https://codepen.io/fbrz/pen/9a3e4ee2ef6dfd479ad33a2c85146fc1.js"></script>
</head>
<body>
    <div class="container">
        <div id="cheecker">checking...</div>
        <form id="form" action="api/upload.php" method="POST"  enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="stitle" placeholder="Title" name="title" style="margin-left:200px; margin-top: 20px;">
            <br>
            <label for="langauge">Language</label>
            
            <select name="langauge" id="lang" style="margin-left:171px; margin-top: 10px;">
            <?php
            if(mysqli_num_rows($resultlang)>0)
            {
                while($row=mysqli_fetch_assoc($resultlang))
                {
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
            }
            ?>
            </select><br>
            
            <label for="Album">Album</label>
            <select name="Album" id="album" style="margin-left:189px; margin-top: 10px;">
                <option value="NULL" selected>choose album</option>
                <option value="-1">create new</option>
                <?php
                if(mysqli_num_rows($resultalb)>0)
                {
                    while($row=mysqli_fetch_assoc($resultalb))
                    {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
                ?>
            </select><br>
            <input type="text" name="newAlbum" id="newAlbum" style="margin-left:236px; margin-top: 10px; display: none;" placeholder="new album name"><br>
            <label for="cover" >Photo</label>
            <input id="image" type="file" accept="image/png, image/jpeg" class="myFile" name="cover" style="margin-left:196px; margin-top: 10px;" ><br>
            <label for="file" >Audio File</label>
            <input id="song" type="file" accept="audio/mpeg , audio/mp4" class="myFile" name="song" style="margin-left:164px; margin-top: 10px;" ><br>
            <input type="submit" id="submit" style=" width: 20%; min-width: 150px; height: 30px; margin-left:30%; margin-top: 50px;">
          </form>
    </div>
    <div id="loader">
        <div id="shadow"></div>
        <div id="box"></div>
    </div>

</body>
<script>
    var album=document.getElementById("album");
    var submit=document.getElementById("submit");
    var newAlbum=document.getElementById("newAlbum");
    album.addEventListener('change',()=>{
        if(album.value==-1)
        {
            newAlbum.style.display="block";
        }
        else{
            newAlbum.style.display="none";
        }
    })
    submit.addEventListener('submit',(event)=>
    {
        alert("done");
    })


//handle submit
$(document).ready(function() {

    var loader=$("#loader");
    var submitBtn=$("#submit");
    
    var cheeck=false;
    /*
    $("#form").on('submit',(event)=>{
        if(!cheeck){
            event.preventDefault(); 
            cheeck=true;
        loader.show();
        }
        else{
            
       $("#form").submit();
        }

    });  */
    var stitle=document.getElementById("stitle");
    var newAlbumName=document.getElementById("newAlbum");
    var cheecker=document.getElementById("cheecker");
    stitle.addEventListener('change',()=>{
        //cheeck title name available or not
        if(stitle.value.length>3)
        {
            $.post("api/title_cheeck.php",{
                "name" : stitle.value
            },function(response){
                var res=JSON.parse("" + response);
                alert(response);
            });
        }
        else
        {
            cheecker.innerText="should be >3 characters";
        }
    });
    newAlbumName.addEventListener('change',()=>{
        //cheeck album name available or not
        if(newAlbumName.value.length>3)
        {
            $.post("api/album_cheeck.php",{
                "name" : newAlbumName.value
            },function(response){
                var res=JSON.parse("" + response);
                alert(response);
            });
        }
        else
        {
            cheecker.innerText="should be >3 characters";
        }
    });
    //cheeck file size before uploading
    //binds to onchange event of your input field
    $('#image').bind('change', function() {
        if(this.files[0].size<20000 || this.files[0].size>500000)
        {
            alert("Photo should be between 20KB to 500KB");
            $('#image').val(null);
        }
    });
    $('#song').bind('change', function() {
        if(this.files[0].size<20000 || this.files[0].size>100000000)
        {
            alert("Photo should be between 20KB to 100MB");
            $('#song').val(null);
        }
    });

});


/*
function hiii()
{
    $.post("api/duplicacy_cheeck.php",{
            "name" : $("#stitle").val();
        },function(response){
            var res=JSON.parse(""+response);
            alert(res);
        });
}*/

</script>

<!--Handle submit -->

</html>