<?php 
class Conectar{
    protected $dbhost;
    
    protected function Conexion(){

    try {
        $conectar= $this->$dbhost=new pdo("mysql:local=localhost; dbname=crud1", "root", "Cesarvelazquezortiz1");
        return $conectar;
    } catch (Exception $e) {
        print "Error en la Base de Datos a la hora de contectarse!" .$e->getMessage() . "<br/>";
        die();
    }
  }
  public function set_names(){
      return $this->$dbhost->query("SET NAMES 'utf8'");
  }
}
?>