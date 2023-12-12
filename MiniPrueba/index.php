<?php
require_once './controllers/ClientesController.php';

$clienteController = new ClienteController();
$clienteController->mostrarTodosClientes();
