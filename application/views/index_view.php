<?php 
	if(!$this->safety_model->isLoggedIn()){
		echo form_open('user/login');
?>

		<input type="text" name="username" placeholder="Användarnamn"/>
		<input type="password" name="password" placeholder="Lösenord"/>
	
<?php 
		echo form_submit('login', 'Logga in');
		echo form_close();
	}else{
?>
	<h1>Välkommen!</h1>
	<p>Här till vänster kan du navigera and do whatever I dunno. Du är inloggad i alla fall. Grattis.</p>
<?php 
	}
?>