<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?> 
<title>
<?php echo $title_for_layout; ?>
</title>


<?php echo $this->Html->script(array('prefixfree','ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js')); ?>
<?php echo $this->Html->css(array('normalize','login')); ?>
<?php echo $scripts_for_layout; ?>


</head>
<body>
 <?php echo $this->Session->flash(); ?>

<div align="center">
	<?php echo $this->Html->image('infotaxi-logo-grande.png', array('alt'=>'InfoTaxi Logo', 'width'=>100, 'height'=>100, 'class'=>'logo')); ?>
	<div id="box">
		<header id="header">
			<h1><?php echo __('Acceso al Sistema', true); ?></h1>			
		</header>
		<section id="section">
			<?php echo $content_for_layout; ?>
		</section>
	</div>
</div>
<?php echo $this->js->writeBuffer();?>
</body>

</html>