<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		Home Base Dev - 
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-formhelpers.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<style>
	body {
		padding-top: 70px; /* 70px to make the container go all the way to the bottom of the topbar */
	}
	.affix {
		position: fixed;
		top: 60px;
		width: 220px;
	}
	</style>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">

				<?php echo $this->Html->link('Brewers Gate Admin', array(
					'controller' => 'admin',
					'action' => 'index'
				), array('class' => 'navbar-brand')); ?>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
                
                <?php 
                    if (AuthComponent::user('id')){
                ?>
				<ul class="nav navbar-nav">
					
					<li><?php echo $this->Html->link('Floor Plans', array(
						'controller' => 'floorplans',
						'action' => 'index'
					)); ?></li>
					<li><?php echo $this->Html->link('Events', array(
						'controller' => 'events',
						'action' => 'index'
					)); ?></li>
                    
					<?php 
                        if (AuthComponent::user('role') == 'admin'){
                    ?>
					<li><?php echo $this->Html->link('Users', array(
						'controller' => 'users',
						'action' => 'index'
					)); ?></li>
                    
               	 	<?php } ?>
				</ul>
                <?php } ?>
            
                <div class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav">
                    <li>
					<?php 
                        if (AuthComponent::user('id')){
					?>
							<li><p class="navbar-text pull-right">Hello 
   							<?= AuthComponent::user('username');
							?> | <a href="/users/logout" class="navbar-link">Log Out</a></p>
                     <?php  
					 	}
                        else{
                            echo $this->Html->link('Log In', array(
                                'controller' => 'users',
                                'action' => 'login'
                                
                            ));
                        }
						
                        ?>
                     </li>
                    </ul>
                </div>      
			</div>
		</div>
	</nav>

	<div class="container">

	    <?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>

	</div><!-- /container -->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="../../js/bootstrap-formhelpers.min.js"></script>
	<script src="//google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
