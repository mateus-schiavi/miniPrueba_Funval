<?php
require_once './Models/Clientes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MiniPrueba/Config/config.php';

class ClienteController
{
    private $conn;
    private $clientesModel;

    public function __construct()
    {
        $this->conn = new mysqli(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die('Error de conexión: ' . $this->conn->connect_error);
        }

        $this->clientesModel = new Clientes($this->conn);
    }

    public function obterTodosClientes()
    {
        return $this->clientesModel->all();
    }

    public function mostrarTodosClientes()
    {
        $clientes = $this->obterTodosClientes();

        if (!empty($clientes)) {
            echo "<pre>";
            print_r($clientes);
            echo "</pre>";
        } else {
            echo "No hay clientes disponibles.";
        }
    }
}

?>