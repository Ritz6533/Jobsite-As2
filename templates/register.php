<main class="sidebar">
<h1>REGISTER NEW USER</h1>
<p style="float:right;"><a href="/employeeRegister">Employee Register Here!!!</a></p>


<form action="/register" method="POST">
<input type="hidden" name="id"/>
<input type="hidden" name="role" value='client' />
 <label>First Name</label>
 <input type="text" name="firstname" />
 <label>Surname</label>
 <input type="text" name="surname" />
 <label>Email</label>
 <input type="text" name="email" />
 <label>password</label> 
<input type="password" name="password"/>
 <input type="submit" name="users" value="submit" />
    </form>
<br>
    </main>