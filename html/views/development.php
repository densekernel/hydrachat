<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
			  <a href="#introAnchor" class="list-group-item">Requirements</a>
			  <a href="#reqAnchor" class="list-group-item">Requirements</a>
			  <a href="#sdkAnchor" class="list-group-item">SDK/Collaboration</a>
			  <a href="#" class="list-group-item">Development iterations</a>
			  <a href="#" class="list-group-item">Architectural diagrams</a>
			  <a href="#" class="list-group-item">Achievements</a>
			  <a href="#" class="list-group-item">Implementation (Design Patterns)</a>
			  <a href="#" class="list-group-item">Project Management</a>
			  <a href="#" class="list-group-item">Testing</a>
			  <a href="#" class="list-group-item">Resources</a>
			</div>
		</div>
		<div class="col-md-8">
			<h1>Development</h1>
			<h2><a id="introAnchor">Introduction</a></h2>
			<div class="text-center">
				<img width="500" src="assets/img/pipShot.png">
			</div>
			<p class="text-center">Skype multiparty video conferencing</p>
			<p>This video conferencing software is extremely useful in today’s world of communications but is not without its limitations. Inspired by the lack of human social interaction available in the video conference software, the following list of limitations, sourced from Bill Buxton’s blog, spurred on the Hydra concept.</p>
			<ul>
				<li>Inability to establish direct eye contact with other participants.</li>
				<li>Inability to be aware of who, if anyone, is visually attending to them.</li>
				<li>Inability to selectively listen to different, parallel conversations.</li>
				<li>Inability to make side comments to other participants.</li>
				<li>Inability to hold parallel, or private, conversations with particular participants.</li>
			</ul>
			<p>Bill Buxton’s Hydra concept tackled this limitation via the introduction of proprietary hardware called Hydra units, dubbed as talking heads. These would be place around the edge of a meeting table to act as a video surrogate of each of the participants.</p>
			<p>This preserves the spatial cues which govern human social interaction in meeting environments. This eliminates the picture-in-a-pip view used by Skype and others as each Hydra Unit will represent only one participant. This will also allow participants to interact with each Hydra Unit as if they were physical participants. Fig 1.2 below should provides a visualisation of a person facing three Hydra units.</p>
			<div class="text-center">
				<img src="assets/img/pipUnit.png" width="500">
			</div>
			<p class="text-center"></p>
			<h2><a id="reqAnchor">Requirements</a></h2>
			<p>As part of our proof of concept report for the Hydrachat systems completed in the COMP2013: Systems Engineering Module.</p>
			<p></p>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Number</th>
						<th>Type</th>
						<th>Description</th>
						<th>Rationale</th>
						<th>Priority</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>RQ1</td>
						<td>Functional</td>
						<td>HydraChat shall transmit video and audio in real-time.</td>
						<td>It is the bread and butter of our application to allow for video conferencing.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ2</td>
						<td>Functional</td>
						<td>HydraChat shall allow for both one-to-one and multi-point video conferencing of up to 4 persons including the host.</td>
						<td>A 4-way multipoint video conference was a requirement included in the initial brief from the client. The variance in the number of participants allows more flexibility and targets a broader range of customers.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ3</td>
						<td>Functional</td>
						<td>HydraChat shall make us of non proprietary Hydra units, streaming video and audio feed of only one participant per Hydra unit.</td>
						<td>This works towards realising the idea of video-surrogates, a core part of the concept of the application and a request of the client.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ4</td>
						<td>Functional</td>
						<td>HydraChat shall allow for private conversations between two particpants during a multi-party conference triggered by proximity sensing or button push.</td>
						<td>Another request of the client as private conversations are one of the events that transpire during real life meeting and not reproducible by current video conference implmenetations.</td>
						<td>Should have</td>
					</tr>
					<tr>
						<td>RQ5</td>
						<td>Functional</td>
						<td>HydraChat shall have authentication measures such as unique links to preserve the privacy of the conferences.</td>
						<td>During conferences confidential material might be discussed and so there is a need to preserve security and privacy.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ6</td>
						<td>Functional</td>
						<td>HydraChat shall limit session control to only the host. No one but a host should be able to start and end conferences, ending video and audio feed to all HydraUnits at once. However, any participant may voluntarily remove themselves at any time from the session.</td>
						<td>This is again a basic neccessity to any multi-party video conferencing app so that conferences are not prematurely ended accidentally or maliciously by members other than the host.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ7</td>
						<td>Functional</td>
						<td>HydraChat shall allow for seamless joining of participants into the conference.</td>
						<td>When a member of the conference tries to join, the process should be seamless so as not to disrupt the rest of the participants in the conference.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ8</td>
						<td>Functional</td>
						<td>HydraChat shall be accessible to at least 80% of the mobile market.</td>
						<td>If we target most of the mobile market, then almost all devices can act as HydraUnits and the customers will be able to hold confernces with even more people without hassle.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ9</td>
						<td>Functional</td>
						<td>HydraChat shall transmit video with an average frame of 25 frames per second.</td>
						<td>This is an important performance requirement as, if the frame rate drops, then the video quality will drop as well and the user satisfaction will be low.</td>
						<td>Must have</td>
					</tr>
					<tr>
						<td>RQ10</td>
						<td>Functional</td>
						<td>HydraChat shall transmit and receive video and audio signals with an average latency of less than 500ms.</td>
						<td>If the latency during a video-conference increases more than 500ms, the the users will experience a delay when they speak.</td>
						<td>Must have</td>
					</tr>
				</tbody>
			</table>
			<h2><a id="sdkAnchor">SDK/Collaboration</a></h2>
			<p>The software was built using an open source project built by Google called WebRTC. We are using an andditional library called SimpleWebRTC to build the video conferencing software.</p>
			<h2><a id="sdkAnchor">Development iterations</a></h2>
			<h2>Architectural Diagrams</h2>
			<p>The architecture of the conference uses mesh networking technology to create a true peer to peer nature of the call. Each node is individually paired with the other nodes within the conference. This is strengthening the call signal and also allows each node to drop out without interrupting the conference call.</p>
			<div class="text-center">
				<img class="text-center" src="assets/img/fullMesh.jpg">
			</div>
			<h2>Database Design</h2>
			<p>We require the use of a database to store information for users conference rooms. The save conference feature is currently under construction but once complete will allow users to to save a conference to a specific URL with a specific set of participants.</p>
			<div class="text-center">
				<img src="assets/img/dataBaseShot.png" width="500">
			</div>
			<h2><a id="sdkAnchor">SDK/Collaboration</a></h2>
			<p>The project is open source and anyone can fork the project and contribute. Find the GitHub repository <a href="https://github.com/jonnymanf/hydrachat" target="_blank">here</a>.</p>
			<p>For real-time communication specialists or developers interested in using <a href="http://www.webrtc.org/" target="_blank">WebRTC</a> or <a href="http://simplewebrtc.com/" target="_blank">SimpleWebRTC</a> for their projects, these can be contributed to directly.</p>
		</div>
	</div>
</div>