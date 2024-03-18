<?php
class DashboardModel extends Mysql {
    public function __construct(){
		parent::__construct();
	}
    public function getUnidades(){
        $sql = "SELECT * FROM table_flota;";
        $request = $this->select_all($sql);
        return $request;
    }
    public function getCountUnidadStatus(){
        $sql = "SELECT status_unidad, COUNT(*) AS status FROM table_flota GROUP BY status_unidad";
        $request = $this->select_all($sql);
        return $request;
    }
    public function getDesincorporado(){
        $sql = "SELECT * FROM table_flota WHERE status_unidad = 0";
        $request = $this->select_all($sql);
        return $request;
    }
    public function getOperativo(){
        $sql = "SELECT * FROM table_flota WHERE status_unidad = 1";
        $request = $this->select_all($sql);
		return $request;
    }
    public function getInoperativo(){
        $sql = "SELECT * FROM table_flota WHERE status_unidad = 3";
        $request = $this->select_all($sql);
		return $request;
    }
    public function getMantenimiento(){
        $sql = "SELECT * FROM table_flota WHERE status_unidad = 2";
        $request = $this->select_all($sql);
		return $request;
    }
}