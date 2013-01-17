<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
<?php 		echo $this->Html->meta('icon');?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>
			<?php echo $this->fetch('title'); ?>
		</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap-responsive.min.css">
        <script src="<?php echo $this->webroot; ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<?php

			echo $this->Html->css('main');

			echo $this->fetch('meta');
			echo $this->fetch('css');
		?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner nav-withlogo">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
					<h2 class="nav">Online-Therapie bei Zwangsstörung</h2>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
							<li <?=($this->request->url===false) ? 'class="active"': '' ;?>><?php echo $this->Html->link('Willkommen', '/'); ?></li>
                            <li <?=($this->request->url==='pages/study') ? 'class="active"': '' ;?>><?php echo $this->Html->link('Studie', '/pages/study'); ?></li>

							<?php
							if(AuthComponent::user() === NULL) { ?>
							<li <?=($this->request->url==='users/register') ? 'class="active"': '' ;?>><?php echo $this->Html->link('Anmeldung', '/users/register'); ?></li>
							<?php }?>
							
                            <li <?=($this->request->url==='trials/train') ? 'class="active"': '' ;?>><?php echo $this->Html->link('Trainieren', '/trials/train', array('class'=>'')); ?></li>
                            <li <?=($this->request->url==='pages/contact') ? 'class="active"': '' ;?>><?php echo $this->Html->link('Kontakt', '/pages/contact'); ?></li>
							<li>
						<?php
						if(AuthComponent::user() === NULL) {
							echo $this->Form->create('User', array(
								'class' => 'navbar-form pull-right',
								'action' => "login"	
							));
					    	echo $this->Form->input('email', array(
								'class'=>'span2', 
								'placeholder' => 'Email',
								'type' => 'email',
								'label' => false,
								'between'=> '<div class="span input-prepend" style="margin-top:5px;margin-right:5px"><span class="add-on"><i class="icon-envelope"></i></span>', 
								'after' => '</div>',
								'div' => false,
							));
					        echo $this->Form->input('password', array(
								'class'=>'span2', 
								'style' => 'margin-right:5px',
					        	'placeholder' => 'Passwort',
								'div' => false,
								'label' => false,
					        ));
							echo $this->Form->end(array(
								'label' => 'Anmelden',
								'class' => 'btn',
								'div' => false,
							)); 
							echo "</li>";
						}
						else {
							echo $this->Html->link("Logout ".AuthComponent::user('email'), '/users/logout'). "</li>";
							if(AuthComponent::user('Group.name')==='admin') {
								?>
						  <li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						      Admin
						      <b class="caret"></b>
						    </a>
						    <ul class="dropdown-menu">
								<li><?=$this->Html->link("Show users",   '/admin/users/index'); ?></li>
								<li class="divider"></li>
								<li><?=$this->Html->link("Export Trials as CSV",     '/admin/trials/export/CSV'); ?></li>
								<li><?=$this->Html->link("Export Trials as TSV",     '/admin/trials/export/TSV'); ?></li>
								<li><?=$this->Html->link("Export Trials as Excel",   '/admin/trials/export/excel'); ?></li>
								<li class="divider"></li>                             
								<li><?=$this->Html->link("Export Sessions as CSV",   '/admin/trainingSessions/export/CSV'); ?></li>
								<li><?=$this->Html->link("Export Sessions as TSV",   '/admin/trainingSessions/export/TSV'); ?></li>
								<li><?=$this->Html->link("Export Sessions as Excel", '/admin/trainingSessions/export/excel'); ?></li>
								<li class="divider"></li>                             
								<li><?=$this->Html->link("Export Reactions as CSV",  '/admin/reactions/export/CSV'); ?></li>
								<li><?=$this->Html->link("Export Reactions as TSV",  '/admin/reactions/export/TSV'); ?></li>
								<li><?=$this->Html->link("Export Reactions as Excel",'/admin/reactions/export/excel'); ?></li>
						    </ul>
						  </li>
								<?php
							}
					 	} ?>
					
						</ul>
						<div class="menulogo pull-right" ><img src="<?php echo $this->webroot; ?>/img/husiegel_menu.png" width="150" height="150"></div>
						
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container clearfix">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
        </div> <!-- /container -->


            <footer class="span12">
	            <hr>
	
                <p>&copy; Humboldt-Universität zu Berlin 2012</p>
            </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $this->webroot; ?>js/vendor/jquery-1.8.3.js"><\/script>')</script>

        <script src="<?php echo $this->webroot; ?>js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo $this->webroot; ?>js/plugins.js"></script>
        <script src="<?php echo $this->webroot; ?>js/main.js"></script>
<?php 		echo $this->fetch('script'); ?>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
		<?php echo $this->element('sql_dump');
		debug($this->data);
		debug($this->request->url);
		pr($this->validationErrors);
?>

    </body>
</html>