<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class participanteC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("participanteM");
	}

	public function index(){
		$datos["participante"]=$this->participanteM->get_participante();
		$datos["sexo"]=$this->participanteM->get_sexo();
		$datos["procedencia"]=$this->participanteM->get_procedencia();
		$datos["categoria"]=$this->participanteM->get_categoria();

		$this->load->view("participanteV", $datos);

		$datos=array("title" =>"CODEIGNITER || BASICO");
		$this->load->view("template/header", $datos);

		$this->load->view("template/footer");

	}

	public function get_participante(){
		$respuesta=$this->participanteM->get_participante();
		echo json_encode($respuesta);
	}

	public function eliminar($id){
		$respuesta=$this->participanteM->eliminar($id);
		if($respuesta=="eli"){
			"<script>alert('Eliminado Exitosamente!');</script>";
		}else{
			echo "<script>alert('Error al Eliminar!');</script>";
		}
		redirect("participanteC/index", "refresh");
	}

	public function get_sexo(){
		$respuesta=$this->participanteM->get_sexo();
		echo json_encode($respuesta);
	}

	public function get_procedencia(){
		$respuesta=$this->participanteM->get_procedencia();
		echo json_encode($respuesta);
	}


	public function get_categoria(){
		$respuesta=$this->participanteM->get_categoria();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos["nombre_participante"]=$this->input->post("nombre_participante");
		$datos["fuerza"]=$this->input->post("fuerza");
		$datos["sexo"]=$this->input->post("sexo");
		$datos["procedencia"]=$this->input->post("procedencia");
		$datos["categoria"]=$this->input->post("categoria");
		$respuesta = $this->participanteM->set_participante($datos);
		if($respuesta=="add"){
			echo	"<script>alert('Ingresado Exitosamente!');</script>";
		}else{
			echo	"<script>alert('Error al ingresar!');</script>";
		}
		redirect("participanteC/index", "refresh");
	}


	public function get_datos($id){
		$datos["participante"]=$this->participanteM->get_datos($id);
		$datos["sexo"]=$this->participanteM->get_sexo();
		$datos["procedencia"]=$this->participanteM->get_procedencia();
		$datos["categoria"]=$this->participanteM->get_categoria();

		$this->load->view("participanteVact", $datos);

		$datos=array("title" =>"CODEIGNITER || BASICO");
		$this->load->view("template/header", $datos);

		$this->load->view("template/footer");
	}


	public function actualizar(){
		$datos["id_participante"]=$this->input->post("id_participante");
		$datos["nombre_participante"]=$this->input->post("nombre_participante");
		$datos["fuerza"]=$this->input->post("fuerza");
		$datos["sexo"]=$this->input->post("sexo");
		$datos["procedencia"]=$this->input->post("procedencia");
		$datos["categoria"]=$this->input->post("categoria");
		$respuesta = $this->participanteM->actualizar($datos);
		if($respuesta=="edi"){
			echo "<script>alert('Actualizado Exitosamente!');</script>";
		}else{
			echo "<script>alert('Error al ingresar!');</script>";
		}
		redirect("participanteC/index", "refresh");
	}



}
