// Elements
const main = document.querySelector(".main");
const video = document.querySelector(".video");

// Buttons
const playbackButton = document.getElementById("playback-button");
const fullscreenButton = document.getElementById("fullscreen-button");
const rewindButton = document.getElementById("rewind-button");
const skipButton = document.getElementById("skip-button");

// Inputs
const progressBar = document.getElementById("progress-bar");

// Labels
const remainingLabel = document.getElementById("remaining-label");
const totalLabel = document.getElementById("total-label");

// Icons
const playbackButtonIcon = document.getElementById("playback-button-icon");
const fullscreenButtonIcon = document.getElementById("fullscreen-button-icon");

// Functions
function format(s) {
    var m = Math.floor(s / 60);
    m = m >= 10 ? m : "0" + m;
    s = Math.floor(s % 60);
    s = s >= 10 ? s : "0" + s;
    return m + ":" + s;
}

function setup() {
    progressBar.value = 0;
    playbackButtonIcon.classList.add("fa-play");
    playbackButtonIcon.classList.remove("fa-pause");
}

function togglePlayback() {
    if (video.paused) {
        video.play();
        playbackButtonIcon.classList.remove("fa-play");
        playbackButtonIcon.classList.add("fa-pause");
    } else {
        video.pause();
        playbackButtonIcon.classList.add("fa-play");
        playbackButtonIcon.classList.remove("fa-pause");
    }
}

function toggleFullscreen() {
    if (!document.fullscreenElement) {
        main.requestFullscreen();
        fullscreenButtonIcon.classList.remove("fa-expand");
        fullscreenButtonIcon.classList.add("fa-compress");
    } else {
        document.exitFullscreen();
        fullscreenButtonIcon.classList.remove("fa-compress");
        fullscreenButtonIcon.classList.add("fa-expand");
    }
}

// Events
document.addEventListener("keyup", (event) => {
    if (event.code === "Space") {
        togglePlayback();
    }

    if (event.code === "KeyF") {
        toggleFullscreen();
    }
});

playbackButton.addEventListener("click", () => togglePlayback());
fullscreenButton.addEventListener("click", () => toggleFullscreen());

rewindButton.addEventListener("click", () => {
    video.currentTime -= 5;
});

skipButton.addEventListener("click", () => {
    video.currentTime += 5;
});

video.addEventListener("timeupdate", () => {
    const timeDifference = video.currentTime / video.duration;
    progressBar.value = timeDifference * 100; // Normalize

    totalLabel.innerText = format(video.duration);
    remainingLabel.innerText = format(video.currentTime);
});

video.addEventListener("loadedmetadata", () => {
    totalLabel.innerText = format(video.duration);
    remainingLabel.innerText = format(video.currentTime);
});

video.addEventListener("ended", () => setup());

progressBar.addEventListener("input", (event) => {
    const target = event.target.value / 100;
    const duration = video.duration;
    const newValue = target * duration;
    video.currentTime = newValue;

    if (video.paused) {
        togglePlayback();
    }
});

// Setting up
setup();
