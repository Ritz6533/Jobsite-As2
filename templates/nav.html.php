
<?php

if (isset($_SESSION['loggedin'])) {

    ?><nav>
	<ul style="list-style-type: none; display: flex;">
			<li><a href="/dashboard">Dashboard</a></li>
			<li><a href="/faqs">FAQs</a></li>
			<li>Jobs
				<ul>
				<?php foreach($categories as $category) { ?>


			<li><a href="/viewjob?categoryId=<?=$category['id']?>"><?=$category['name']?></a></li>

<?php }
?>

				</ul></li>
				<li><a href="category">Category</a></li>

				<li><a href="/about">About Us</a></li>
	        <li><a href="logout">logout</a></li>
		</ul>
	</nav>
<?php
}
else {?>

    <nav>
	<ul style="list-style-type: none; display: flex;">
			<li><a href="/">Home</a></li>
			<li><a href="/faqs">FAQs</a></li>
			<li>Jobs
				<ul>
				<?php foreach($categories as $category) { ?>


			<li><a href="/viewjob?categoryId=<?=$category['id']?>"><?=$category['name']?></a></li>

<?php }
?>

				</ul></li>
				<li><a href="category">Category</a></li>
				<li><a href="/about">About Us</a></li>
	        <li><a href="/login">Login</a></li>
			<li><a href="/register">Register</a></li>
		</ul>
	</nav>
    <?php
}?>

