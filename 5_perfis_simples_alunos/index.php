<?php

// Arquivo principal sistema

session_start();

// Carrega arquivos necessários
require_once 'config/database.php';
require_once 'services/Auth.php';
require_once 'views/templates/header.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ItemController.php';

// Criar objeto (Instanciar) Controle de autenticação
$authController = new AuthController();
$itemController = new ItemController();

// Ação padrão
$pagina = $_GET['pagina'] ?? '';

// Verifica autenticação. Caso não logado redireciona
// para a página de login
if (!Auth::estaLogado() && !in_array($pagina, ['login', 'autenticar'])) { 
    $pagina= 'login';
}

// Roteamento básico (Teste de autenticação)
switch ($pagina) {
    case 'login':
        $authController->login();
        break;
    case 'autenticar':
        $authController->autenticar();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'lista':
        $itemController->listar();
        break;
    case 'visualizar':
        $itemController->visualizar($_GET['id'] ?? 0);
        break;
    default:
        header('Location: index.php?pagina=' .(Auth::estaLogado() ? 'lista' : 'login'));
        exit;
}
