<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title>
<?php echo $title_for_layout; ?>
</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php echo $this->Html->css(array('cake.generic','normalize','style')); ?>
<?php echo $this->Html->script(array('prefixfree','http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js')); ?>
<?php echo $scripts_for_layout; ?>
</head>
<body>
<div align="center">
	<div id="box">
	<header id="header">
		<?php //echo $this->Html->image('logo-mini.png', array('alt'=>'InfoTaxi Logo', 'width'=>47, 'height'=>47)); ?>
					
	</header>
		<nav id="navegation">
			<ul>
				<li><?php echo $this->HtmlExtend->link('Empresa', array('controller'=>'empresas', 'action'=>'index'));?></li>
				<li><?php echo $this->HtmlExtend->link('Universidades', array('controller'=>'universidades', 'action'=>'index'));?></li>
				<li><?php echo $this->HtmlExtend->link('Recursos Humanos', array('controller'=>'recursos_humanos', 'action'=>'index'));?></li>
				<li><?php echo $this->HtmlExtend->link('Usuario', array('controller'=>'usuarios', 'action'=>'index'));?></li>
			</ul>
		</nav>
		<?php echo $this->Session->flash(); ?>
		<section id="section">
			<?php echo $content_for_layout; ?>
		</section>
		<footer id="footer" >
		
					Sitío Web Desarrollado por Estudiantes de la FISC - 2012
				
		</footer>
	</div>
</div>
<?php echo $this->Js->writeBuffer();?>
</body>

</html>