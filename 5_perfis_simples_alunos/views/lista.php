<?php

// View para Listar todos os itens
function renderizarLista($itens) {
    exibirHeader('Lista de itens');

    echo"<h1>Lista de Itens</h1>";

    // Verifica se o usuário tem permissão para adicionar
    // Itens (Somente Admin)
    if (Auth::temPermissao('adicionar')) {

        // Exibe o link se o usuário tiver permissão
        // Link (Para adicionar)
        echo"<p><a href='index.php?pagina=adicionar'Adicionar Novo</a></p>";
    }

    // Menssagem (Se vazio)
    if (empty($itens)) {
        echo "<p>Nenhum item encontado</p>";
    } else {
        // Título da tabela
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ações</th>
            </tr>";

        // Exibir Itens da Tabela
        foreach ($itens as $item) {
            echo "<tr>        
                    <td>{$item['id']}</td>
                    <td>".htmlspecialchars($item['titulo'])."</td>
                 <td>";
            
            // Links dinâmicos (Aparecem para cada item cadastrado)
    
            // Link (Para visualizar)
            echo"<a href='index.php?pagina=visualizar&id={$item['id']}'>Ver</a>";

            if (Auth::temPermissao('editar')) {
                // Link (Para editar)
                echo" | <a href='index.php?pagina=editar&id={$item['id']}'>Editar</a>";
            } 

            if (Auth::temPermissao('excluir')) {
                // Link (Para excluir)
                echo" | <a href='index.php?pagina=excluir&id={$item['id']}'>Excluir</a>";
            }

            echo "</td></tr>";
        }
        echo "</table>";

    }

    exibirFooter();
}