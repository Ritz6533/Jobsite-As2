<main class="sidebar">
<h1>REGISTER NEW USER</h1>

<form action="" method="POST">
<input type="hidden" name="person[id]" value="<?=$record['id'] ?? ''?>" />
<input type="hidden" name="person[role]" value='1' />
 <label>First Name</label>
 <input type="text" name="person[firstname]" />
 <label>Surname</label>
 <input type="text" name="person[surname]" />
 <label>Email</label>
 <input type="text" name="person[email]" />
 <input type="submit" name="submit" value="submit" /><br>
</form>

</main>