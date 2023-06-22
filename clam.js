console.log("Welcome to Spotify");

// Initialize the Variables
let songIndex = 0;
let audioElement = new Audio("relax/1.mp3");
let masterPlay = document.getElementById("masterPlay");
// let songItemPlay = document.getElementsByClassName("songItemPlay");
let myProgressBar = document.getElementById("myProgressBar");
let gif = document.getElementById("gif");
let masterSongName = document.getElementById("masterSongName");
let songItems = Array.from(document.getElementsByClassName("songItem"));
let currTime = document.querySelector(".current-time");
let totalDuration = document.querySelector(".total-duration");

let songs = [
  {
    songName: "Smoke",
    filePath: "relax/1.mp3",
    coverPath: "cover/1.jpeg",
  },
  {
    songName: "Acoustic Folk Music Guitar",
    filePath: "relax/2.mp3",
    coverPath: "cover/2.jpeg",
  },
  {
    songName: "Beautiful Trip",
    filePath: "relax/3.mp3",
    coverPath: "cover/3.jpeg",
  },
  {
    songName: "Good Morning Life",
    filePath: "relax/4.mp3",
    coverPath: "cover/4.jpeg",
  },
  {
    songName: "Epic Relaxing Flute Music",
    filePath: "relax/5.mp3",
    coverPath: "cover/5.jpeg",
  },
  {
    songName: "Meditation Relaxing and Chill",
    filePath: "relax/6.mp3",
    coverPath: "cover/6.jpeg",
  },
  {
    songName: "Love Mellow Piano",
    filePath: "relax/7.mp3",
    coverPath: "cover/7.jpeg",
  },
  {
    songName: "A Walk with God1111",
    filePath: "relax/8.mp3",
    coverPath: "cover/8.jpeg",
  },
  {
    songName: "Lofi Vintage",
    filePath: "relax/9.mp3",
    coverPath: "cover/9.jpeg",
  },
  {
    songName: "Atmospheric ambient",
    filePath: "relax/10.mp3",
    coverPath: "cover/10.jpeg",
  },
  {
    songName: "piano to 2023",
    filePath: "relax/11.mp3",
    coverPath: "cover/11.jpeg",
  },
  {
    songName: "For Documentary",
    filePath: "relax/12.mp3",
    coverPath: "cover/12.jpeg",
  },
  {
    songName: "Old Photo",
    filePath: "relax/13.mp3",
    coverPath: "cover/13.jpeg",
  },
  {
    songName: "A Piano to the Moon",
    filePath: "relax/14.mp3",
    coverPath: "cover/14.jpeg",
  },
 
];

songItems.forEach((element, i) => {
  console.log(element, i);
  element.getElementsByTagName("img")[0].src = songs[i].coverPath;
  element.getElementsByClassName("songName")[0].innerHTML = songs[i].songName;
});

//audioElement.play();

// Pause all song icon
function pauseall() {
  songItems.forEach((elements, i) => {
    var element1 = document.getElementById(i);
      element1.classList.remove("fa-circle-pause");
      element1.classList.add("fa-circle-play");
  });
}

// Start playing song icon
function startplay() {
  newsong = document.getElementById(songIndex);
  newsong.classList.remove("fa-circle-play");
  newsong.classList.add("fa-circle-pause");
}

// Stop playing song icon
function stopplay() {
  newsong = document.getElementById(songIndex);
  newsong.classList.remove("fa-circle-pause");
  newsong.classList.add("fa-circle-play");
}

// Handle Play/Pause Click
masterPlay.addEventListener("click", () => {
  if (audioElement.paused || audioElement.currentTime <= 0) {
    audioElement.play();
    masterPlay.classList.remove("fa-circle-play");
    masterPlay.classList.add("fa-circle-pause");
    startplay();
    gif.style.opacity = 1;
  } else {
    audioElement.pause();
    masterPlay.classList.remove("fa-circle-pause");
    masterPlay.classList.add("fa-circle-play");
    gif.style.opacity = 0;
    stopplay();
  }
});

// Listen to Events
audioElement.addEventListener("timeupdate", () => {
  //   console.log("timeUpdate");
  //Update Seekbar
  progress = parseInt((audioElement.currentTime / audioElement.duration) * 100);
  //console.log(progress);
  myProgressBar.value = progress;

  // Calculate current time left and total duration
  let currentMinutes = Math.floor(audioElement.currentTime / 60);
  let currentSeconds = Math.floor(
    audioElement.currentTime - currentMinutes * 60
  );
  let durationMinutes = Math.floor(audioElement.duration / 60);
  let durationSeconds = Math.floor(
    audioElement.duration - durationMinutes * 60
  );

  if (currentSeconds < 10) {
    currentSeconds = "0" + currentSeconds;
  }
  if (durationSeconds < 10) {
    durationSeconds = "0" + durationSeconds;
  }
  if (currentMinutes < 10) {
    currentMinutes = "0" + currentMinutes;
  }
  if (durationMinutes < 10) {
    durationMinutes = "0" + durationMinutes;
  }

  // Updated duration
  currTime.textContent = currentMinutes + ":" + currentSeconds;
  totalDuration.textContent = durationMinutes + ":" + durationSeconds;

});

myProgressBar.addEventListener("change", () => {
  audioElement.currentTime =
    (myProgressBar.value * audioElement.duration) / 100;
});

Array.from(document.getElementsByClassName("songItemPlay")).forEach(
  (element) => {
    element.addEventListener("click", (e) => {
      //   console.log(e.target);
      songIndex = parseInt(e.target.id);
      pauseall();
      //e.target.classList.remove("fa-circle-play");
      e.target.classList.add("fa-circle-pause");
      audioElement.src = `relax/${songIndex + 1}.mp3`;
      masterSongName.innerText = songs[songIndex].songName;
      audioElement.currentTime = 0;
      audioElement.play();
      gif.style.opacity = 1;
      masterPlay.classList.remove("fa-circle-play");
      masterPlay.classList.add("fa-circle-pause");
    });
  }
);

document.getElementById("next").addEventListener("click", () => {
  if (songIndex >= 14) {
    songIndex = 0;
  } else {
    songIndex += 1;
  }
  audioElement.src = `relax/${songIndex + 1}.mp3`;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play();
  pauseall();
  startplay();
  masterPlay.classList.remove("fa-circle-play");
  masterPlay.classList.add("fa-circle-pause");
});

document.getElementById("previous").addEventListener("click", () => {
  if (songIndex <= 0) {
    songIndex = 0;
  } else {
    songIndex -= 1;
  }
  audioElement.src = `relax/${songIndex + 1}.mp3`;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play();
  pauseall();
  startplay();
  masterPlay.classList.remove("fa-circle-play");
  masterPlay.classList.add("fa-circle-pause");
});

audioElement.onended = function() {
  // change the song index to the index of next song, if the song is the last one in the playlist then the next should be the first one
  if (songIndex >= 14) 
    songIndex = 0;
  else 
    songIndex += 1;

  this.src = `relax/${songIndex + 1}.mp3`;
  masterSongName.innerText = songs[songIndex].songName;
  this.currentTime = 0;
  // the audio player stops after playing each song, so after changing the src just launch the player
  this.play();
  pauseall();
  startplay();
  masterPlay.classList.remove("fa-circle-play");
  masterPlay.classList.add("fa-circle-pause");
}


