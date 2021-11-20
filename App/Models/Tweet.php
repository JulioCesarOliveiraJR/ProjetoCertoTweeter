<?php
namespace App\Models;

use MF\Model\Model;

class Tweet extends Model{

    private $id;
    private $id_usuario;
    private $tweet;
    private $data;


    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
    }


    public function save(){
        $query = "INSERT INTO tweets(id_usuario, tweet) VALUES (:pid_usuario, :ptweet)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':pid_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':ptweet', $this->__get('tweet'));
        $stmt->execute();

        return $this;
    }


    public function getAll(){
        $query = "SELECT 
            t.id, t.id_usuario, u.nome, t.tweet, DATE_FORMAT(t.data, '%d/%m/%Y %H:%i') as data 
        FROM 
            tweets t inner join usuarios u on u.id = t.id_usuario
        WHERE t.id_usuario = :pid_usuario";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pid_usuario', $this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }


}


?>