<!-- 5ª Digitação (Aqui)
Este arquivo será o responsável por: (Página de listagem dos itens) -->
<?php


function renderizarLista($itens) {
    exibirHeader('lista de itens');
    echo "<h1>LIsta de itens</h1>";

    if (Auth::temPermissao('adicionar')) {
        echo "<p> <a href='index.php?pagina=adicionar'>adicionar Novo</a></p>";
    }

    if (empty($itens)) {
        echo "<p> Nenhum item encontrado</p>";
    } else {
        echo "<table border='1'>
                <tr>
                    <th>ID</th> 
                    <th>Titulo</th>
                    <th>Ações/th>
                </tr>";

        foreach ($itens as $item) { 
            echo  "<tr>
                    <td>item['id']</td> 
                    <td>" . htmlspecialchars($item['titulo']) . "</td>
                    <td>";
                
            echo "<a href='index.php?pagina=visualizar&id={$item['id']}'>ver</a>";

            if (Auth::temPermissao('editar')) {
                echo "| <a href=index.php?pagina=editar&id={$item['id']}'>editar</a>";
            }

              if (Auth::temPermissao('excluir')) {
                echo "| <a href=index.php?pagina=excluir&id={$item['id']}'>excluir</a>";
            }

            echo "</td>
            </tr>";
                   
        }

        echo "</table>";
    }

    exibirFooter();
}


