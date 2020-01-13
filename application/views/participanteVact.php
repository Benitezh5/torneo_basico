<body>
	<center>

		<form action="<?= base_url("participanteC/actualizar")?>" method="POST" onsubmit="return validarparticipante()">
			<?php foreach($participante as $p){ ?>
				
				 <input type="hidden" name="id_participante" id="id_participante" value="<?= $p->id_participante?>" >  

				<td>Nombre</td>
				<input type="text" name="nombre_participante" id="nombre_participante" value="<?= $p->nombre_participante?>">
				<br>
				<br>
				<td>Fuerza</td>
				<input type="text" name="fuerza" id="fuerza" value="<?= $p->fuerza?>" >
				<br>
				<br>

				 <td>Sexo</td>
				<select name="sexo" id="sexo">
					<option value="">--Seleccione Sexo--</option>
					<?php foreach($sexo as $s) { ?>

						<option value="<?php echo $s->id_sexo?>"<?php if($s->id_sexo==$p->id_sexo) {echo "selected";}?>><?php echo $s->nombre_sexo?></option>
					<?php } ?>
				</select>
				<br>
				<br>
				<td>Procedencia</td>
				<select name="procedencia" id="procedencia">
					<option value="">--Seleccione Procedencia--</option>
					<?php foreach($procedencia as $pr) { ?>

						<option value="<?php echo $pr->id_procedencia?>"<?php if($pr->id_procedencia==$p->id_procedencia) {echo "selected";}?>><?php echo $pr->nombre_procedencia?></option>
					<?php } ?>
				</select>
				<br>
				<br>
				<td>Categoria</td>
				<select name="categoria" id="categoria">
					<option value="">--Seleccione Categoria--</option>
					<?php foreach($categoria as $c) { ?>

						<option value="<?php echo $c->id_categoria?>"<?php if($c->id_categoria==$p->id_categoria) {echo "selected";}?>><?php echo $c->nombre_categoria?></option>
					<?php } ?>
				</select> 
				<br>
				<br>
				<input type="submit" value="actualizar">
			<?php } ?>
		</form>
		