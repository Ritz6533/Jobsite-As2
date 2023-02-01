
	<main class="home">
<h2>Internet job Database</h2>

<p>Welcome to the Internet job Database</p>
<p> The first job added to IJDB was: </p>

<?php foreach($jobs as $job) { ?>

	<?=$job['title']?> 

<?php } ?>
</main>