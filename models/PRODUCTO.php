<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_producto_x_id($prod_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_producto($prod_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                SET
                    est=0,
                    fech_elim=now()
                WHERE
                    prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }   
        public function insert_producto($prod_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_producto (prod_id, prod_nom, fecha_creacion, fecha_modificacion, fecha_eliminacion, 
            estado) VALUES (NULL, ?, now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_producto($prod_id, $prod_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
            set 
            prod_nom=?
            fecha_modificacion=now()
            where prod_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $prod_nom);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }

?>