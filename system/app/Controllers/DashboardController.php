<?php

class Dashboard extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
	}
	public function dashboard(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Dashboard - Home";
		$data['page_userImg'] = "usuario/default.png";
		$data['page_tag'] = "Dashboard";
		$data['page_userNomb'] = "William Enrique";
		$data['page_userRol'] = "Administrador";
		$data['page_name'] = "dashboard";

		$data['page_link'] = "dashboard";
		$data['page_menu_open'] = "dashboard-menu";
		$data['page_link_acitvo'] = "link-dashboard";
		$data['page_functions'] = "function.dashboard.js";
		$this->views->getViews($this, "dashboard", $data);
	}

	public function getUnidades(){
		$arrData = $this->model->getUnidades();
		$htmlOptions = '';
		$unidades = count($arrData);
		$htmlOptions .= '<div class="inner">
							<h3>'.$unidades.'</h3>
							<p>Toda la flota</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="'.base_url().'flota" class="small-box-footer">Más informacion <i class="fas fa-arrow-circle-right"></i></a>';
		echo $htmlOptions;
		die();
	}
	public function getOperativo(){
		$arrData = $this->model->getOperativo();
		$htmlOptions = '';
		$operativo = count($arrData);
		$htmlOptions .= '<div class="inner">
							<h3>'.$operativo.'</h3>
							<p>Unidades Operativas</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="'.base_url().'flota" class="small-box-footer">Más informacion <i class="fas fa-arrow-circle-right"></i></a>';
		echo $htmlOptions;
		die();
	}
	public function getDesincorporado(){
		$arrData = $this->model->getDesincorporado();
		$htmlOptions = '';
		$desincorporadas = count($arrData);
		$htmlOptions .= '<div class="inner">
							<h3>'.$desincorporadas.'</h3>
							<p>Unidades Desincorporadas</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="'.base_url().'flota" class="small-box-footer">Más informacion <i class="fas fa-arrow-circle-right"></i></a>';
		echo $htmlOptions;
		die();
	}
}