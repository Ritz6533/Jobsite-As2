<main class="sidebar">
<h1>REGISTER NEW USER</h1>
<p style="float:right;"><a href="/employeeRegister">Employee Register Here!!!</a></p>


<form action="/register" method="POST">
<?php if (count($errors) > 0) { ?>
 <p>Your registration could not be processed:</p>
 <ul>
 <?php foreach ($errors as $error) { ?>
 <li><?=$error?></li>
 <?php } ?>
 </ul>
 <?php } ?>

<input type="hidden" name="id"/>
<input type="hidden" name="role" value='client' />
 <label>First Name</label>
 <input type="text" name="firstname" />
 <label>Surname</label>
 <input type="text" name="surname" />
 <label>Email</label> <input type="email" name="email"/>
 <label>password</label> 
<input type="password" name="password"/>
 <input type="submit" name="users" value="submit" />
    </form>
<br>
    </main>