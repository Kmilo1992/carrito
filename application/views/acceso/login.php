<?= form_open('login',array('class'=>'form-horizontal')) ?>


<div class="control-group">

	<label class="control-label" for="usr">Usuario/Correo electr&oacute;nico</label>
	<div class="controls">
		<input type="text" name="usr" id="usr" placeholder="Usuario/Correo electr&oacute;nico"/>
	</div>

</div>

<div class="control-group">

	<label class="control-label" for="pwd">Contrase&ntilde;a</label>
	<div class="controls">
		<input type="password" name="pwd" id="pwd" placeholder="Contrase&ntilde;a"/>
	</div>

</div>

<div class="control-group">
	<div class="controls">
		<input type="submit" class="btn" value="Iniciar Sesi&oacute;n" />
	</div>
</div>

<?
	if($failure==true){
?>
	<div class="alert alert-error">
		<span>Usuario/Contrase&ntilde;a incorrectos.</span>
	</div>

<? } ?>
</form>