<?php
class Clientes {
    private $id;
    private $nombre;
    private $email;
    private $phone;
    private $address;
    private $conn;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNome() {
        return $this->nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress() {
        return $this->address;
    }
    public function __construct() {
        $this->conn = new mysqli(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die('Error de conexión: ' . $this->conn->connect_error);
        }
    }
    
    public function all() {
        $query = "SELECT * FROM clientes";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $clientes = [];
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
            return $clientes;
        } else {
            return [];
        }
    }
}



?>