<?php
	verificaPermissaoPagina(2);

?>
<div class="box-content">
	<h2><i class="fa fa-pen"></i> Adicionar usuário</h2>

	<form method="post" enctype="multipart/form-data">
		<?php 
			if(isset($_POST['acao'])){
				
			}
		?>
		<div class="form-group">
			<label>Login: </label>
			<input type="text" name="login" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome: </label>
			<input type="text" name="nome" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha: </label>
			<input type="password" name="password" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem: </label>
			<input type="file" name="imagem" required/>
		</div><!--form-group-->	

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>
	


</div>