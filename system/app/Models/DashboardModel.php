<?php
class DashboardModel extends Mysql {
    public function __construct(){
		parent::__construct();
	}
    public function getOperativo(){
        $sql = "SELECT * FROM table_flota WHERE status_unidad = 1";
        $request = $this->select_all($sql);
		return $request;
    }
    public function getDesincorporado(){
        $sql = "SELECT * FROM table_flota WHERE status_unidad = 0";
        $request = $this->select_all($sql);
		return $request;
    }
    public function getUnidades(){
        $sql = "SELECT * FROM table_flota;";
        $request = $this->select_all($sql);
		return $request;
    }
}