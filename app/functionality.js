 /*THIS SCRIPT WRAPS ALL THE FUNCTIONALITIES OF HYDRA. THIS INCLUDES AND IS NOT LIMITED TO PROXIMITY SENSING,
 WHISPERING, PRIVATE CONVERSATIONS, SETTINGS, AND MORE TO BE ADDED.*/      

//adds a listener that tracks the status of the face detection, firing events for us to use in UI
//the main use of this is of course loading times, telling user to sit still while we track initial position, etc
document.addEventListener('headtrackrStatus',
    function(event){
        if(event.status == "detecting"){
                capturing.style.opacity="1";
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

//adds a listener that actually tracks the head and is able to return values of positions x,y,z for our use
//in this case we only use the z distance, which is the distance of the head from the camera
//the first reading is the initial position of the head relative to camera and is recorded as a local variable 'proximity'
//then as value z changes we detect if the difference between proximity and z becomes too large (meaning head moves closer to camera)
//once difference passes a threshold we will signal that it is time to activate whispering activity.
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