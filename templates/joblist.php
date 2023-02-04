<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="/joblist">Jobs</a></li>
			<li><a href="/category">Category</a></li>

		</ul>
	</section>


	<section class="right">

			<h2>JOB List</h2>
			<form action="/addjob">
         <button type="submit"style="float: right;">Add Job</button>
      </form>

			<table>
				<thead>
					<tr>
						<th>Job ID</th>
						<th>Job Title</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($jobs as $job) { ?>
						<tr>
							<td><?php echo $job['id']; ?></td>
							<td><?php echo $job['title']; ?></td>
							<td>
							<form action="/editjob?id=<?=$job['id']?>" method="GET">
							<input type="hidden" name="id" value="<?=$job['id']?>" />
							<input type="submit" value="Edit" />
							</td>
							<td>
								<form action="" method="POST">
									<input type="hidden" name="id" value="<?=$job['id']?>">
									<input type="submit" name="delete" value="Delete">
								</form>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

	</section>
</main>
