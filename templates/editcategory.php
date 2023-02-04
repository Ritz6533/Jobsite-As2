<main class="sidebar">
<section class="left">
	<ul>
		<li><a href="/joblist">Jobs</a></li>
		<li><a href="/category">Category</a></li>

	</ul>
</section>
<h3>Edit Category</h3>

<form action="" method="post">
  <div>
  <?php foreach($categories as $category) { ?>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?=$category['name']?>">
  </div>
  <input type="hidden" name="id" value="<?=$category['id'] ?>">
  <input type="submit" name="editcategory" value="submit" />  <?php } ?>
</form>
</main>