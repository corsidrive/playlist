<?php
class Autore {

    private $id;
    private $nome;
    private $cognome;
    private $email;
    private $data_nascita;
    private $avatar;
    private $is_label;
    private $verifica;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCognome() {
        return $this->cognome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getData_nascita() {
        return $this->data_nascita;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getIs_label() {
        return $this->is_label;
    }

    public function getVerifica() {
        return $this->verifica;
    }

    public function setId($id) {
        if (Validate::id($id)) {
            throw new Exception('id_autore deve essere un intero');
        } else {
            $this->id = $id;
        }
    }

    public function setNome($nome) {
        
        $nome = Validate::nameString($nome);
        
        if ($nome) {
            $this->nome = $nome;
        } else {
            throw new Exception('$nome non e valido');
        };
    }

    public function setCognome($cognome) {
        
        $cognome = Validate::nameString();
        if ($cognome) {
            $this->cognome = $cognome;
        } else {
            throw new Exception('$cognome non e valido');
        };
    }

    public function setEmail($email) {
        if(Validate::email($email)){
            $this->email = $email;
        }else{
            throw new Exception('$email non e valida');
        }
    }

    public function setData_nascita($data_nascita) {

        Validate::date($data_nascita);
    }

   

    public function setAvatar($avatar) {

        if (Validate::url($avatar)) {
            $this->avatar = $avatar;
        } else {
            throw new Exception('avatar non e valido '.$avatar);
        }
    }

    
    
    public function setIs_label($is_label) {
        $this->is_label = $is_label;
    }

    public function setVerifica($verifica) {
        $this->verifica = $verifica;
    }

}
