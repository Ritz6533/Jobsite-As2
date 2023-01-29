<?php

if (isset($_SESSION['loggedin'])) {

    ?><nav>
	<ul style="list-style-type: none; display: flex;">
			<li><a href="/dashboard">Dashboard</a></li>
			<li><a href="/faqs">FAQs</a></li>
			<li>Jobs
				<ul>
					<li><a href="/it">IT</a></li>
					<li><a href="/hr">Human Resources</a></li>
					<li><a href="/sales">Sales</a></li>

				</ul></li>
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
					<li><a href="/it">IT</a></li>
					<li><a href="/hr">Human Resources</a></li>
					<li><a href="/sales">Sales</a></li>

				</ul></li>
				<li><a href="/about">About Us</a></li>
	        <li><a href="login">Login</a></li>
		</ul>
	</nav>
    <?php
}?>

