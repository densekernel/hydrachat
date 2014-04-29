<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
			  <a href="#faqAnchor" class="list-group-item">FAQ</a>
			  <a href="#blogAnchor" class="list-group-item">Blog</a>
			  <a href="#askAnchor" class="list-group-item">Ask a question</a>
			</div>
		</div>
		<div class="col-md-8">
			<h1>Community</h1>
			<h2><a id="faqAnchor">FAQ</a></h2>
			<div class="accordionButton first">
			    <h3>Do I have to pay to use HydraChat?</h3>
			</div>
			<div class="accordionContent">
				<p>No! HydraChat is a research project and free for anyone to use.</p>
			</div>
			<div class="accordionButton">
				<h3>Can I contribute to the development of HydraChat?</h3>
			</div>
			<div class="accordionContent">
				<p>Yes! HydraChat is built from open source components called Google WebRTC and a library called SimpleWebRTC. To find out more information check out the <a href="development.php">collaboration section.</a></p>
			</div>
			<div class="accordionButton">
				<h3>How do I create a Hydra conference?</h3>
			</div>
			<div class="accordionContent">
				<p>Click the Launch button in the homepage or on the navigation bar and choose the number of participants. Then, enter a conference name, share the link that will appear with the other participants and you are good to go!</p>
			</div>
			<div class="accordionButton">
				<h3>Is HydraChat secure?</h3>
			</div>
			<div class="accordionContent">
				<p>Absolutely! HydraChat accepts connections only in secure channels (https) or otherwise it will not create a conference. Even more, all the data transferred from one participant to the other is fully encrypted.</p>
			</div>
			<div class="accordionButton">
				<h3>Is HydraChat private?</h3>
			</div>
			<div class="accordionContent">
				<p>We keep some aggregate data for call information but do not retain any private details! No actual call history is logged as it is built using peer-to-peer technology.</p>
			</div>
			<div class="accordionButton">
				<h3>I have a slow internet connection. Can I use HydraChat?</h3>
			</div>
			<div class="accordionContent">
				<p>HydraChat automatically adjusts the audio and video quality according to your bandwidth for the best experience possible.</p>
			</div>
			<div class="accordionButton">
				<h3>Do I need to download HydraChat?</h3>
			</div>
			<div class="accordionContent">
				<p>HydraChat does not require any plugins or downloaded applications. Simply visit the HydraChat website on most modern internet browsers. Further compatibility information and system requirements are stored on the development page.</p>
			</div>
			<div class="accordionButton">
				<h3>Which internet browsers support HydraChat?</h3>
			</div>
			<div class="accordionContent">
				<p>Currently, HydraChat is fully supported for <a href="https://www.google.com/intl/en/chrome/browser/">Google Chrome</a>, <a href="http://www.mozilla.org/en-US/firefox/new/">Mozilla Firefox</a> and <a href="http://www.opera.com/">Opera</a>. Visit this page to see if your browser supports HydraChat or this page for which browsers will support WebRTC in the future.</p>
			</div>
			<div class="accordionButton">
				<h3>Does HydraChat work in Internet Explorer?</h3>
			</div>
			<div class="accordionContent">
				<p>Unfortunately not. Google retired support for Chrome Frame as of February 25, 2014 and there is no way to support HydraChat on Internet Explorer right now.</p>
			</div>
			<div class="accordionButton">
				<h3>Does HydraChat work on mobile?</h3>
			</div>
			<div class="accordionContent">
				<p>Yes! As long as you use any one of the browsers mentioned in question 8, you can use HydraChat in both tablets and smartphones!</p>
			</div>
			<h2><a id="blogAnchor">Blog</a></h2>
			<div class="blog">
				<?php
					$rss = new DOMDocument();
					$rss->load('http://hydrachat.wordpress.com/feed/');
					$feed = array();
					foreach ($rss->getElementsByTagName('item') as $node) {
						$item = array ( 
							'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
							'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
							'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
							'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
							);
						array_push($feed, $item);
					}
					$limit = 5;
					for($x=0;$x<$limit;$x++) {
						$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
						$link = $feed[$x]['link'];
						$description = $feed[$x]['desc'];
						$date = date('l F d, Y', strtotime($feed[$x]['date']));
						echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
						echo '<small><em>Posted on '.$date.'</em></small></p>';
						echo '<p>'.$description.'</p>';
					}
				?>
			</div>
			<h2><a id="askAnchor">Ask a question</a></h2>
			<div class="well well-sm">
			          <form class="form-horizontal" action="" method="post">
			          <fieldset>
			            <legend class="text-center">Contact us</legend>
			    
			            <!-- Name input-->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="name">Name</label>
			              <div class="col-md-9">
			                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
			              </div>
			            </div>
			    
			            <!-- Email input-->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="email">Your E-mail</label>
			              <div class="col-md-9">
			                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
			              </div>
			            </div>
			    
			            <!-- Message body -->
			            <div class="form-group">
			              <label class="col-md-3 control-label" for="message">Your message</label>
			              <div class="col-md-9">
			                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
			              </div>
			            </div>
			    
			            <!-- Form actions -->
			            <div class="form-group">
			              <div class="col-md-12 text-right">
			                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
			              </div>
			            </div>
			          </fieldset>
			          </form>
			        </div>
		</div>
	</div>
</div>