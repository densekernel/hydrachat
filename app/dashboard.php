<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="app.css" media="screen">
	</head>
	<body>
		<?php
		
		$confName = $_POST["confName"];
		$confPeople = $_POST["confPeople"];

		// echo $confName;
		// echo "<br />";
		// echo $confPeople;
		// echo "<br />";

		if ($confPeople == 4) {
			// echo "4 people";

			$pair1 = $confName . 1;
			$pair2 = $confName . 2;
			$pair3 = $confName . 3;
			$pair4 = $confName . 4;
			$pair5 = $confName . 5;
			$pair5 = $confName . 6;

			include "temps/4call.php";
		}
		else if ($confPeople == 3) {
			// echo "3 people";

			$pair1 = $confName . 1;
			$pair2 = $confName . 2;
			$pair3 = $confName . 3;

			include "temps/3call.php";

		}
		else {
			echo "<a href='call.php'>Start call</a>";
		}

		?>
	</body>
</html>