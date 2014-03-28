<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
			  <a href="#" class="list-group-item">Requirements</a>
			  <a href="#" class="list-group-item">SDK/Collaboration</a>
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
			<h2>Requirements</h2>
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
						<td>RQ1</td>
						<td>Functional</td>
						<td>HydraChat shall allow for both one-to-one and multi-point video conferencing of up to 4 persons including the host.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RQ1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<h2>SDK/Collaboration</h2>
			<p>The software was building using an open source project built by Google called WebRTC. We are using an andditional library called SimpleWebRTC to build the video conferencing software.</p>
			<h2>Architectural Diagrams</h2>
			<p>The architecture of the conference uses mesh networking technology to create a true peer to peer nature of the call. Each node is individually paired with the other nodes within the conference. This is strengthening the call signal and also allows each node to drop out without interrupting the conference call.</p>
			<img src="assets/img/fullMesh.jpg">
			<h2>Database Design</h2>
			<img src="assets/img/dataBaseShot.png" width="500">
		</div>
	</div>
</div>