<main class="sidebar">
<h1>REGISTER NEW USER</h1>
<p style="float:right;"><a href="/employeeRegister"> Register Employee</p>

<form action="" method="POST">
<input type="hidden" name="person[id]" value="<?=$record['id'] ?? ''?>" />
<input type="hidden" name="person[role]" value='1' />
 <label>First Name</label>
 <input type="text" name="person[firstname]" />
 <label>Surname</label>
 <input type="text" name="person[surname]" />
 <label>Email</label>
 <input type="text" name="person[email]" />
<label>password</label> 
<input type="password" name="person[password]"/>

 <input type="submit" name="submit" value="submit" /><br>
</form>

</main>