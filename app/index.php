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
        <script src="simplewebrtc.bundle.js"></script>
        <script src="socket.io.js"></script>
        <script src="headtrackr.js"></script>
        <script src="indexDBConnector.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Hydra</h1>
            
        </div>
        <div class = "confList">
            <h2>Join</h2>
            <p>Select an existing Conference to begin</p>
            <form id="joinConf">
    
                <select name = "conference" id = "conference" onfocus="displayConference(this.value)" onchange="displayConference(this.value)">
                </select>
                <input type = "button" value = "Join" id = "join">
            </form>
            <div id = "conferenceDisplay">HELLO!</div>
        </div>
       
        <div class="toolbar">

        <h2>Create</h2>
        <form id="setupConf">
            <p>Conference Name:</p> 
            <input id="confName" name="confName"></input>
            <p></br></br>Number of Participants:</p>
            <select name="confPeople" id = "confPeople">
                <option value="2">2 people</option>
                <option value="3">3 people</option>
                <option value="4">4 people</option>
            </select>
            <input type = "button" value = "Start" id = "start">

        </form>
        </div>
         <div class="feed">
            <h3>Your feed</h3>

            <video id="localVideo"></video>
        </div>

        

    

    <script>

        // create our webrtc connection
        var webrtc = new SimpleWebRTC({
            // the id/element dom element that will hold "our" video
            localVideoEl: 'localVideo',
            // the id/element dom element that will hold remote videos
            remoteVideosEl: 'remotes',
            // immediately ask for camera access
            autoRequestMedia: true,
            debug: true,
            detectSpeakingEvents: true,
            autoAdjustMic: false
        });


    </script>

    </body>
</html>