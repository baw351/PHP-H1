<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Player</title>
  <link rel="stylesheet" href="./disc.css">
</head>

<?php

/*include 'disc/functions_disc.php';
$videoName = isset($_GET['video']) ? $_GET['video'] : die('Nom de la vidéo non spécifié.');
$playervid*/
?>

<body>
  
  <div class="player">

    <div class="video_volume">
      <div class="video_volume_value"></div>
    </div>

    <div class="video_disc_time"></div>
    <div class="video_disc">
      <video>
        <source type="video/mp4" src="./Rick Astley - Never Gonna Give You Up (Official Music Video).mp4" />
      </video>

      <button type="button" class="play">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
        </svg>
      </button>
      <button type="button" class="pause is-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <p class="video_time">
      <span class="video_time_current">00:00</span>
      /
      <span class="video_time_duration">00:00</span>
    </p>
    
    <div class="video_controls">
      <button type="button" class="video_btn mute">
        Mute
      </button>
      <button type="button" class="video_btn unmute is-hidden">
        Unmute
      </button>
      <button type="button" class="video_btn volplus">
        +
      </button>
      <button type="button" class="video_btn volminus">
        -
      </button>
      <button type="button" class="video_btn fullscreen">
        Fullscreen
      </button>
      <button type="button" class="video_btn prev">
        Previous
      </button>
      <button type="button" class="video_btn next">
        Next
      </button>

    </div>
  </div>

  <script>
    let $video = document.querySelector('.player video');

    let $durationText = document.querySelector('.video_time_duration');
    let $currentTimeText = document.querySelector('.video_time_current');

    let $play = document.querySelector('.player .play');
    let $pause = document.querySelector('.player .pause');
    let $mute = document.querySelector('.player .mute');
    let $unmute = document.querySelector('.player .unmute');
    let $volplus = document.querySelector('.player .volplus');
    let $volminus = document.querySelector('.player .volminus');
    let $volumeValue = document.querySelector('.video_volume_value');
    let $timeValue = document.querySelector('.video_disc_time');
    let $fullscreen = document.querySelector('.player .fullscreen');
    


    let calcDecimal = function (num1, num2, ope) {
      let result;

      if (ope === '-') {
        result = num1 - num2;
      } else {
        result = num1 + num2;
      }

      return Math.round(result * 10) / 10;
    };

    $video.addEventListener('click', function () {
      if ($video.paused) {
        $video.play();
      } else {
        $video.pause();
      }
    });
    
    $video.addEventListener('play', function() {
      $play.classList.add('is-hidden');
      $pause.classList.remove('is-hidden');
  
  document.querySelector('.player').classList.add('playing');
});

$video.addEventListener('pause', function() {
  $play.classList.remove('is-hidden');
  $pause.classList.add('is-hidden');
  
  document.querySelector('.player').classList.remove('playing');
});


    $play.addEventListener('click', function () {
      $video.play();
    });

    $pause.addEventListener('click', function () {
      $video.pause();
    });

    $mute.addEventListener('click', function () {
      $video.muted = true;
    });

    $unmute.addEventListener('click', function () {
      $video.muted = false;
    });

    $volplus.addEventListener('click', function () {
      if ($video.volume < 1) {
        $video.volume = calcDecimal($video.volume, 0.1, '+');
      }
    });

    $volminus.addEventListener('click', function () {
      if ($video.volume > 0) {
        $video.volume = calcDecimal($video.volume, 0.1, '-');
      }
    });

    $fullscreen.addEventListener('click', function () {
      toggleFullScreen($video);
    });
    function toggleFullScreen(element) {
      if (!document.fullscreenElement) {
        if (element.requestFullscreen) {
          element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
          element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
          element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
          element.msRequestFullscreen();
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    }

    $video.addEventListener('play', function() {
      $play.classList.add('is-hidden');
      $pause.classList.remove('is-hidden');
    });

    $video.addEventListener('pause', function() {
      $play.classList.remove('is-hidden');
      $pause.classList.add('is-hidden');
    });

let $prev = document.querySelector('.player .prev');

$prev.addEventListener('click', function () {
  $video.src = 'Rick Astley - Never Gonna Give You Up (Official Music Video).mp4';
  $video.load();
  $video.play(); 
});

let $next = document.querySelector('.player .next');

$next.addEventListener('click', function () {
  $video.src = 'HEYYEYAAEYAAAEYAEYAA.mp4';
  $video.load();
  $video.play(); 
});

$video.addEventListener('volumechange', function () {
  if ($video.muted) {
    $mute.classList.add('is-hidden');
    $unmute.classList.remove('is-hidden');
    $volumeValue.classList.add('is-hidden');
  } else {
    $mute.classList.remove('is-hidden');
    $unmute.classList.add('is-hidden');
    $volumeValue.classList.remove('is-hidden');
  }
  
  $volumeValue.style.height = ($video.volume * 100) + '%';
});

$video.addEventListener('canplay', function () {
  let mins = Math.floor($video.duration / 60);
  let secs = Math.round($video.duration % 60);
  if (mins < 10) {
    mins = '0' + mins;
  }
  if (secs < 10) {
    secs = '0' + secs;
  }
  
  $durationText.textContent = mins + ':' + secs;
  
  console.log($video.volume);
  $volumeValue.style.height = ($video.volume * 100) + '%';
});

$video.addEventListener('timeupdate', function() {
  let mins = Math.floor($video.currentTime / 60);
  let secs = Math.round($video.currentTime % 60);
  if (mins < 10) {
    mins = '0' + mins;
  }
  if (secs < 10) {
    secs = '0' + secs;
  }
  
  $currentTimeText.textContent = mins + ':' + secs;
  let percent = $video.currentTime / $video.duration * 100;
  let reversePercent = 100 - percent;
  $timeValue.style.backgroundImage = 'linear-gradient(to right, transparent ' + reversePercent + '%, white 0%)';
});
</script>
</body>
</html>