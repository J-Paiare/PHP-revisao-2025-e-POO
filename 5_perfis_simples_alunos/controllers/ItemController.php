<?php

// Controller (Para itens)
class ItemController {
    public function listar() {
        require_once 'models/Item.php';
        $itens = Item::buscarTodos();

        require_once 'views/lista.php';
        renderizarLista($itens);
    }

    // Exibir detalhes de um item (Visualizar)
    public function visualizar($id) {
        if (!Auth::temPermissao('visualizar')) {
            // Se não tiver permissão redireciona para a pg. lista
            $_SESSION['mensagem'] = "Você não tem permissão para visualizar itens!";
            header('Location: index.php?pagina=lista');
            exit;
        }

        // Busca item pelo ID
        require_once 'models/Item.php';
        $item = Item::buscarPorId($id);

        if (!$item) {
            // Se não tiver cadastro volta para pg. lista
            $_SESSION['mensagem'] = "Item não encontrado!";
            header('Location: index.php?pagina=lista');
            exit;
        }

        // Função que exibe os itens
        require_once 'views/visualizar.php';
        renderizarVisualizar($item);
    }
}