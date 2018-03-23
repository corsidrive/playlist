<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelSQL
 *
 * @author tss
 */
class ModelSQL {
   /**
    * @var PDO
    */
    protected $pdo;
    private $schema;

    private $create_query;
    private $update_query;

    private $last_query;
    /**
     * crea la connessione al PDO
     */
    public function __construct($class_name) {

        try {
            $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            // imposta le eccezioni come metodo per gestire gli errori
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $this->generateQuery($class_name);
            
        } catch (PDOException $exc) {
            echo "abbiamo un problema: ". $exc->getMessage();
            echo $exc->getCOde();
        }
    }



    /** GENERA TUTTE LE QUERY CON I PLACE HOLDER       */
    private function generateQuery($class_name){
        //db table legge le caratteristiche della classe e utilizza tutte le sue proprieta
        // per generare le query
        $this->schema = new DBTable($class_name);
        $this->update_query = $this->schema->getUpdate();
        $this->create_query = $this->schema->getCreate();
       
        
    }



    public function create($instance){
        $stmt = $this->pdo->prepare($this->create_query);
        $this->setLastQuery($this->create_query);

        foreach ($this->schema->attributes as $attribute) {

            $getMethod = "get".ucfirst($attribute);
            $value = $instance->$getMethod();
            $stmt->bindValue(":$attribute",$value);

        }
        $stmt->execute();
       return $this->pdo->lastInsertId();
    }


    public function update($instance){
        $stmt = $this->pdo->prepare($this->update_query);
        $this->setLastQuery($this->update_query);
      
       
        foreach ($this->schema->attributes as $attribute) {

            $getMethod = "get".ucfirst($attribute);
           
          
            $value = $instance->$getMethod();
            $param = ":$attribute";

            if(!$stmt->bindValue($param,$value)){
                throw new Exception('problema nel bind param di '.$attribute);
           };
            

        }

        
        $stmt->execute();
    }

    public function read($opt=NULL){

        $this->schema->setRead($opt);

        $this->read_query = $this->schema->getRead();
        $this->setLastQuery($this->read_query);

        $stmt = $this->pdo->prepare($this->read_query);

        if(is_int($opt)){
            $stmt->bindParam(":id",$opt);
        }

        $stmt->execute();

        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultset;

    }

    public function setLastQuery($query){
        $this->last_query = $query;
    }

    public function getLastQuery(){
        return $this->last_query;
    }

}












class DBTable 
{
  //nome della tabella a db
  public $name;
  //lista dei suoi attributi
  public $attributes;  

  private $create;
  private $update;
  private $delete;
  private $read;
 

 public function  __construct($type){
        $this->generate($type);
        $this->setUpdate();
        $this->setCreate();
        
  }

  private function generate($type)
  {
        $reflect = new ReflectionClass($type);
        $props   = $reflect->getProperties();

        $this->attributes = array();
        $this->table = strtolower($reflect->getName());
        
        foreach ($props as $prop) {
            $field[] = $prop->getName();
        }
        $this->attributes = $field;
  }

  public function setUpdate(){
        $query = "UPDATE $this->table SET ";

        foreach ($this->attributes as $attribute) {

                    $query .= "$attribute=:$attribute,";
        } 

        $query = rtrim($query,',');
        $query .= " WHERE $this->table.id=:id;";
        
        $this->update = $query;
   }



    public function setCreate(){
        
        /**
         * genera la query di create
        */

        $fields = implode(',',$this->attributes);
        $values = implode(',:',$this->attributes);

        $query = "INSERT INTO $this->table ($fields) VALUES (:$values)";


        $this->create = $query;
    }

  
    
    public function setRead($opt){
        //selec * from &table 
        
       
        $this->read = "SELECT * FROM $this->table ";
        //id passato
        
        if(is_int($opt)){
            $this->read .= " WHERE $this->table.id=:id ";
        }


    }




    public function getCreate(){
        return $this->create;
    }

    
    public function getUpdate(){
        return $this->update;
    }

    
    public function getRead(){
        return $this->read;
    }

  
    

}

