<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class participanteM extends CI_Model {

	public function get_participante(){
		$this->db->select("p.id_participante, p.nombre_participante, p.fuerza, s.nombre_sexo, pr.nombre_procedencia, c.nombre_categoria");
		$this->db->from("participante p");
		$this->db->join("sexo s","s.id_sexo=p.id_sexo");
		$this->db->join("procedencia pr","pr.id_procedencia=p.id_procedencia");
		$this->db->join("categoria c","c.id_categoria=p.id_categoria");
		$exe=$this->db->get();
		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where("id_participante", $id);
		$this->db->delete("participante");
		if($this->db->cubrid_affected_rows()>0){
			return "eli";
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
		$this->db->set("nombre_participante", $datos["nombre_participante"]);
		$this->db->set("fuerza", $datos["fuerza"]);
		$this->db->set("id_sexo", $datos["sexo"]);
		$this->db->set("id_procedencia", $datos["procedencia"]);
		$this->db->set("id_categoria", $datos["categoria"]);
		$respuesta=$this->db->insert("participante");
		if($this->db->affected_rows()>0){
			return "add";
		}else{
			return false;
		}
	}

	public function get_datos($id){
		$this->db->where("id_participante", $id);
		$exe=$this->db->get("participante");
		return $exe->result();
	}



	public function actualizar($datos){
		$this->db->set("nombre_participante", $datos["nombre_participante"]);
		$this->db->set("fuerza", $datos["fuerza"]);
		$this->db->set("id_sexo", $datos["sexo"]);
		$this->db->set("id_procedencia", $datos["procedencia"]);
		$this->db->set("id_categoria", $datos["categoria"]);
		$this->db->where("id_participante", $datos["id_participante"]);
		$this->db->update("participante");
		if($this->db->affected_rows()>0){
			return "edi";
		}else{
			return false;
		}
	}




	
}
