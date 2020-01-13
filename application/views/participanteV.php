<body>
	<center>
		<form action="<?= base_url("participanteC/ingresar")?>" id="formParticipante" method="POST" onsubmit="return validarparticipante()">
			<!-- <input type="hidden" name="id_participante" id="id" value="0" > -->

			<td>Nombre</td>
			<input type="text" name="nombre_participante" id="nombre_participante">
			<br>
			<br>
			<td>Fuerza</td>
			<input type="text" name="fuerza" id="fuerza">
			<br>
			<br>

			<td>Sexo</td>
			<select name="sexo" id="sexo">
				<option value="">--Seleccione Sexo--</option>
				<?php foreach($sexo as $s) { ?>

					<option value="<?php echo $s->id_sexo?>"><?php echo $s->nombre_sexo?></option>
				<?php } ?>
			</select>
			<br>
			<br>
			<td>Procedencia</td>
			<select name="procedencia" id="procedencia">
				<option value="">--Seleccione Procedencia--</option>
				<?php foreach($procedencia as $pr) { ?>

					<option value="<?php echo $pr->id_procedencia?>"><?php echo $pr->nombre_procedencia?></option>
				<?php } ?>
			</select>
			<br>
			<br>
			<td>Categoria</td>
			<select name="categoria" id="categoria">
				<option value="">--Seleccione Categoria--</option>
				<?php foreach($categoria as $c) { ?>

					<option value="<?php echo $c->id_categoria?>"><?php echo $c->nombre_categoria?></option>
				<?php } ?>
			</select>
			<br>
			<br>
			<input type="submit" name="Guardar">
		</form>

		<table border="2" class="table table-dark">
			<tr>
				<td>Participante</td>
				<td>Fuerza</td>
				<td>Sexo</td>
				<td>Procedencia</td>
				<td>Categoria</td>
				<td>Eliminar</td>
				<td>Actualizar</td>
			</tr>

			<?php foreach($participante as $p){ ?>
				<tr>
					<td><?= $p->nombre_participante?></td>
					<td><?= $p->fuerza?></td>
					<td><?= $p->nombre_sexo?></td>
					<td><?= $p->nombre_procedencia?></td>
					<td><?= $p->nombre_categoria?></td>
					<td><a href="<?= base_url("participanteC/eliminar/".$p->id_participante)?>" class="btn btn-danger" onclick="return confirm('Seguro que desea Eliminar?' ) " >Eliminar</a></td>
						<td><a href="<?= base_url("participanteC/get_datos/".$p->id_participante)?>" class="btn btn-info" >Actualizar</a></td>
				</tr>
			<?php } ?>

		</table>
	</center>


