
	<main class="home">
<h2>Internet job Database</h2>

<p>Welcome to the Internet job Database. Here are some latest jobs in the UK</p>


<section class="right">


		<ul class="listing">
		<?php foreach($jobs as $job) { ?>
			<li>

<div class="details">
<h2><?=$job['title']?></h2>
<h3><?=$job['salary']?></h3>
<p><?=nl2br($job['description'])?></p>

<a class="more" href="/apply?id='<?=$job['id']?> '">Apply for this job</a>

</div>
</li>
<br>

<?php }
?>

</ul>

</section>
</main>