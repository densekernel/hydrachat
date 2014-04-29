<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
			  <h3>User Manual</h3>
			  <a href="#" class="list-group-item">Overview</a>
			  <a href="#" class="list-group-item">Using WebRTC</a>
			  <a href="#" class="list-group-item">Example</a>
			  <a href="#" class="list-group-item">SimpleWebRTC</a>
			  <h3>System Documentation</h3>
			  <a href="#" class="list-group-item">FAQ</a>
			  <a href="#" class="list-group-item">Blog</a>
			  <a href="#" class="list-group-item">Ask a question</a>
			</div>
		</div>
		<div class="col-md-8">
			<h1>User Manual</h1>
			<h2>First title</h2>
			<h1>System Documentation</h1>
			<h2>Overview</h2>
			<h3>WebRTC Triangle</h3>
			<p>The WebRTC triangle is the most common application in WebRTC and it is what it being used in our application. It refers to the process where 2 browsers are running the same application, in our case HydraChat, and are downloading data from the same webpage. As HydraChat is a peer-to-peer application, it establishes a peer connection directly between the 2 browsers that transfers the voice and video.</p>
			<div class="text-center">
				<img src="assets/img/triangleShot.png" width="500">
				<p class="caption">The WebRTC Triangle</p>
			</div>
			<h3>Multiple Media Stream</h3>
			<p>Devices today, whether they are mobile phones or laptops, have the capability to generate multiple media streams and each stream can be of a different type. It would not be useful if a device could generate only one stream, for example a video stream, without an audio stream. WebRTC has build-in functions to handle multiple streams on any type. The following diagram shows an example media stream between a mobile phone and a browser.</p>
			<div class="text-center">
				<img src="assets/img/multiShot.png" width="500">
				<p class="caption">Media streems between cellular device and laptop</p>
			</div>
			<h3>Conference Sessions (Multi-Party)</h3>
			<p>For conferencing, i.e. multi-party sessions which are the bread and butter of our application, we have chosen the “full-mesh” or “fully-distributed” architecture which is depicted in the diagram below.</p>
			<p>The fully-distributed architecture has each browser establish a peer connection with each other browser. This means that the audio will be mixed when transferred and the video needs to be placed somewhere appropriately to distinguish each participant. The aforementioned do not pose an issue in our case, since in HydraChat every participant occupies his own device.</p>
			<p>The fully-distributed architecture has the advantages that is does not need a media server, it has the lowest possible media latency and the highest video quality. Furthermore, since the participants will be 4 at most, there are no issues with excessive bandwidth require.</p>
			<div class="text-center">
				<img src="assets/img/fullMesh.jpg" width="500">
				<p class="caption">Full-Mesh Network Architecture</p>
			</div>
			<h2>Using WebRTC</h2>
			<h3>Creating a WebRTC Session:</h3>
			<p>When developing WebRTC sessions for HydraChat, as in all WebRTC applications, you have to take the following 4 actions.</p>
			<ol>
				<li>Obtain local media</li>
				<li>Set up a peer connection between browsers</li>
				<li>Attach media and data channels to the peer connection</li>
				<li>Exchange session descriptions</li>
			</ol>
			<p>The following diagram outlines the above steps.</p>
			<div class="text-center">
				<img src="assets/img/createShot.png" width="500">
				<p class="caption">Creating a WebRTC session</p>
			</div>
			<h3>Obtaining Local Media</h3>
			<p>To obtain the local media, we use the <b>getUserMedia()</b> method. After we invoke that method, a request with appear in the user's browser that will prompt him to grant access to his camera and microphone. When we have the media streams we want, we can compile them using the <b>MediaStream API</b>.</p>
			<p>You can have a look at the documentation of the MediaStream API <a href="http://dev.w3.org/2011/webrtc/editor/webrtc.html#mediastream">here</a>.</p>
			<h3>Setting up a Peer Connection</h3>
			<p>Since we use the full-mesh topology, we need to establish a peer connection between each browser. We do that by creating objects from the <b>RTCPeerConnection API</b>. Each object of the aforementioned API represents a peer connection that allows audio and video to be transferred directly between each browser. The input to the constructor of RTCPeerConnection is an object that contains information about ICE, the Interactive Connectivity Establishment, which is used to circumvent NAT's and firewalls.</p>
			<p>More on the <b>RTCPeerConnection</b> API can be found <a href="http://dev.w3.org/2011/webrtc/editor/webrtc.html#rtcpeerconnection-interface">here</a>.</p>
			<h3>Exchanging Media</h3>
			<p>Using the connection we have created, we can attach one or more media streams to it to be sent to the other peer. Every change in the media will require a renegotiation between the browsers of how the media will be represented. So, when a request is made to attach a media stream in the peer connection, we must specify how to establish the media session and we do that by creating a <b>RTCSessionDescription</b> object.</p>
			<p>The <b>RTCPeerConnection API</b> provides means for us to review the session description before it is send, but in HydraChat there is no need to modify that and so we let WebRTC to do the work for us.</p>
			<p>When, the aforementioned processes are completed, then the browsers starts to circumvent firewalls and NAT's and then they exchange information to establish a secure connection. All these are handled by the browser with the exception that we can provide a <b>STUN</b> and <b>TURN</b> servers of our own for the NAT traversal. After that, the media exchange will be initiated.
			<p>	More about <b>RTCSessionDescription</b> can be found <a href="http://dev.w3.org/2011/webrtc/editor/webrtc.html#session-description-model">here</a>.</p>
			<h3>Closing the Connection</h3>
			<p>Closing the connection is really easy and in HydraChat it can occur when the user closes the tab/browser or when there is a loss of internet connectivity or even when the browser crashes. To close the connection is simply close the <b>close()</b> method on the <b>RTCPeerConnection</b> object that we have created. For example, if the object we created was called "myPeerConnection", then invoking <b>myPeerConnection.close()</b> would end the session.
			<p>It is important to note that once the peer connection is closed, for whatever reason, then the permissions to access the camera and microphone must be regained.</p>
			<h3>Implementation Summary</h3>
			<p>The following figure summarises all the steps mentioned above showing how they work in a real world scenario with communication between 2 browsers.</p>
			<div class="text-center">
				<img src="assets/img/implementShot.png" width="500">
				<p class="caption">Implementation Diagram</p>
			</div>
			<ol>
				<li>Browser M requests web page from web server</li>
				<li>Web server provides web pages to M</li>
				<li>Browser L requests web page from web server</li>
				<li>Web server provides web pages to L</li>
				<li>M sends the session description object (offer) to the web server</li>
				<li>Web server sends the session description object of M to L.</li>
				<li>L responds by sending the session description object (answer) to the web server</li>
				<li>Web server sends the answer to M.</li>
				<li>M and L begin hole punching to determine the best way to reach each other</li>
				<li>M and L begin key negotiation for secure media</li>
				<li>M and L begin exchanging media streams</li>
			</ol>
			<h2>Example</h2>
			<p>The following is an example in pseudocode that summarises everything that has been said so far about the implementation of WebRTC from a more low-level abstraction. The goal of this section is to give a simplified version of the code so that future contributors can understand easily and faster the underlying principles of WebRTC before they start looking into the actual code.</p>
			<p>Also, this example pseudocode assumes that all HTML5 development, such as the video tags to render the video we are going to get from the remote stream, have already been carried out. If the developer is not familiar with HTML5, then he should take a look at w3schools. Fortunately, only a basic HTML5 background is required. The real magic happens in Javascript.</p>
			<p><b>The sample pseudocode is in the file called “webRTCPseudoCode” in this folder. You have to download an app called “Google Apps Script” to view it.ow</b></p>
		</div>
	</div>
</div>