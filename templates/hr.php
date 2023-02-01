
	<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="/it">IT</a></li>
			<li class="current" ><a href="/hr">Human Resources</a></li>
			<li><a href="/sales">Sales</a></li>
		</ul>
	</section>

	<section class="right">

	<h1>Human Resources Jobs</h1>

	<ul class="listing">


	<?php
	$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
	$stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = 2 AND closingDate > :date');

	$date = new DateTime();

	$values = [
		'date' => $date->format('Y-m-d')
	];

	$stmt->execute($values);


	foreach ($stmt as $job) {
		echo '<li>';

		echo '<div class="details">';
		echo '<h2>' . $job['title'] . '</h2>';
		echo '<h3>' . $job['salary'] . '</h3>';
		echo '<p>' . nl2br($job['description']) . '</p>';

		echo '<a class="more" href="/apply?id=' . $job['id'] . '">Apply for this job</a>';

		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>