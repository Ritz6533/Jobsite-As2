
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - <?=$title;?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Office Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<h1>Jo's Jobs</h1>

		</section>
	</header>
	<? require 'nav.html.php' 
// layout page to set the standard look of the website.
?>
<img src="../images/randombanner.php"/>
	
  
		<?=$output;?>


	<footer>
	<div style="text-align: center; padding: 10px;">	Copyright © 2023 Jo's Jobs . All rights reserved.
</div>	
</footer>
</body>
</html>