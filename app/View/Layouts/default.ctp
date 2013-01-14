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
			<?php echo $title_for_layout; ?>
		</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
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

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php echo $this->Html->link('Zwangsstörung-Studie', '/', array('class' => 'brand')); ?>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
							<?php
							if(AuthComponent::user() === NULL) { ?>
							<li><?php echo $this->Html->link('Registrierung', '/users/register', array('class'=>'')); ?></li>
							<?php }?>
                            <li><a href="#about">Informationen</a></li>
                            <li><a href="mailto:zwangPSYCHOLOGIE@hu-berlin.de">Kontakt</a></li>
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
						}
						else { ?>
							<?php echo $this->Html->link("Logout ".AuthComponent::user('email'), '/users/logout'); ?>
						<?php } ?>
						</li>
						</ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

            <hr>

            <footer>
                <p>&copy; Humboldt-Universität zu Berlin 2012</p>
            </footer>

        </div> <!-- /container -->
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
		pr($this->validationErrors);
?>

    </body>
</html>