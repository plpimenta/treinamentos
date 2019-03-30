<?php

 class Database{
    
     private $sDriver="mysql";
     private $sHost="localhost";
     private $sDb="treinamentos";
     private $sUsuario="admin";
     private $sSenha="policy=99";
     private $sStatus=false;
     private $bStatus=false;
     private $queryResult=false;
     private $conn=false;
     
     
     public function __construct(){
         
     }

     public function startDatabase():bool{
         
         if($this->sDriver == "MYSQL"){
             
             header('Content-Type: text/html; charset=utf-8');
             try{
                    $conn=new PDO("$this->sDriver:host=$this->sHost;dbname=$this->sDb","$this->sUsuario","$this->sSenha",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->sStatus=true;
                     $this->bStatus=true;
                } catch (PDOException $e) {
                     $this->sStatus=$e->getMessage();
                     $this->bStatus=false;
                }
             
         }
         
         return $this->bStatus;
     }
     
     public function status(){
         return $this->sStatus;
     }
     
     public function  consulta($sql){
         $this->queryResult=$this->conn->prepare($sql);
         $this->queryResult->execute();
         return $this->queryResult;
     }


}





?>
