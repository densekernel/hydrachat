<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="app.css" media="screen">
        <script src="http://simplewebrtc.com/latest.js"></script>
        <script src="headtrackr.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Welcome to HydraChat</h1>
            
        </div>
        <div class="feed">
            <h2>Your feed</h2>

            <video id="localVideo"></video>
        </div>
        <div class="toolbar">

        <h2>Start a conference</h2>
        <form id="setupConf" action="dashboard.php" method="post">
            <p>Enter conference name:</p> 
            <input id="confName" name="confName"></input>
            <p>Select number of participants</p>
            <select name="confPeople">
                <option value="2">2 people</option>
                <option value="3">3 people</option>
                <option value="4">4 people</option>
            </select>

            <button class="btn btn-default submitButton" type="submit">Start</button>
        </form>
        </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 

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