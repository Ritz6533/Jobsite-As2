	<main class="sidebar">

	<section class="left">
		<ul>
		<li><a href="/jobs">Jobs</a></li>
		<li><a href="/categorylist">Category</a></li>

		</ul>
	</section>

<section class="right">
	<h1><?=$jobs[0]['category_name']?></h1>



<ul class="listing">
		<?php foreach($jobs as $job) { ?>
			
			<li>

<div class="details">
<h2><?=$job['title']?></h2>
<h3><?=$job['salary']?></h3>
<p><?=nl2br($job['description'])?></p>

<p><a href="/apply?id=<?=$job['id']?>">Apply for this job</a><p>

</div>
</li>
<br>

<?php }
?>


</section>
</main>

<?php
