<?php 
	echo form_open('user/login');?>
	
		<input type="text" name="username" placeholder="Användarnamn"/>
		<input type="password" name="username" placeholder="Lösenord"/>
<?php 
		echo form_submit('login', 'Logga in');
	echo form_close();
?>







