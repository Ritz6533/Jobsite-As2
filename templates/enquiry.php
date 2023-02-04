<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="/joblist">Jobs</a></li>
			<li><a href="/category">Category</a></li>

		</ul>
	</section>


<section class="right">

<h2>Enquiries</h2>
<ul class="listing">
<?php foreach($enquiries as $enquiry) { ?>
    <li>

<div class="details">
<h3><?=$enquiry['name']?></h2>
<h4><?=$enquiry['email']?></h3>
<h4><?=$enquiry['phoneNumber']?></h3>
<p><?=nl2br($enquiry['Enquiry'])?></p>

</div>
</li>
<br>

<?php }
?>

</ul>

</section>
</main>