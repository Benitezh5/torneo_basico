<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class participanteM extends CI_Model> {

	public function get_participante(){
		$pa_consultarparticipante = "CALL pa_consultarparticipante()";
		$query=$this->db->query($pa_consultarparticipante);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function eliminar($id){
		$pa_eliminarparticipante="CALL pa_eliminarparticipante(?)";
		$arreglo=array("id_participante" => $id);
		$query=$this->db->query($pa_eliminarparticipante, $arreglo);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function get_sexo(){
		$exe=$this->db->get("sexo");
		return $exe->result();
	}

	public function get_procedencia(){
		$exe=$this->db->get("procedencia");
		return $exe->result();
	}


	public function get_categoria(){
		$exe=$this->db->get("categoria");
		return $exe->result();
	}

	public function set_participante($datos){
		$pa_insertarparticipante= "CALL pa_insertarparticipante(?,?,?,?,?)";
		$arreglo=array("nombre_participante" => $datos["nombre_participante"],
			"fuerza" => $datos["fuerza"],
			"id_sexo" => $datos["sexo"],
			"id_procedencia" => $datos["procedencia"],
		"id_categoria" => $datos["categoria"]);
		$query=$this->db->query($pa_insertarparticipante, $arreglo);
		if($query!==null){
			return "add";
		}else{
			return false;
		}
	}

	public function get_datos($id){
		$pa_consultarparticipanteporid="CALL pa_consultarparticipanteporid(?)";
		$arreglo = array("id_participante" =>$id);
		$query= $this->db->query($pa_consultarparticipanteporid, $arreglo);
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}


		public function actualizar($datos){
		$pa_actualizarparticipante= "CALL pa_actualizarparticipante(?,?,?,?,?,?)";
		$arreglo=array("id_participante" => $datos["id_participante"],
			"nombre_participante" => $datos["nombre_participante"],
			"fuerza" => $datos["fuerza"],
			"id_sexo" => $datos["sexo"],
			"id_procedencia" => $datos["procedencia"],
		"id_categoria" => $datos["categoria"]);
		$query=$this->db->query($pa_actualizarparticipante, $arreglo);
		if($query){
			return "edi";
		}else{
			return false;
		}
	}



	
}
