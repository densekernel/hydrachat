<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
			  <a href="#" class="list-group-item">FAQ</a>
			  <a href="#" class="list-group-item">Blog</a>
			  <a href="#" class="list-group-item">Ask a question</a>
			</div>
		</div>
		<div class="col-md-8">
			<h1>Community</h1>
			<h2>FAQ</h2>
			<div class="accordionButton first">
			    <h3>How do I join?</h3>
			</div>
			<div class="accordionContent">
					<p>Click on the ‘Register’ button and follow the instructions</p>
			</div>
			<div class="accordionButton">
				<h3>Is there a joining fee?</h3>
			</div>
			<div class="accordionContent">
					<p>Click on the ‘Register’ button and follow the instructions</p>
			</div>
			<h2>Blog</h2>
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
		</div>
	</div>
</div>