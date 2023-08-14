<?php
    class Model{
        function __construct(){
            $this->db = new Database;
            $this->c = $this->db->conn;

        }
        function setQuery($sql){
            return $this->c->query($sql);
        }
        public function getQueryAll($sql){
            $result = $this->db->conn->query($sql);
            if($result->num_rows>0){
                $a=$result->fetch_all(MYSQLI_ASSOC);
                return $a;
            }
            return null;
        }
        public function getQueryOne($sql){
            $result = $this->db->conn->query($sql);
            if($result->num_rows==1){
                $a=$result->fetch_assoc();
                return $a;
            }
            return null;
        }
        function getData($table, $limit, $page){
            $sql = "SELECT * FROM $table WHERE trash = 0 LIMIT ". ($page - 1)*$limit . "," .$limit;
            $result = $this->getQueryAll($sql);
            return $result;
        }
        function getDataTrash($table, $limit, $page){
            $sql = "SELECT * FROM $table WHERE trash = 1 LIMIT ". ($page - 1)*$limit . "," .$limit;
            $result = $this->getQueryAll($sql);
            return $result;
        }
        function getData1($table){
            $sql = "SELECT * FROM $table WHERE status = 1";
            $result = $this->getQueryAll($sql);
            return $result;
        }
        function getData2($table, $limit, $page){
            $sql = "SELECT * FROM $table WHERE role = 'nv' and trash = 0 LIMIT ". ($page - 1)*$limit . "," .$limit;
            $result = $this->getQueryAll($sql);
            return $result;
        }

        function addRecord($table, $params = array()){
            $txtKey = "";
            $txtValue = "";
            $i = 0;
            // session_start();
            // if($params['password']==$params['passwordrepeat']){
                foreach($params as $key => $value){
                    if($i<count($params) - 1){
                        $txtKey .=$key . " , ";
                        $txtValue .= "'". $value ."', ";
                    }
                    else{
                        $txtKey .=$key;
                        $txtValue .= "'". $value ."'";
                    }
                    $i++;
    
                 }
                $sql = "INSERT INTO ". $table . "(" . $txtKey . ") VALUES(". $txtValue . ")";
                echo $sql;
                $this->c->query($sql);
                // $retu = $this->getQueryOne($sql);
                // $_SESSION['pass']='true';
                // echo $sql;
                // header("location:../frontend/index");
            // }else{
            //     $_SESSION['pass']='false';
                // header("location:../frontend/register");
            // }
            // return $retu;
        }
        function editRecord($table, $id, $params = array()){
            $txtSet = "";
            $i = 0;
            // session_start();
            // if($params['password']==$params['passwordrepeat']){
                foreach($params as $key => $value){
                    if($i<count($params) - 1){
                        $txtSet .= "$key = '$value',  ";
                    }
                    else{
                        $txtSet .= "$key = '$value'  ";

                    }
                    $i++;
    
                 }
                $sql = "UPDATE ". $table . " SET ".$txtSet."WHERE id = $id";
                echo $sql;
                $this->c->query($sql);
                // $_SESSION['pass']='true';
                
                // header("location:../frontend/index");
            // }else{
            //     $_SESSION['pass']='false';
                // header("location:../frontend/register");
            // }
        }
        function DelTempRecord($table, $id){
            $sql = "UPDATE $table SET trash = 1 WHERE id = $id";
            $this->setQuery($sql);
        }
        function del_restore($table, $id, $trash){
            $sql = "UPDATE $table SET trash = $trash WHERE id = $id";
            $this->setQuery($sql);
        }

        function del($table, $id){
            $sql = "DELETE FROM $table WHERE id = $id";
            $this->setQuery($sql);
        }

        function getRecordByTrash($table,$trash = 0){
            $sql = "SELECT * FROM $table WHERE trash = $trash";
            $result = $this->getQueryAll($sql);
            return $result;
        }
        function getRecordByRole($table,$trash = 0){
            $sql = "SELECT * FROM $table WHERE role = 'nv' and trash = $trash";
            $result = $this->getQueryAll($sql);
            return $result;
        }
        function getOneRecordByTrash($table,$id, $trash=0){
            $sql = "SELECT * FROM $table WHERE trash = $trash AND id = $id";
            $result = $this->getQueryOne($sql);
            return $result;
        }

        function status($table, $id, $status){
            $sql = "UPDATE $table SET status = $status WHERE id = $id";
            $this->setQuery($sql);
        }
        function getLastId($table)
        {
            $sql = "SELECT id FROM $table where status = 1 ORDER BY order_date DESC LIMIT 0,1";
            $result = $this->getQueryOne($sql);
            return $result;
        }
    }
?>