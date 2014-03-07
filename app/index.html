<!DOCTYPE html>
<html>
    <head>
        <title>HydraChat - Alpha Version - Video Meetings</title>
        <link rel="stylesheet" type="text/css" href="reset.css" media="screen">
        <link rel="stylesheet" type="text/css" href="style.css" media="screen">
        <script src="http://simplewebrtc.com/latest.js"></script>
        <script src="headtrackr.js"></script>
    </head>
    <body>
        
        <canvas id="inputCanvas"></canvas>
        <h1 id="hydra">Hydra</h1>
        <p id="loading">Bringing up your face.</p>
        <p id="capturing">Don't move while we measure your face.</p>
        <p id="ok">Okay all done enjoy.</p>
        <video id="localVideo"></video>
        <div id="remoteFeed">
                <div id="remotes">
                </div>
        </div>
        <div class="wrapper" id="bonjovi">
                <p id="confLabel"></p>
                <p id="title">Name your Conference:</p>
                <p id="inviteLabel"></p>
                <p id="subTitle"></p>
                <form id="createRoom">
                    <input id="sessionInput" size="15"/>
                    <button type="submit">Create.</button>
                </form>
        </div> 

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 

        <script>

            var video = document.getElementById("localVideo");
            var connected = false;
            var loadText = document.getElementById("loading");
            var dashboard = document.getElementById("bonjovi");
            var canvasInput = document.getElementById("inputCanvas");
            var ok = document.getElementById("ok");
            var capturing = document.getElementById("capturing");
            var htracker = new headtrackr.Tracker({ui:false});
            var remoteVid;
            var max = "95%";
            var whisperThreshold = 25;
            var firstRead = true;
            var proximity;
            var face;

            document.addEventListener('headtrackrStatus',
                function(event){
                    if(event.status == "detecting"){
                        console.log("finding face");
                    }

                    if(event.status == "found"){
                        console.log("FOUND FACE");
                        capturing.style.opacity="0";
                        capturing.style.left="5000px";
                        ok.style.opacity="1";
                        setTimeout(function(){
                            ok.style.opacity = "0";
                            ok.style.left="5000px";
                        }, 3000);

                    }
                });

            document.addEventListener('headtrackingEvent',
                function(event){
                    if(firstRead){
                        proximity = event.z;
                        console.log("initial z distance: " + proximity);
                        firstRead = false;
                    }

                    if(proximity - event.z >= whisperThreshold){
                        setTimeout(whisper(proximity - event.z), 3000);
                    }

                    if(proximity - event.z < whisperThreshold){
                        setTimeout(disengage(proximity - event.z), 3000);
                    }
                });

            function whisper(proxDiff){
                if(proxDiff >= whisperThreshold){
                    video.style.borderColor="red";
                }
            }

            function disengage(proxDiff){
                if(proxDiff < whisperThreshold){
                    video.style.borderColor="#47d475";
                }
            }
            
            /*the following two functions resize the video feed in accordance to the browser size*/
            function sizeVideo(browserHeight, browserWidth, theVideo){
                
                if(browserWidth > browserHeight){
                    theVideo.style.top = "";
                    theVideo.style.width="";
                    theVideo.style.height=max;
                   
                    var leftPercent = (1-(theVideo.offsetWidth/browserWidth))*50;
                    var leftInt = parseInt(leftPercent, 10);               
                    theVideo.style.left= leftInt + "%";

                }
                else{
                    theVideo.style.left = "";
                    theVideo.style.height="";
                    theVideo.style.width=max;
                   
                    var leftPercent = (1-(theVideo.offsetHeight/browserHeight))*50;
                    var leftInt = parseInt(leftPercent, 10);
                    theVideo.style.top= leftInt + "%";
                }
            }

            function sizeVideos(browserHeight, browserWidth, remote, local){
                if(browserWidth > browserHeight){
                    remote.style.top = "";
                    remote.style.width="";
                    remote.style.height=max;
                   
                    var leftPercent = (1-(remote.offsetWidth/browserWidth))*50;
                    var leftInt = parseInt(leftPercent, 10);               
                    remote.style.left= leftInt + "%";
                    local.style.left = leftInt + "%";
                    local.style.top = "0";
                    local.style.width="";
                    local.style.height="30%";

                }
                else{
                    remote.style.left = "";
                    remote.style.height="";
                    remote.style.width=max;
                   
                    var leftPercent = (1-(remote.offsetHeight/browserHeight))*50;
                    var leftInt = parseInt(leftPercent, 10);
                    remote.style.top= leftInt + "%";
                    local.style.top= leftInt + "%";
                    local.style.left= "0";
                    local.style.height="";
                    local.style.width="30%";
                }
                

            }
            //fly in from bottom
            function flyinheight(object){
                object.style.top ="100%";
                object.style.width="";
                object.style.height=max;
                   
                var leftPercent = (1-(object.offsetWidth/window.innerWidth))*50;
                var leftInt = parseInt(leftPercent, 10);               
                object.style.left= leftInt + "%";
                object.addEventListener("webkitAnimationEnd", function(){
                    object.style.top="0";
                    capturing.style.opacity="1";
                }, false);
                object.addEventListener("animationend", function(){
                    object.style.top="0";
                    capturing.style.opacity="1";
                }, false);
                object.classList.add('flyin');
            }
            //fly in from right
            function flyinwidth(object){
                object.style.left = "100%";
                object.style.height="";
                object.style.width=max;
                   
                var leftPercent = (1-(object.offsetHeight/window.innerHeight))*50;
                var leftInt = parseInt(leftPercent, 10);
                object.style.top= leftInt + "%";
                object.addEventListener("webkitAnimationEnd", function(){
                    object.style.left="0";
                    capturing.style.opacity="1";
                }, false);
                object.addEventListener("animationend", function(){
                    object.style.left="0";
                    capturing.style.opacity="1";
                }, false);
                object.classList.add('flyleft');
            }
            //fly in based on screen dimensions
            function flyin(object, browserHeight, browserWidth){
                if(browserWidth > browserHeight){
                    flyinheight(object);
                }
                else{
                    flyinwidth(object);
                }
            }
            //zoomout based on screen dimensions.
            function zoomout(){
                if(window.innerWidth > window.innerHeight){
                video.style.width="";
                video.addEventListener("webkitAnimationEnd", function(){                   
                    video.style.height="30%";
                    video.style.opacity="0.8";
                }, false);
                video.addEventListener("animationend", function(){                   
                    video.style.height="30%";
                    video.style.opacity="0.8";
                }, false);
                video.classList.remove('zoomin');
                video.classList.remove('zoominleft');
                video.classList.add('zoomout');
                }
                else{
                video.style.height="";
                video.addEventListener("webkitAnimationEnd", function(){
                    video.style.width="30%";
                    video.style.opacity="0.8";
                }, false);
                video.addEventListener("animationend", function(){
                    video.style.width="30%";
                    video.style.opacity="0.8";
                }, false);
                video.classList.remove('zoomin');
                video.classList.remove('zoominleft');
                video.classList.add('zoomoutleft');
                }
                
            }
            //zoomin based on screen dimensions.
            function zoomin(){
                if(window.innerWidth > window.innerHeight){
                    video.style.width="";
                    video.addEventListener("webkitAnimationEnd", function(){
                        sizeVideo(window.innerHeight, window.innerWidth, video);
                        video.style.opacity="1";
                    }, false);
                    video.addEventListener("animationend", function(){
                        sizeVideo(window.innerHeight, window.innerWidth, video);
                        video.style.opacity="1";
                    }, false);
                    video.classList.remove('zoomout');
                    video.classList.remove('zoomoutleft');
                    video.classList.add('zoomin');
                }
                else{
                    video.style.height="";
                    video.addEventListener("webkitAnimationEnd", function(){
                        sizeVideo(window.innerHeight, window.innerWidth, video);
                        video.style.opacity="1";
                    }, false);
                    video.addEventListener("animationend", function(){
                        sizeVideo(window.innerHeight, window.innerWidth, video);
                        video.style.opacity="1";
                    }, false);
                    video.classList.remove('zoomout');
                    video.classList.remove('zoomoutleft');
                    video.classList.add('zoominleft');
                }

            }

            /*resize depending on whether there are two feeds or one feed on screen*/
            window.onresize = function(){
                if(!connected)
                    sizeVideo(window.innerHeight, window.innerWidth, video);
                if(connected)
                    sizeVideos(window.innerHeight, window.innerWidth, remoteVid, video);
            };

            /*fly in the local video when it is ready to play*/
            video.onplay=function(){
                if(!connected){
                    video.classList.add('addborder');
                    flyin(video, window.innerHeight, window.innerWidth);
                    loadText.addEventListener("webkitAnimationEnd", function(){
                        loadText.style.left="-500px";
                    }, false);
                     loadText.addEventListener("animationend", function(){
                        loadText.style.left="-500px";
                    }, false);
                    loadText.classList.add('out');

                    hydra.addEventListener("webkitAnimationEnd", function(){
                        hydra.style.left="100%";
                    }, false);
                     hydra.addEventListener("animationend", function(){
                        hydra.style.left="100%";
                    }, false);
                    hydra.classList.add('out');

                    dashboard.addEventListener("webkitAnimationEnd", function(){
                        dashboard.style.right="5px";
                    }, false);
                    dashboard.addEventListener("animationend", function(){
                        dashboard.style.right="5px";
                    }, false);
                    dashboard.classList.add('comein');
                    htracker.modInit(video,canvasInput);
                    htracker.start();
                    
                }
                //such condition probably will not exist but just in case.
                if(connected)
                    sizeVideos(window.innerHeight, window.innerWidth, remoteVid, video);
                console.log("YELLO!");
            };

            /* grab the room from the URL*/
            var room = location.search && location.search.split('?')[1];

            // create our webrtc connection
            var webrtc = new SimpleWebRTC({
                localVideoEl: 'localVideo',
                remoteVideosEl: 'remotes',
                autoRequestMedia: true,
                debug: true,
                detectSpeakingEvents: true,
                autoAdjustMic: false
            });
           
            
            webrtc.on('localStream', function(){
                console.log('STEAM');
                
            });


            // when it's ready, join if we got a room from the URL
            webrtc.on('readyToCall', function () {
                if (room){
                    webrtc.joinRoom(room);
                }
            });

            //fade in the remote video and zoomout the local video when connection is made
            webrtc.on('channelOpen', function(){
                console.log("i can mess around here");
                remoteVid = document.querySelector('#remotes video');
                console.log(remoteVid.offsetWidth);
                connected = true;
                remoteVid.onplay = function(){
                sizeVideo(window.innerHeight, window.innerWidth, remoteVid);
                remoteVid.style.opacity="0";
                remoteVid.addEventListener("webkitAnimationEnd", function(){
                    remoteVid.style.opacity="1";
                }, false);
                remoteVid.addEventListener("animationend", function(){
                    remoteVid.style.opacity="1";
                }, false);
                remoteVid.classList.add('addborder');
                remoteVid.classList.add('fadein');
                zoomout();
                };
            });

            //zoom in the local video when opponent pulls plug.
            webrtc.on('videoRemoved', function(){
                console.log("SHENANIGAN");
                connected = false;
                zoomin();
            });

           
            
            // Since we use this twice we put it here
            function setRoom(name) {
                $('form').remove();
                $('#confLabel').text('In conference: ')
                $('#title').text(name);
                $('#inviteLabel').text('Invite others: ')
                $('#subTitle').text(location.href);
                $('body').addClass('active');
            }

            if(room){
                setRoom(room);
            } 
            else{
                $('form').submit(function () {
                    var val = $('#sessionInput').val().toLowerCase().replace(/\s/g, '-').replace(/[^A-Za-z0-9_\-]/g, '');
                    webrtc.createRoom(val, function (err, name){
                        console.log(' create room cb', arguments);
                        var newUrl = location.pathname + '?' + name;
                        if(!err){
                            history.replaceState({foo: 'bar'}, null, newUrl);
                            setRoom(name);
                        } 
                        else{
                            console.log(err);
                        }
                    });
                    return false;          
                });
            }

        </script>
        
    </body>
</html>
