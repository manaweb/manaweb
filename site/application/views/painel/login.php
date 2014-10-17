<!DOCTYPE>
<html>
	<?php $this->load->view('shared/header.php'); ?>
	
	<body>
		<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Maná WEB - Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtUser">Usuário</label>  
  <div class="col-md-5">
  <input id="txtUser" name="txtUser" type="text" placeholder="Digite seu usuário" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPassword">Senha</label>
  <div class="col-md-5">
    <input id="txtPassword" name="txtPassword" type="password" placeholder="Digite sua senha" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="optRemember">Lembrar senha?</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="optRemember-0">
      <input type="checkbox" name="optRemember" id="optRemember-0" value="1">
      Sim
    </label>
    <label class="checkbox-inline" for="optRemember-1">
      <input type="checkbox" name="optRemember" id="optRemember-1" value="0">
      Não
    </label>
  </div>
</div>

</fieldset>
</form>

	</body>
</html>