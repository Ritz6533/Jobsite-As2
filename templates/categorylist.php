<main class="sidebar">
<section class="left">
	<ul>
		<li><a href="/jobs">Jobs</a></li>
		<li><a href="/categorylist">Category</a></li>

	</ul>
</section>


<section class="right">

		<h2>Category List</h2>
		<table>
			<thead>
				
			</thead>
			<tbody>
				<?php foreach($categories as $category) { ?>
					<tr>
						<td><p><a href="/viewjob?categoryId=<?=$category['id']?>"><?=$category['name']?></a></p></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

</section>
				</main>
