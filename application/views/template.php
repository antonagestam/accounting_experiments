<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Accounting</title>
		<script src="<?php echo base_url(); ?>assets/js/adapt.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reset.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	</head>
	
	<body>
		<div class="container_12" id="page">
			<nav class="grid_2">
				<ul>
					<li><a href="<?php echo site_url('start'); ?>">Summary</a></li>
					<li><a href="<?php echo site_url('nodes'); ?>">Nodes</a></li>
					<li><a href="<?php echo site_url('transactions'); ?>">Transactions</a></li>
				</ul>
			</nav>
			
			<section class="grid_10">
				<?php $this->load->view($view); ?>
			</section>
		</div>
		
		<script src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ui-enhance.js"></script>
	</body>
</html>