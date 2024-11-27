<?php

class noticia
{

    private $conn;
    private $table_name = "tbnoticias";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registrar($titulo, $autor, $data, $noticia, $foto)
    {

        $query = "INSERT INTO " . $this->table_name . " (titulo,autor,data,noticia,foto) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$titulo, $autor, $data, $noticia, $foto]);

        return $stmt;
    }

    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function lerPorId($id)
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $titulo, $autor, $data, $noticia, $foto)
    {
        $query = "UPDATE " . $this->table_name . " SET titulo = ?, autor = ?, data = ?, noticia = ?,foto = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$titulo, $autor, $data, $noticia, $foto, $id]);

        return $stmt;
    }

    public function deletar($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt;
    }
}
