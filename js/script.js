
//console.log("script running");
//trimming song names\
    masterPlay= document.getElementById('masterPlay');
    myProgressBar = document.getElementById('myProgressBar');
    gif = document.getElementById('gif');
    var mp_song_img=document.getElementById("song-image-mp");
    songInfoName=document.getElementById('songInfoName');
    leftSong=document.getElementById('leftSong');
    rightSong=document.getElementById('rightSong');
    var currTime= document.getElementById("currTime");
    var totalTime=document.getElementById("totalTime");
    currTime.innerHTML="<div class='loaderTimer'></div>";
    totalTime.innerHTML="";
    //console.log(audioElement.duration);
    var playPromise;
function part1()
{
    //console.log("part 1 called");
    songIndex=0;
    songItems =Array.from( document.getElementsByClassName("songItem"));
    currentSongIndex=0;
//let songs = currSongList;
    sfp=currSongPath+"";
    sip=currSongPath;
}
function part2()
{
    //console.log("part 2 called");
    //console.log(currSongList);
    if(currScreen=="album")
    {
    part1();
    sfp=currSongPath+"songs/";
    sip=currSongPath;
    part3();
    }
    
}

if(currScreen=="album")
{
    part2();
//audioElement.play();
//handle play/pause click
}
function mpPlay()
{
    //songInfoName.innerText=currSongList[i].title;
    playPromise=audioElement.play();
    //currTime.innerText=TimeFormatChange(audioElement.currentTime);
    //totalTime.innerText=TimeFormatChange(audioElement.duration);
    currTime.innerHTML="<div class='loaderTimer'></div>";
    totalTime.innerHTML="";
    masterPlay.classList.remove('fa-circle-play');
    masterPlay.classList.add('fa-circle-pause');
    gif.style.opacity=1;
}
function mpPause()
{
    if(!audioElement.paused)
    {
        if (playPromise !== undefined) {
            //playPromise.then(() => {
              
                totalTime.innerText=TimeFormatChange(audioElement.duration);
                audioElement.pause();
                masterPlay.classList.remove('fa-circle-pause');
                masterPlay.classList.add('fa-circle-play');
                gif.style.opacity=0;
           // })
        }
    }
    
}
masterPlay.addEventListener('click',()=>{
    //var currSongItems=document.getElementsByClassName()
    //var currentSongItem=songItems[currentSongIndex]; //document.getElementById(currentSongIndex);
    if(audioElement.paused||audioElement.currentTime<=0){
        mpPlay();
        //handle song item in list
        //currentSongItem.classList.remove('fa-circle-play');
        //currentSongItem.classList.add('fa-circle-pause');
    }
    else{
        mpPause();
        //handle song item in list
        //currentSongItem.classList.add('fa-circle-play');
        //currentSongItem.classList.remove('fa-circle-pause');
    }
    updateProgressBar();
})
//listen events
myProgressBar.addEventListener('input',()=>{
    //console.log(audioElement);
    if(!audioElement.paused)
    {
        mpPause();
        audioElement.currentTime=parseInt((myProgressBar.value/100) * audioElement.duration);
        mpPlay();
    }
   
})
function TimeFormatChange(t)
{
        var m=Math.floor(t/60);
        var s=Math.floor(t-m*60);
        if(s.NaN!=NaN)
            return m+":"+s;
        else return "";
    
}

window.setInterval('handleDuration()', 100);
function handleDuration()
{
    if(!audioElement.paused&&audioElement.currentTime>=audioElement.duration-0.11)
    {
        mpPause();
        songForward();
    }
    if(!TimeFormatChange(audioElement.duration).includes("N"))
    {
        currTime.innerText=TimeFormatChange(audioElement.currentTime);
        totalTime.innerText=TimeFormatChange(audioElement.duration);
    }
    
}

function updateProgressBar(){
    audioElement.addEventListener('timeupdate',()=>{
        //update seekbar when it is not active
            //console.log(audioElement.currentTime);
            progress=parseInt((audioElement.currentTime/audioElement.duration)*100);
            myProgressBar.value=progress;
            
    })
}

