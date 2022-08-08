//console.log("temp_data.js");
var homeSongList="null";
var homeAlbumList="null";
var homeLangList="null";//for langauges
var searchAlbumList;


var currAlbum="null";
var currScreen="home";//only home album or songs
var currSongList;
currSongList=[
    {data :{title: "Do Pal Ruka Lyrics in Hindi from Veer Zaara movie.", audio: "songs/1.mp3" , image: "img/cover4.jpg" }}
];
var tempSongList=currSongList;
var tempAlbumList;
tempAlbumList=currSongList;
//which is playing currently
var currSongPath="";
var currSongIndex=0;

//song initializer(player)
let audioElement= new Audio('songs/1.mp3');
audioElement.preload="auto";
let masterPlay;
let myProgressBar;
let gif ;
let songItems;
let songInfoName;
let leftSong;
let rightSong;
let currentSongIndex=0;
//let songs = currSongList;
let sfp;
let sip;


//initialize langauges
$.get(apiUrl+"/fetch_lang_home.php",{
                },function(response){
                    var result = JSON.parse(""+response);
                    if(result.status===true)
                    {
                        var data=result.data;
                        homeLangList=result;
                    }
                        
                });

