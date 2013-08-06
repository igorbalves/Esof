<?php

namespace Login\Model;

class Usuario extends \JVBase\Model\AbstractModel
{
  protected $id;
  protected $uid;
  protected $email;
  protected $nome;
  
  function __construct($id, $uid, $email, $nome) {
      $this->id = $id;
      $this->uid = $uid;
      $this->email = $email;
      $this->nome = $nome;
  }

  
  public function getId() {
      return $this->id;
  }

  public function setId($id) {
      $this->id = $id;
  }

  public function getUid() {
      return $this->uid;
  }

  public function setUid($uid) {
      $this->uid = $uid;
  }

  public function getEmail() {
      return $this->email;
  }

  public function setEmail($email) {
      $this->email = $email;
  }

  public function getNome() {
      return $this->nome;
  }

  public function setNome($nome) {
      $this->nome = $nome;
  }

 
}
?>
