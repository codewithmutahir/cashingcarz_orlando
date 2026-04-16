
const videoUrls = [
    "https://videos.pexels.com/video-files/3974558/3974558-hd_1920_1080_30fps.mp4",
    "https://videos.pexels.com/video-files/3066446/3066446-sd_960_506_24fps.mp4",
    "https://videos.pexels.com/video-files/2524618/2524618-sd_640_360_30fps.mp4",
    "https://videos.pexels.com/video-files/1860079/1860079-sd_640_360_25fps.mp4",
    "https://videos.pexels.com/video-files/2103099/2103099-sd_640_360_30fps.mp4"
];

// Get a random video URL
const randomVideoUrl = videoUrls[Math.floor(Math.random() * videoUrls.length)];

// Set the video source dynamically
const videoSource = document.getElementById('videoSource');
videoSource.src = randomVideoUrl;

// Reload the video to apply the new source
const videoElement = document.querySelector('.intro-video');
videoElement.load();

