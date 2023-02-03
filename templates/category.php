
	<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/category">Category</a></li>

		</ul>
	</section>

	
<section class="right">


<ul class="listing">
<?php foreach($categories as $category) { ?>


<div class="details">
<p><a href="/<?=$category['name']?>"><?=$category['name']?></a></p>

</div>
<br>

<?php }
?>

</ul>

</section>
</main>