
<?php
include '../dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

    ?><nav>
	<ul style="list-style-type: none; display: flex;">
			<li><a href="/dashboard">Dashboard</a></li>
			<li><a href="/faqs">FAQs</a></li>
			<li>Jobs<a href="/jobs"></a>
				<ul>
				<?php
				$query = $pdo->prepare('SELECT * FROM category');
				$query->execute();

				foreach($query as $row){?>

				<li><a href="/viewjob?categoryId=<?=$row['id']?>"><?=$row['name']?></a></li>
				<?php } ?>
		</ul>


				</li>
				<li><a href="categorylist">Category</a></li>

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
			<li>Jobs<a href="/jobs"></a>
				<ul>
				<?php
				$query = $pdo->prepare('SELECT * FROM category');
				$query->execute();

				foreach($query as $row){?>

				<li><a href="/viewjob?categoryId=<?=$row['id']?>"><?=$row['name']?></a></li>
				<?php } ?>
		</ul>


				</li>
				<li><a href="categorylist">Category</a></li>
				<li><a href="/about">About Us</a></li>
	        <li><a href="/login">Login</a></li>
			<li><a href="/register">Register</a></li>
		</ul>
	</nav>
    <?php
}?>

