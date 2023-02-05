<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="/joblist">Jobs</a></li>
			<li><a href="/category">Category</a></li>

		</ul>
	</section>


	<section class="right">

			<h2>Applicants list</h2>

			<table>
				<thead>
					<tr>
						<th>Applicant ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>job</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($applicants as $applicant) { ?>
						<tr>
							<td><?=$applicant['id']?></td>
							<td><?=$applicant['name']?></td>
							<td><?=$applicant['email']?></td>
							<td><?=$applicant['jobname']?></td>
							
						</tr>
					<?php } ?>
				</tbody>
			</table>

	</section>
</main>
