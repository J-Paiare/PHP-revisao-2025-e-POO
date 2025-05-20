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

    // exibe formulario para adicionar

    public function adicionar() {
        if (!Auth::temPermissao('adicionar')) {
            $_SESSION['mensagem'] = "voce nao tem permissao para adiconar itens";
            header('Location: index.php?pagina=lista');
            exit;
        }

        require_once 'views/formulario.php';
        renderizarFormulario();
    }

    // salva um novo item

    public function salvar(){
        if (!Auth::temPermissao('adicionar')) {
            $_SESSION['mensagem'] = "voce nao tem permissao para adiconar itens";
            header('Location: index.php?pagina=lista');
            exit;
        }

        $titulo = $_POST['titulo'] ?? '';
        $conteudo = $_POST['conteudo'] ?? '';

        if (empty($titulo) || empty($conteudo)) {
            $_SESSION['mensagem'] = "todos os campos sao obrigatorios";
            header('Location: index.php?pagina=lista');
            exit;
        }
        require_once 'models/item.php';

        if (item::adicionar($titulo, $conteudo)) {
            $_SESSION['mensagem'] = "item adicionado com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro aoa dicionar item";
        }
                    
        header('Location: index.php?pagina=lista');
            exit;
    }

    


}