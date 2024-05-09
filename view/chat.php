
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6b20b1c14d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="chat.css">
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-6">

                    <div class="card card-bordered">

                        <div class="card-header">
                            <a href="home.html">
                                <i class="fas fa-chevron-circle-left back-btn" aria-hidden="true"></i> </a>

                            <h4 class="caller name"><strong>Thomas Maurice</strong></h4>
                        </div>


                        <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                            style="overflow-y: scroll !important; height:400px !important;">
                     




                            <div class="media-body">

                    
                               <p> <?php 

                            require_once '../controller/DBController.php' ;
                            require_once '../controller/chatController.php' ;
     
                            
                            $db=new DBController ;
                            $mess =new message ;

                            $mess->getLastestMessage();
                            
                        
                            ?>  </p>
 
                       
                               
                            </div>





                       



                        </div>
                    </div>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                    </div>
                </div>




                


                <form method="post" action="<?php



                       
                
                
require_once '../controller/DBController.php' ;
require_once '../controller/chatController.php' ;

     
     $db=new DBController ;

     $mess =new message ;

     $chat_id=1 ;
     $voice="ttt";
     $isVoice=0;



     if (isset($_POST['sendBtn'])) {
        $text = $_POST['txt'];
        
        $mess->sendMessage($text,$chat_id,$voice,$isVoice);
    }

 




?> ">

                    <input type="text" name="input" class="publisher-input">


                    <div class="publisher bt-1 border-light ">

                        <input class="publisher-input" type="text" placeholder="message" name="txt">
                        <!--<a class="publisher-btn" href="#" data-abc="true"><i class="fa fa-microphone"></i></a>-->



                       <!-- <button id="record-button">Record</button>
                        <button id="stop-button" disabled>Stop</button>
                        <audio id="audio-player" controls></audio> -->



                        <button id="start-record">Start Recording</button> 
                        <button id="stop-record">Stop Recording</button>
                        <audio id="player" controls></audio>



                        <a class="" href="#" data-abc="true"><i
                                class=""></i></a>
                               <!-- fa fa-paper-plane-->
                        <button type="submit" name="sendBtn" class="publisher-btn text-info">Send</button>

                    </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </form>


    <!-- el function de java 3'irha nta b2a lE php good luck from BOBA😘-->



<!-- ******************************************************************-->


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->





<!-- 

<div id="latest-message"></div>

<script>
  $(document).ready( {
    // Submit the form data via AJAX
    $('#message-form').submit(function(event) {
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'submit.php',
        data: $(this).serialize(),
        success: function() {
          // Retrieve the latest message via AJAX and update the page
          $.ajax({
            url: 'latest-message.php',
            success: function(response) {
              $('#latest-message').html(response);
            },
            error: function() {
              alert('Error retrieving latest message!');
            }
          });
        },
        error: function() {
          alert('Error submitting message!');
        }
      });
    });
  });
</script>
 -->






















<!-- 

    <script>
        const chatContent = document.getElementById('chat-content');
        const input = document.querySelector('.publisher-input');
        const sendBtn = document.querySelector('.publisher-btn.text-info');

        sendBtn.addEventListener('click', () => {
            const message = input.value.trim();
            if (message) {
                const p = document.createElement('p');
                p.textContent = message;
                chatContent.appendChild(p);
                input.value = '';
                chatContent.scrollTop = chatContent.scrollHeight;
            }
        });
    </script>
 -->




    <!-- // $chatContent = $document.getElementById('chat-content'); 
// $input = $document.querySelector('.publisher-input');
// $sendBtn = $document.querySelector('.publisher-btn.text-info');

// if (isset($_POST['sendBtn'])) {
//     $message = trim($_POST['input']);
//     if (!empty($message)) {
//         $p = '<p>' . $message . '</p>';
//         $chatContent .= $p;
//         $input = '';
//         $chatContent = strlen($chatContent);
//     } 
// }
//  -->



<script src="https://cdn.jsdelivr.net/npm/@uppy/core@1.24.1/dist/uppy.min.js"></script>




<script>

const startButton = document.querySelector('#start-record');
const stopButton = document.querySelector('#stop-record');
const player = document.querySelector('#player');

let chunks = []; 
let rec;

startButton.addEventListener('click', () => {
  navigator.mediaDevices.getUserMedia({ audio: true })
    .then(stream => {
      rec = new MediaRecorder(stream);
      rec.start();
      startButton.disabled = true;
      stopButton.disabled = false;
    }) 
});

stopButton.addEventListener('click', () => {
  rec.stop();
  startButton.disabled = false;
  stopButton.disabled = true;
});

rec.addEventListener('dataavailable', e => {
  chunks.push(e.data);
});

rec.addEventListener('stop', () => {
  const blob = new Blob(chunks);
  saveAudio(blob);  
});

function saveAudio(blob) {
  const formData = new FormData();
  formData.append('audio_data', blob);
  
  fetch('/save_audio.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(data => {
      console.log('Audio saved successfully!');
      playAudio(data.url);
    })
    .catch(err => console.log(err)); 
}

function playAudio(url) {  
  player.src = url;
  player.play();
}

</script>






<script>
  var stream = navigator.mediaDevices.getUserMedia({ audio: true });
  var recorder = new MediaRecorder(stream);

  var chunk = [];
  recorder.addEventListener('dataavailable', function(event) {
    chunks.push(event.data);
  });

  document.getElementById('start-record').addEventListener('click', function() {
    recorder.start();
  });
</script>



</body>

</html>