<!DOCTYPE html>
<html>
    <head>
        <title>HydraChat - Alpha Version - Video Meetings</title>
        <link rel="stylesheet" type="text/css" href="reset.css" media="screen">
        <link rel="stylesheet" type="text/css" href="style.css" media="screen">
        <script src="socket.io.js"></script>
        <script src="simplewebrtc.bundle.js"></script>
        <script src="webrtc.bundle.js"></script>
        <script src="mediastream-gain.bundle.js"></script>
        <!--I have modified headtrackr.js' initiation to bypass getting camera media so that we do no get stuck in an infinite loop -->
        <script src="headtrackr.js"></script>
    </head>
    <body>
        
        <canvas id="inputCanvas"></canvas>
        <h1 id="hydra">Hydra</h1>
        <p id="loading">Beta Version.</p>
        <p id="capturing">Don't move while we measure your face.</p>
        <p id="ok">Okay all done enjoy.</p>
        <video id="localVideo"></video>
        <div id="remoteFeed">
                <div id="remotes">
                </div>
        </div>
        <div class="wrapper" id="bonjovi">
                <p id="username"></p>
                <p id="confLabel"></p>
                <p id="title">Call Staging in Progress...</p>
                <p id="inviteLabel"></p>
                <p id="subTitle"></p>
                <input type = "button" value = "Whisper" id = "whisper"></input>
        </div> 

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 

        <script>

            var video = document.getElementById("localVideo");
            var connected = false;
            var hydra = document.getElementById("hydra");
            var loadText = document.getElementById("loading");
            var dashboard = document.getElementById("bonjovi");
            var canvasInput = document.getElementById("inputCanvas");
            var ok = document.getElementById("ok");
            var capturing = document.getElementById("capturing");
            var whisper = document.getElementById("whisper");
            //var htracker = new headtrackr.Tracker({ui:false});
            var remoteVid;
            var max = "95%";
            var whisperThreshold = 25;
            var firstRead = true;
            var proximity;
            var face;
            var validNavigation = false;
            var lastOneIn = true;
            var premature = false;
            var whispering = false;
            

            
            var webrtc = new SimpleWebRTC({
                localVideoEl: 'localVideo',
                remoteVideosEl: 'remotes',
                autoRequestMedia: true,
                debug: true,
                detectSpeakingEvents: true,
                autoAdjustMic: true
            });
            

            // create our webrtc connection
          
            function setRoom(name) {
                $('#title').text("Device patched through.");
                $('#inviteLabel').text("On The Far Side: " + name);
              
            }

            //ajax call to db to check number of devices in room.
            function updateStagingProgress(){
                $.ajax({
                    url:"callstager.php",
                    type:"GET",
                    data: {confname: sessionStorage.confname,
                            devices: sessionStorage.stagingprogress},
                    timeout: 3000*60,
                    error: function(xhr){
                        console.log("Error: " + xhr.status + " " + xhr.statusText);
                        if(!checkRoomFull()){
                            updateStagingProgress();
                        }

                    },

                    success: function(data, status){
                        sessionStorage.setItem("stagingprogress", data);
                        if(!checkRoomFull()){
                            console.log("repolling the database");
                            updateprogress();
                            updateStagingProgress();
                        }else{
                           
                            makethelink();
                        }
                    }


                });
            }

         
            //function to check if room is full depending on the max capacity specified.
            function checkRoomFull(){
                var isRoomFull = false
                if(sessionStorage.confpeople == 2){
                    if(sessionStorage.stagingprogress == 2){
                        isRoomFull = true;
                    }else{
                        console.log(sessionStorage.stagingprogress + " out of 2 present.");
                    }
                }

                if(sessionStorage.confpeople == 3){
                    if(sessionStorage.stagingprogress == 6){
                        isRoomFull = true;
                    }else{
                        console.log(sessionStorage.stagingprogress + " out of 6 present.");
                    }
                }

                if(sessionStorage.confpeople == 4){
                    if(sessionStorage.stagingprogress == 12){
                        isRoomFull = true;
                    }else{
                        console.log(sessionStorage.stagingprogress + " out of 12 present.");
                    }
                }

                if(isRoomFull){
                    console.log("room is full: conference commences.");
                }
                return isRoomFull;
            }

            //ajax update for UI.
            function updateprogress(){
                if(sessionStorage.confpeople == 2)
                     $('#inviteLabel').text(sessionStorage.stagingprogress + "/2 ready");
                if(sessionStorage.confpeople == 3)
                     $('#inviteLabel').text(sessionStorage.stagingprogress + "/6 ready");
                if(sessionStorage.confpeople == 4)
                    $('#inviteLabel').text(sessionStorage.stagingprogress + "/12 ready");
            }

            //create ptp link with webrtc
            function makethelink(){
                $.get("gethernumber.php", {mynumber: sessionStorage.device, room: sessionStorage.confname}, function(data){
                    console.log(data.stub);
                    console.log(data.role);
                    console.log(data.peer);
                    var connectionStub = data.stub;
                    var role = data.role;
                    sessionStorage.setItem("peer", data.peer);

                    $('#inviteLabel').text("Patching you through to " + data.peer);
                    $('#title').text("Thanks for waiting.");

                    if(premature){
                        webrtc.joinRoom(data.stub);
                    }else{
                        webrtc.on('readyToCall', function(){ 
                            webrtc.joinRoom(data.stub); 
                        });
                    }
                }, "json");
            }

            function checkForWhisper(){
                $.ajax({
                    url:"checkwhisper.php",
                    type:"GET",
                    data: {confname: sessionStorage.confname,
                            uuid: sessionStorage.device,
                            whisperingto: sessionStorage.whisperingto},
                    timeout: 3000*60,
                    error: function(xhr){
                        console.log("Error: " + xhr.status + " " + xhr.statusText);
                        checkForWhisper();

                    },

                    success: function(data, status){
                        if(sessionStorage.whisperingto != data){
                            if(data == sessionStorage.peer){
                                whisper.style.background = "red";
                                whisper.value = "Whispering";
                                whispering = true;
                                whisper.disabled = false;
                                webrtc.setMicIfEnabled(1);
                            }
                            if(data == 'null'){
                                whisper.style.background = "#47d475";
                                whisper.value = "Whisper";
                                whispering = false;
                                whisper.disabled = false;
                                webrtc.setMicIfEnabled(1);
                            }
                            if(data != 'null' && data != sessionStorage.peer){
                                whisper.style.background = "#47d475";
                                whisper.value = "Whisper";
                                whispering = false;
                                whisper.disabled = true;
                                webrtc.setMicIfEnabled(0);
                            }

                            sessionStorage.setItem("whisperingto", data);
                            console.log("whisper status: " + sessionStorage.whisperingto);
                        }
                        
                        checkForWhisper();
                    }
                });                
            }

            $(document).ready(function(){
                //kick user back a page if he is not registered.

                if(sessionStorage.user == null){
                    validNavigation = true;
                    history.back();
                }

                sessionStorage.setItem("whisperingto", "null");
                sessionStorage.setItem("stagingprogress", 0);
                $('#confLabel').text("Conference: " + sessionStorage.confname);

                while($('#username').text() == "undefined" || $('#username').text() == ""){
                    $('#username').text("Name: " + sessionStorage.user);
                }

                whisper.disabled = true;
                $('#whisper').click(function(){
                    
                    //$('#whisper').style.background = "#47d475";
                    //this.value = 'Whispering';
                    if(!whispering){
                        console.log("whisper!");
                        $.ajax({
                            url:"updatewhisper.php",
                            type:"GET",
                            data: {confname: sessionStorage.confname,
                                whisperingto: sessionStorage.peer,
                                user: sessionStorage.user},
                            timeout: 10000,
                            error: function(xhr){
                                console.log("Error: " + xhr.status + " " + xhr.statusText);

                            },

                            success: function(data, status){
                            //whisper.value = 'Whispering';
                            //whisper.style.background = 'red';
                            }


                        });
                    }

                    else if(whispering){
                        console.log("unwhisper!");
                        $.ajax({
                            url:"unwhisper.php",
                            type:"GET",
                            data: {confname: sessionStorage.confname,
                            whisperingto: sessionStorage.peer,
                            user: sessionStorage.user},
                            timeout: 10000,
                            error: function(xhr){
                                console.log("Error: " + xhr.status + " " + xhr.statusText);

                            },

                            success: function(data, status){
                                            //whisper.value = 'Whispering';
                                            //whisper.style.background = 'red';
                            }


                        });

                    }
                });

                updateprogress();

                webrtc.on('readyToCall', function(){             
                    premature = true;             
                });
               

                //fade in the remote video and zoomout the local video when connection is made
                webrtc.on('channelOpen', function(){
                    console.log("i can mess around here");
                    remoteVid = document.querySelector('#remotes video');
                    console.log(remoteVid.offsetWidth);
                    connected = true;
                    remoteVid.onplay = function(){
               
                    remoteVid.classList.add('addborder');
                    sizeVideos(window.innerHeight, window.innerWidth, remoteVid, video);
                    setRoom(sessionStorage.peer);
                    whisper.disabled = false;

                    };
                });

                //zoom in the local video when opponent pulls plug.
                webrtc.on('videoRemoved', function(){
                    console.log("SHENANIGAN");
                    connected = false;
                    sizeVideo(window.innerHeight, window.innerWidth, video);
                    webrtc.leaveRoom();
                    updateStagingProgress();
                    $('#title').text("Your Friend Left! Awaiting Reconnection..");
                    whisper.disabled = true;
                });


                window.onbeforeunload = function(){
                    if(!validNavigation){
                       //give user warning
                        return "You will lose session details. Continue?";
                    }
                }

                //if user navigates away, delete user from db and local data.
                //we may have to delete also all local detail in case he uses browser to navigate to other link. the malicious bastard.
                window.onunload = function(){
                    if(!validNavigation){
                        $.ajax({
                            url:"removeuser.php",
                            type:"POST",
                            async: false,
                            timeout: 4000,
                            data: {user : sessionStorage.user,
                                    confname: sessionStorage.confname,
                                    device: sessionStorage.device},
                            error: function(xhr){
                                 alert("Error: " + xhr.status + " " + xhr.statusText);
                             },
                            success: function(data, status){
                                sessionStorage.removeItem("device");
                                sessionStorage.removeItem("user");
                                console.log("Status: " + status);
                            }


                        });
                    }
                }

                updateStagingProgress();
                checkForWhisper();


            });

        </script>
        <script src = "animator.js"></script>
        <!--<script src = "functionality.js"></script>-->
        
    </body>
</html>
