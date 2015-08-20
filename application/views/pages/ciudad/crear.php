<div class="row">
	<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">
		
		<?php echo form_open('ciudad/crear') ?>
		<div class="form-group">
		<?php echo form_error('nombre'); ?>
			<label for="nombre">
				Nombre
			</label>
			<input type="input" class="form-control" name="nombre" />
		</div>
		<div class="form-group">
		<?php echo form_error('latitud'); ?>
			<label for="latitud">
				Latitud
			</label>
			<input type="input" class="form-control" name="latitud" />
		</div>
		<div class="form-group">
		<?php echo form_error('longitud'); ?>
			<label for="longitud">
				Longitud
			</label>
			<input type="input" class="form-control" name="longitud" />
		</div>
		<input type="submit" name="submit" value="Guardar" class="btn btn-primary" />
		</form>
	</div>
</div>
