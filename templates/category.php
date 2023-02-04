<main class="sidebar">
<section class="left">
	<ul>
		<li><a href="/joblist">Jobs</a></li>
		<li><a href="/category">Category</a></li>

	</ul>
</section>


<section class="right">

		<h2>Category List</h2>
		<form action="/addcategory">
         <button type="submit"style="float: right;">Add Category</button>
      </form>
		<table>
			<thead>
				<tr>
					<th>Category ID</th>
					<th>Title</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($categories as $category) { ?>
					<tr>
						<td><?=$category['id']?></td>
						<td><p><a href="/viewjob?categoryId=<?=$category['id']?>"><?=$category['name']?></a></p></td>

							<td>
							<form action="/editcategory?id=<?=$category['id']?>" method="GET">
							<input type="hidden" name="id" value="<?=$category['id']?>" />
							<input type="submit" value="Edit" />

						</form>

						</td>
						<td>
							<form action="" method="POST">
								<input type="hidden" name="id" value="<?=$category['id']?>">
								<input type="submit" name="delete" value="Delete">
							</form></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

</section>
				</main>
