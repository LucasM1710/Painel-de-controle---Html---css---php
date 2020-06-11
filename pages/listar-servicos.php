<?php

	if(isset($_GET['delete'])){
		$idExcluir = (int)$_GET['delete'];
		Painel::deletar('tb_site.servicos',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.servicos',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 8;

	$servicos = Painel::selectAll('tb_site.servicos',($paginaAtual - 1) * $porPagina, $porPagina);


?>
<div class="box-content">
	<h2><i class="fas fa-chalkboard"></i> Serviços Cadastrados</h2>
	<div class ="wraper-table">
	<table>
		<tr>
			<td><i class="far fa-address-card"></i> Serviço</td>
			<td><i class="far fa-edit"></i> Editar</td>
			<td><i class="fas fa-eraser"></i> Deletar</td>
			<td>#</td>
			<td>#</td>
		</tr>

		<?php
			foreach ($servicos as $key => $value) {
		?>
		
		<tr>
			<td><?php echo $value ['servico']; ?></td>
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servico?id=<?php echo $value['id'];?>">Editar</a></td>
			<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL?>listar-servicos?delete=<?php echo $value['id']; ?>">Deletar</a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-servicos?order=up&id=<?php echo $value['id']?>"><i class="fa fa-angle-up"></i></a></td>
			<td><a class="btn order"href="<?php echo INCLUDE_PATH_PAINEL?>listar-servicos?order=down&id=<?php echo $value['id']?>"><i class="fa fa-angle-down"></i></a></td>
		</tr>

		<?php }?>
	</table>
</div>


	<div class="paginacao">
	<?php
		$totalPaginas = ceil(count(Painel::selectAll('tb_site.servicos'))/$porPagina);

		for($i = 1; $i <= $totalPaginas; $i++){
			if($i == $paginaAtual)
				echo '<a class= "page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
			else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
		}

	?>
	</div><!--Paginacao-->
</div><!--box-content-->