<main class="sidebar">
<section class="left">
	<ul>
		<li><a href="/joblist">Jobs</a></li>
		<li><a href="/category">Category</a></li>

	</ul>
</section>
<h3>Edit jobs</h3>
<form action="" method="POST" >
<?php foreach($jobs as $job) { ?>
				<input type="hidden" name="id" value="<?=$job['id'] ?>">

				<label>Title</label>
				<input type="text" name="title" value="<?=$job['title']?>"/>

				<label>Description</label>
				<textarea name="description" value="<?=$job['description']?>"></textarea>

				<label>Salary</label>
				<input type="text" name="salary" value=<?=$job['salary']?> />

				<label>Location</label>
				<input type="text" name="location" value=<?=$job['location']?> />

				<label>Closing Date</label>
				<input type="date" name="closingDate" value=<?=$job['closingDate']?> />

				<input type="submit" name="editjob" value="submit" />
				<?php } ?>
			</form>

	</main>
