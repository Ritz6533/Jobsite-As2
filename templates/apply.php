
	<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/categorylist">Categories</a></li>

		</ul>
	</section>

	<section class="right">
	<?php 
      foreach($jobs as $job) { 
    ?>
			<h2>Apply for <?=$job['title'];?></h2>

			<form action="" method="POST">
				<label>Your name</label>
				<input type="text" name="name" value=""/>

				<label>E-mail address</label>
				<input type="text" name="email"value="" />

				<label>Cover letter</label>
				<textarea name="details"></textarea>

				

				<input type="hidden" name="jobId" value="<?=$job['id'];?>" />

				<input type="submit" name="applicants" value="apply" />

			</form>
			<?php } ?>
			</section>
	</main>
