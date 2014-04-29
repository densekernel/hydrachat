<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
			  <a href="#reqAnchor" class="list-group-item">Requirements</a>
			  <a href="#reqAnchor" class="list-group-item">Achievements</a>
			  <a href="#sdkAnchor" class="list-group-item">SDK/Collaboration</a>
			  <a href="#iterAnchor" class="list-group-item">Development iterations</a>
			  <a href="#archAnchor" class="list-group-item">Architectural diagrams</a>
			  <a href="#" class="list-group-item">Achievements</a>
			  <a href="#" class="list-group-item">Implementation (Design Patterns)</a>
			  <a href="#" class="list-group-item">Testing</a>
			  
			</div>
		</div>
		<div class="col-md-8">
			<h1>Development</h1>
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
			<h2><a id="achievAnchor">Achievements</a></h2>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Date</th>
						<th>Achievement Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td></td>
						<td>Successful implementation of peer-to-peer connection with 2 participants via WebRTC module.</td>
					</tr>
					<tr>
						<td>2</td>
						<td></td>
						<td>Extended implementation to create multi-party session with many participants, still using peer-to-peer connection.</td>
					</tr>
					<tr>
						<td>3</td>
						<td></td>
						<td>Created conference style interface to hold conferences with 4 participants.</td>
					</tr>
					<tr>
						<td>4</td>
						<td></td>
						<td>Detection of participants head movement via webcam.</td>
					</tr>
					<tr>
						<td>5</td>
						<td></td>
						<td>Managed to traverse Network Address Translation (NAT)'s and firewalls to increase reliability of call quality between peers.</td>
					</tr>
					<tr>
						<td>6</td>
						<td></td>
						<td>Successful testing in Google Chrome, Mozilla Firefox and Opera internet browsers.</td>
					</tr>
					<tr>
						<td>7</td>
						<td></td>
						<td>Successful testing of HydraChat working on Android cellular handset.</td>
					</tr>
					<tr>
						<td>8</td>
						<td></td>
						<td>Successful testing of interoperability between desktop PC's and mobile devices.</td>
					</tr>
					<tr>
						<td>9</td>
						<td></td>
						<td>Implementation of system that will automatically assign conference rooms for each participant and their respective set of devices.</td>
					</tr>
					<tr>
						<td>10</td>
						<td></td>
						<td>Creation of SQL database that temporarily stores information about the conference, such as number of participants and their usernames.</td>
					</tr>
					<tr>
						<td>11</td>
						<td></td>
						<td>Creation of a dashboard that allows users to create conferences by selecting the number of participants they want to have and dynamically view information about ongoing conferences.</td>
					</tr>
				</tbody>
			</table>
			<h2><a id="sdkAnchor">SDK/Collaboration</a></h2>
			<p>The software was built using an open source project built by Google called WebRTC. We are using an andditional library called SimpleWebRTC to build the video conferencing software.</p>
			<p>The project is open source and anyone can fork the project and contribute. Find the GitHub repository <a href="https://github.com/jonnymanf/hydrachat" target="_blank">here</a>.</p>
			<p>For real-time communication specialists or developers interested in using <a href="http://www.webrtc.org/" target="_blank">WebRTC</a> or <a href="http://simplewebrtc.com/" target="_blank">SimpleWebRTC</a> for their projects, these can be contributed to directly.</p>
			<h2><a id="iterAnchor">Development iterations</a></h2>
			<h2><a id="archAnchor">Architectural Diagrams</a></h2>
			<p>The architecture of the conference uses mesh networking technology to create a true peer to peer nature of the call. Each node is individually paired with the other nodes within the conference. This is strengthening the call signal and also allows each node to drop out without interrupting the conference call.</p>
			<div class="text-center">
				<img class="text-center" src="assets/img/fullMesh.jpg">
			</div>
			<h2>Database Design</h2>
			<p>We require the use of a database to store information for users conference rooms. The save conference feature is currently under construction but once complete will allow users to to save a conference to a specific URL with a specific set of participants.</p>
			<div class="text-center">
				<img src="assets/img/dataBaseShot.png" width="500">
			</div>
		</div>
	</div>
</div>