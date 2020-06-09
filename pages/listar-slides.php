<?php

	if(isset($_GET['delete'])){
		$idExcluir = (int)$_GET['delete'];
		$selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_site.slides` WHERE id = ?");
		$selectImagem->execute(array($_GET['delete']));

		$imagem = $selectImagem->fetch()['slide'];

		Painel::deleteFile($imagem);
		Painel::deletar('tb_site.slides',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.slides',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 8;

	$slides = Painel::selectAll('tb_site.slides',($paginaAtual - 1) * $porPagina, $porPagina);


?>
<div class="box-content">
	<h2><i class="fas fa-chalkboard"></i> Slides Cadastrados</h2>
	<div class ="wraper-table">
	<table>
		<tr>
			<td><i class="far fa-address-card"></i> Nome</td>
			<td>Imagem</td>
			<td><i class="far fa-edit"></i> Editar</td>
			<td><i class="fas fa-eraser"></i> Deletar</td>
			<td>#</td>
			<td>#</td>
		</tr>

		<?php
			foreach ($slides as $key => $value) {
		?>
		
		<tr>
			<td><?php echo $value ['nome']; ?></td>
			<td><img style = "width:50px;height: 50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']; ?>"/></td>
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slide?id=<?php echo $value['id'];?>">Editar</a></td>
			<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?delete=<?php echo $value['id']; ?>">Deletar</a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?order=up&id=<?php echo $value['id']?>"><i class="fa fa-angle-up"></i></a></td>
			<td><a class="btn order"href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?order=down&id=<?php echo $value['id']?>"><i class="fa fa-angle-down"></i></a></td>
		</tr>

		<?php }?>
	</table>
</div>


	<div class="paginacao">
	<?php
		$totalPaginas = ceil(count(Painel::selectAll('tb_site.slides'))/$porPagina);

		for($i = 1; $i <= $totalPaginas; $i++){
			if($i == $paginaAtual)
				echo '<a class= "page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
			else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
		}

	?>
	</div><!--Paginacao-->
</div><!--box-content-->