<?php

class Projeto {
    private $id;
    private $nome;
    private $duracao;

    private $con;

public function _construct($id = null, $nome = null, $duracao = null) {
    $this -> id = $id;
    $this -> nome = $nome;
    $this -> duracao = $duracao;

    $this -> con = new PDO(SERVIDOR, USUARIO, SENHA);
}

public function all() {
    $sql = $this -> con -> prepare('SELECT * FROM ver_projeto');
    $sql -> execute();
    $row = $sql -> fetchAll(PDO::FETCH_CLASS);
    return $row;
}

public function create() {
    $sql = $this -> con -> prepare('SELECT * FROM ver_projeto WHERE id = ?');
    $sql -> execute([$this -> id]);
    $row = $sql -> fetchObject();
    return $row;
}

public function update(){
    $sql = $this -> con -> prepare('UPDATE projeto SET nome = ?, duracao = ? WHERE id = ?');
    $sql -> execute([$this -> nome, $this -> duracao, $this -> id]);
}

public function delete() {
    $sql = $this -> con -> prepare('DELETE FROM projeto WHERE id = ?');
    $sql -> execute([$this -> id]);
}

}
?>