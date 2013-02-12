<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="<?php echo base_url() . "img/favicon.ico"?>" type="image/x-icon"> 
	
	<title><?php echo $title?></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen"/>
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8_bin"/>
	<meta name="description" content="<?php echo $description;?>"/>
	<meta name="keywords" content="<?php echo $keyword;?>"/>
</head>
<body>
	
	<div id="container">

		<div id="header"></div>
		
		<div id="nav">
			<ul>
				<li><a href="<?php echo base_url();?>Economy">Ekonomi</a></li>
				<li><a href="<?php echo base_url();?>Operation">Verksamhet</a></li>
				<li><a href="<?php echo base_url();?>Settings">Inställningar</a></li>
				<li><a href="<?php echo base_url();?>User/logout">Logga ut</a></li>
			</ul>
		</div>
		
		<div id="content">
			<?php $this->load->view($mainContent); ?>
		</div>
		
		
		
	</div>
	

	
	
	
</body>
</html>