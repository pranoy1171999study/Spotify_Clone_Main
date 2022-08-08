
//console.log("script running");

//let songIndex=0;
let audioElement= new Audio('songs/2.mp3');
let masterPlay= document.getElementById('masterPlay');
let myProgressBar = document.getElementById('myProgressBar');
let gif = document.getElementById('gif');
let songItems =Array.from( document.getElementsByClassName("songItem"));
let songInfoName=document.getElementById('songInfoName');
let leftSong=document.getElementById('leftSong');
let rightSong=document.getElementById('rightSong');
let currentSongIndex=0;
//let songs = currSongList;
let sfp=currSongPath+"songs/";
let sip=currSongPath;
/*
let songs=[
    {title: "Do Pal Ruka Lyrics in Hindi from Veer Zaara movie.", audio: "songs/4.mp3" , image: "img/cover4.jpg" },
    {title: "টাপুর টুপুর বৃষ্টি নুপুর,  জল ছবিরই গায়  তুই যে আমার একলা আকাশ মেঠো সুর", audio: "songs/2.mp3" , image: "img/cover2.jpg" },
    {title: "Naam Na Jana Pakhi Lyrics (নাম না জানা পাখি) Arijit Singh", audio: "songs/3.mp3" , image: "img/cover3.jpg" },
    {title: "Radha Lyrics (রাধা) Asur", audio: "songs/4.mp3" , image: "img/cover4.jpg" },
    {title: "Har Ghadi Badal Rahi Hai Roop Zindagi / हर घडी बदल रही है रूप ", audio: "songs/5.mp3" , image: "img/cover5.jpg" },
    {title: "Jhiri Jhiri Swapna Jhore Lyrics (ঝিরি ঝিরি স্বপ্ন ঝরে)", audio: "songs/6.mp3" , image: "img/cover6.jpg" }
]
*/
//trimming song names\