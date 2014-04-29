  /*THIS SCRIPT WRAPS THE ANIMATIONS OF THE WEBAPP */




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
       
            /*resize depending on whether there are two feeds or one feed on screen*/
            window.onresize = function(){
                if(!connected)
                    sizeVideo(window.innerHeight, window.innerWidth, video);
                if(connected)
                    sizeVideos(window.innerHeight, window.innerWidth, remoteVid, video);
            };

            /*fly in the local video when it is ready to play*/
            video.onplay=function(){

                hydra.style.opacity = "0";
                loading.style.opacity = "0";

                if(!connected){
                    video.classList.add('addborder');
                    sizeVideo(window.innerHeight, window.innerWidth, video);
                    //htracker.modInit(video,canvasInput);
                   // htracker.start();  
                }
                //such condition probably will not exist but just in case.
                if(connected)
                    sizeVideos(window.innerHeight, window.innerWidth, remoteVid, video);
                console.log("YELLO!");
            };