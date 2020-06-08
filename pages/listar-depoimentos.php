<?php
	$depoimentos = Painel::selectAll('tb_site.depoimentos');

?>
<div class="box-content">
	<h2><i class="fas fa-chalkboard"></i> Depoimentos Cadastrados</h2>
	<table>
		<tr>
			<td><i class="far fa-address-card"></i> Nome</td>
			<td><i class="far fa-calendar-alt"></i> Data</td>
			<td><i class="far fa-edit"></i> Editar</td>
			<td><i class="fas fa-eraser"></i> Deletar</td>
		</tr>

		<?php
			foreach ($depoimentos as $key => $value) {
		?>
		
		<tr>
			<td><?php echo $value ['nome']; ?></td>
			<td><?php echo $value ['data']; ?></td>
			<td><a class="btn edit" href="">Editar</a></td>
			<td><a class="btn delete" href="">Deletar</a></td>
		</tr>

		<?php }?>
	</table>

</div><!--box-content-->