<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/all.css" > 
	<link href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css" rel="stylesheet"/>

</head>

<body>
	<div class="menu">
		<div class="menu-wraper">
		<div class="box-usuario">
			<?php
				if($_SESSION['img'] == ''){
			?>
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!--avatar-usuario-->
			<?php }else{ ?>
			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img']; ?>"/>
			</div><!--avatar-usuario-->
			<?php } ?>
			<div class ="nome-usuario">
				<p><?php echo $_SESSION['nome'];?></p>
				<p><?php echo pegaCargo($_SESSION['cargo']);?></p>
			</div><!--nome-usuario-->
		</div><!--box-usuario-->
		<div class ="items-menu">
			<h2>Cadastro</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar Depoimento</a>
			<a href="">Cadastrar Serviço</a>
			<a href="">Cadastrar Slides</a>
			<h2>Gestão</h2>
			<a href="">Listar Depoimentos</a>
			<a href="">Listar Serviços</a>
			<a href="">Listar Slides</a>
			<h2>Administração do painel</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario">Editar Usuário</a>
			<a href="">Adicionar Usuário</a>
			<h2>Configuração Geral</h2>
			<a href="">Editar</a>
		</div><!--items-menu-->
		</div><!--menu-wraper-->
	</div><!--menu-->
	<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div><!--menu-btn-->

			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-home"></i><span>Página Inicial</span></a>
				<a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fas fa-sign-out-alt"></i> <span>Sair </span></a>
			</div><!--Loggout-->

			<div class="clear"></div>
		</div>
	</header>
	<div class="content">
		<?php Painel::carregarPagina();?>

	</div><!--content-->

	<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>

</html>