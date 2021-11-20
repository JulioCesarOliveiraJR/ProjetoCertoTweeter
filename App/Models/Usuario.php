<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
    }

    //salvar
    public function save(){
        $query = "INSERT INTO usuarios(nome, email, senha) VALUES(:pnome, :pemail, :psenha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pnome', $this->__get('nome'));
        $stmt->bindValue(':pemail', $this->__get('email'));
        $stmt->bindValue(':psenha', $this->__get('senha'));

        $stmt->execute();
        return $this;
    }


    public function validarCadastro(){
        $valido = true;

        if(mb_strlen($this->__get('nome')) < 3){
            $valido = false;
        }

        if(mb_strlen($this->__get('email')) < 3){
            $valido = false;
        }

        if(mb_strlen($this->__get('senha')) < 3){
            $valido = false;
        }

        return $valido;
    }



    public function getUsuarioPorEmail(){
        $query = "SELECT nome, email FROM usuarios WHERE email = :pemail";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pemail', $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function autenticar(){
        $query = "select id, nome, email from usuarios where email = :email and senha = :senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':senha', $this->__get('senha'));
		$stmt->execute();


		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!empty($usuario)) {
            if($usuario['id'] != '' && $usuario['nome'] != '') {
                $this->__set('id', $usuario['id']);
                $this->__set('nome', $usuario['nome']);
            }
        }

		return $this;
    }





}


?>