function part3(){

Array.from(document.getElementsByClassName('songItem')).forEach((element,i)=>{
    element.addEventListener('click',(e)=>{
        currSongList.data=tempSongList.data;
        currSongList.path=tempSongList.path;
        //if(!audioElement.paused)
            mpPause();
            //audioElement.pause();
            audioElement=new Audio(currSongList.path+"songs/"+currSongList.data[i].audio);
            songInfoName.innerText=currSongList.data[i].title;
            mp_song_img.style.backgroundImage="url('"+currSongList.path+"images/"+currSongList.data[i].image+"')";
            audioElement.preload="auto";
            totalTime.innerText=TimeFormatChange(audioElement.duration);
            
            currentSongIndex=i;
            mpPlay();
            updateProgressBar();
        //}
        
    })
})

}
//for playing home songs
function onClickSongPlayCards()
{
    Array.from(document.getElementsByClassName('songPlayCard')).forEach((element,i)=>{
        element.addEventListener('click',(e)=>{
            currSongList.data=homeSongList.data;
            sip=homeSongList.path;
            sfp=homeSongList.path+"songs/";
             //if(!audioElement.paused)
            mpPause();
               
                audioElement=new Audio(sfp+currSongList.data[i].audio);
                songInfoName.innerText=currSongList.data[i].title;
                mp_song_img.style.backgroundImage="url('"+sip+"images/"+currSongList.data[i].image+"')";
                audioElement.preload="auto";
                totalTime.innerText=TimeFormatChange(audioElement.duration);
                currentSongIndex=i;
                mpPlay();
                updateProgressBar();
            //}
            
        })
    })
}
//onClickSongPlayCards();
//for playing searched songs
function onClickSearchSongPlayCards()
{
    if(Array.from(document.getElementsByClassName('se-res-cardContainer')).length>0)
    Array.from(document.getElementsByClassName('se-res-cardContainer')).forEach((element,i)=>{
        element.addEventListener('click',(e)=>{
            currSongList.data=tempSongList.songs;
            sip=tempSongList.path;
            sfp=tempSongList.path;
            //if(!audioElement.paused)
            mpPause();
                
                audioElement=new Audio(sfp+"songs/"+currSongList.data[i].audio);
                songInfoName.innerText=currSongList.data[i].title;
                mp_song_img.style.backgroundImage="url('"+sip+"images/"+currSongList.data[i].image+"')";
                audioElement.preload="auto";
                totalTime.innerText=TimeFormatChange(audioElement.duration);
                currentSongIndex=i;
                mpPlay();
                updateProgressBar();
            
            
        })
    })
}
//if song compleated then play next song
audioElement.addEventListener('ended', (event) => {
    //when current song is ended
    mpPause();
});

//handle left right button
leftSong.addEventListener("click",()=>{
    songBackward();
})
rightSong.addEventListener("click",()=>{
    songForward();
})
function songBackward()
{
    if(currentSongIndex<=0)
    {
        alert("no song before this");
    }
    else
    {
            //makeAllPlays();
            mpPause();
            currentSongIndex--;
            //let ele=document.getElementById(currentSongIndex);
            //ele.classList.remove('fa-circle-play');
            //ele.classList.add('fa-circle-pause');
            audioElement=new Audio(sfp+currSongList.data[currentSongIndex].audio);
            audioElement.preload="auto";
            totalTime.innerText=TimeFormatChange(audioElement.duration);
            mp_song_img.style.backgroundImage="url('"+sip+"images/"+currSongList.data[currentSongIndex].image+"')";
            audioElement.currentTime=0;
            mpPlay();

            //masterPlay.classList.remove('fa-circle-play');
            //masterPlay.classList.add('fa-circle-pause');
            //gif.style.opacity=1;
            songInfoName.innerText=currSongList.data[currentSongIndex].title
;
            myProgressBar.value=0;
            updateProgressBar();
        

    }

}
function songForward()
{
    if(currentSongIndex>=currSongList.data.length-1)
    {
        alert("no song after this");
    }
    else
    {
            //makeAllPlays();
            mpPause();
            currentSongIndex++;
            //let ele=document.getElementById(currentSongIndex);
            //ele.classList.remove('fa-circle-play');
            //ele.classList.add('fa-circle-pause');
            audioElement=new Audio( sfp+currSongList.data[currentSongIndex].audio);
            audioElement.preload="auto";
            totalTime.innerText=TimeFormatChange(audioElement.duration);
            mp_song_img.style.backgroundImage="url('"+sip+"images/"+currSongList.data[currentSongIndex].image+"')";
            //audioElement.currentTime=0;
            //audioElement.play();

            //masterPlay.classList.remove('fa-circle-play');
            //masterPlay.classList.add('fa-circle-pause');
            //gif.style.opacity=1;
            mpPlay();
            songInfoName.innerText=currSongList.data[currentSongIndex].title
;
            myProgressBar.value=0;
            updateProgressBar();
    }

}

