<script>
	$(document).ready(function(){

		mostrarParticipante();

		function mostrarParticipante(){
			$.ajax({
				type: 'ajax',
				url:   '<?= base_url("participanteC/get_participante")?>',
				dataType: 'json',

				success: function(datos){
					var tabla='';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){
						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_participante+'</td>'+
						'<td>'+datos[i].fuerza+'</td>'+
						'<td>'+datos[i].nombre_sexo+'</td>'+
						'<td>'+datos[i].nombre_procedencia+'</td>'+
						'<td>'+datos[i].nombre_categoria+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_participante+'">Eliminar</a>'+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edi" data="'+datos[i].id_participante+'">Editar</a>'+'</td>'+

						'</tr>';	
					}
					$('#tabla_participante').html(tabla);
				}

			});
		}

		$('#tabla_participante').on("click", ".borrar", function(){
			$id=$(this).attr("data");
			$('#modalBorrar').modal("show");
			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url:  '<?= base_url("participanteC/eliminar")?>',
					data:  {id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal("hide");
						if(respuesta==true){
							alertify.notify("Eliminado Exitosamente!", "success", 10, null);
							mostrarParticipante();
						}else{
							alertify.notify("Error al Eliminar!", "error", 10, null);
						}
					}
				});
			});
		});

		$('#nuePar').click(function(){
			$('#participante').modal("show");
			$('#participante').find(".modal-title").text("Nuevo Participante");
			$('#formParticipante').attr("action", "<?= base_url("participanteC/ingresar")?>");
		});


		get_sexo();

		function get_sexo(){
			$.ajax({
				type: 'ajax',

				url:  '<?= base_url("participanteC/get_sexo")?>',

				dataType: 'json',

				success: function(datos){
					var op='';
					var i;

					op+="<option value=''>--Seleccione Sexo--</option>";

					for(i=0; i<datos.length; i++){
						op+="<option value='"+datos[i].id_sexo+"'>"+datos[i].nombre_sexo+"</option>";
					}
					$('#sexo').html(op);

				}
			});
		}


		get_procedencia();

		function get_procedencia(){
			$.ajax({
				type: 'ajax',

				url:  '<?= base_url("participanteC/get_procedencia")?>',

				dataType: 'json',

				success: function(datos){
					var op='';
					var i;

					op+="<option value=''>--Seleccione procedencia--</option>";

					for(i=0; i<datos.length; i++){
						op+="<option value='"+datos[i].id_procedencia+"'>"+datos[i].nombre_procedencia+"</option>";
					}
					$('#procedencia').html(op);

				}
			});
		}




		get_categoria();

		function get_categoria(){
			$.ajax({
				type: 'ajax',

				url:  '<?= base_url("participanteC/get_categoria")?>',

				dataType: 'json',

				success: function(datos){
					var op='';
					var i;

					op+="<option value=''>--Seleccione categoria--</option>";

					for(i=0; i<datos.length; i++){
						op+="<option value='"+datos[i].id_categoria+"'>"+datos[i].nombre_categoria+"</option>";
					}
					$('#categoria').html(op);

				}
			});
		}

		$('#btnGuardar').click(function(){
			$url= $('#formParticipante').attr("action");
			$data = $('#formParticipante').serialize();
			if(validarparticipante()==true){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url:  $url,
					data:  $data,
					dataType: 'json',

					success: function(respuesta){
						$('#participante').modal("hide");
						if(respuesta=="add"){
							alertify.notify("Ingresado Exitosamente!", "success", 10, null);
							mostrarParticipante();
						}else if(respuesta=="edi"){
							alertify.notify("Actualizado Exitosamente!", "success", 10, null);
							mostrarParticipante();
							
						}else{
							alertify.notify("Error al Eliminar!", "error", 10, null);
						}
						$('#formParticipante')[0].reset();
					}
				});
			}

		});

		$('#tabla_participante').on("click", ".item-edi", function(){
			var $id=$(this).attr("data");
			$("#participante").modal("show");
			$('#participante').find(".modal-title").text("Editar Participante");
			$('#formParticipante').attr("action","<?= base_url("participanteC/actualizar")?>");

			$.ajax({
				type: 'ajax',
				method: 'post',
				url:  '<?= base_url("participanteC/get_datos")?>',
				data:  {id:$id},
				dataType: 'json',

				success: function(datos){
					$('#id').val(datos.id_categoria);
					$('#nombre_participante').val(datos.nombre_participante);
					$('#fuerza').val(datos.fuerza);
					$('#sexo').val(datos.id_sexo);
					$('#procedencia').val(datos.id_procedencia);
					$('#categoria').val(datos.id_categoria);
				}
			});
		});






	});


</script>