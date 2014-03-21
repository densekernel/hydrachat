<html>
    <head>
        <script src="http://simplewebrtc.com/latest.js"></script>
        <script src="headtrackr.js"></script>
    </head>
    <body>
        <h1>Welcome to HydraChat</h1>
        <video id="localVideo"></video>
        <form id="setupConf" action="dashboard.php" method="post">
            <p>Enter conference name:</p> 
            <input id="confName" name="confName"></input>
            <p>Select number of participants</p>
            <select name="confPeople">
                <option value="2">2 people</option>
                <option value="3">3 people</option>
                <option value="4">4 people</option>
            </select>

            <button type="submit">Start</button>
        </form>
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