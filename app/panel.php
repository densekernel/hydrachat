<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="app.css" media="screen">
        <script src="http://simplewebrtc.com/latest.js"></script>
        <script src="headtrackr.js"></script>

        <script>
            //navigation is considered valid if user clicks buttons that direct them to next view of webapp
            //navigation is not valid and data will have to be reset/updated if user unexpectedly terminates browser
            //refreshes, or goes back
           

            //function to generate uuid for user device.
            function makeid(){
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for( var i=0; i < 5; i++ ){
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }

                return text;
            }
            
            $(document).ready(function(){
                var validNavigation = false;
                var warning = "You are about to " + sessionStorage.sessiontype + " " + sessionStorage.confname + 
                " for " + sessionStorage.confpeople + " participants.";
                //if we do not have sufficient information, we will redirect back to main page
                if(sessionStorage.confname == null){
                    validNavigation = true;
                    //window.location.href="index.php";
                }

                //set the text using sessionstorage data
                document.getElementById("confirmation").innerHTML = warning;


                //clean up local data upon closing tab/refreshing/going back
                window.onbeforeunload = function(){
                    if(!validNavigation){
                       //give user warning
                        return "You will lose session details. Continue?";
                    }
                }

                window.onunload = function(){
                    if(!validNavigation){
                        //ajax call must be set to false async so that call will complete
                        //before the page exits. Otherwise 0 error will be thrown.
                        //add timeout to deal with server lag. this allows request to complete. there is still chance of failure.
                         $.ajax({
                            url:"garbagecollector.php",
                            type: "POST",
                            async: false,
                            timeout: 4000,
                            data: {dataID: sessionStorage.confname},
                            error: function(xhr){
                                // report error with sending data
                                alert("Error: " + xhr.status + " " + xhr.statusText);
                                },
                            success: function(data, status){
                                //check back if successful.
                                 //remove data from local storage
                                sessionStorage.removeItem("sessiontype");
                                sessionStorage.removeItem("confname");
                                sessionStorage.removeItem("confpeople");
                                console.log("Status: " + status);
                            
                            }
                        });

                       
                       
                        
                    }
                }

                $("#back").click(function(){
                    validNavigation = false;
                    window.location.href = "index.php";
                });

                $("#okay").click(function(){

                    var name = $("#name").val();
                    sessionStorage.setItem("user", name);
                    var uuid = makeid();
                    console.log(uuid);
                    if(name == ""){
                        alert("We Need A Name. Try Again.");
                    }
                    else{
                        validNavigation = true;
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function(){
                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                                sessionStorage.setItem("device", uuid);
                                console.log(sessionStorage.device);
                                window.location.href = "call.php";
                            }
                        }
                        xmlhttp.open("GET", "addUserDevice.php?q="+name+"&f="+
                            sessionStorage.confname+"&g="+sessionStorage.confpeople+"&h="+uuid, false);
                        xmlhttp.send();

                    }



                });

            });


        </script>
       
    </head>
    <body>
        <div class="header">
            <h1>Hydra</h1>
            
        </div>
        <div class = "main">
            <h2 id = "confirmation"></h2>
            <h3></br></br>Enter Your Name:</h3>
            <input id="name" name="name"></input>
            <input type = "button" value = "OKAY" id = "okay"></input>
        </div>
        <div class = "main">
            <h3 id = "else"></br></br>If such is not your desire..</h3>
            <input type = "button" value = "GO BACK." id = "back"></input>
        </div>

    </body>
</html>