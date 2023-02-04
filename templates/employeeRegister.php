<main class="sidebar">
<h1>REGISTER EMPLOYEE</h1>

<form action="/employeeRegister" method="POST">
<?php if (count($errors) > 0) { ?>
 <p>Your registration could not be processed:</p>
 <ul>
 <?php foreach ($errors as $error) { ?>
 <li><?=$error?></li>
 <?php } ?>
 </ul>
 <?php } ?>
<input type="hidden" name="id"/>
<input type="hidden" name="role" value='employee' />
 <label>First Name</label>
 <input type="text" name="firstname" />
 <label>Surname</label>
 <input type="text" name="surname" />
 <label>Email</label> <input type="email" name="email"/>
 <label>password</label> 
<input type="password" name="password"/>
 <label>Employee Code</label>
 <input type="text" name="employee_code" />
 <input type="submit" name="users" value="submit" /><br>

    </form>
<br>
    </main>