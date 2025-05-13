<?php
// ==========================================
// PARTE 2: PROGRAMAÇÃO ORIENTADA A OBJETOS
// ==========================================


// 1ª Digitação (Aqui)
// $nome_cachorro_1 = "Nelson";
// $comida_cachorro_1 = 3;
// $sono_cachorro_1 = false;

// // Dados do segundo cachorro
// $nome_cachorro_2 = "Jeremias";
// $comida_cachorro_2 = 1;
// $sono_cachorro_2 = true;

// // Função para manipular os dados
// function comer($quantidade_comida) {
//     return $quantidade_comida - 1;
// }

// function dormir() {
//     return true;
// }


// Definindo a classe Cachorro
class cachorro {
    private $nome;
    private $comida;
    private $sono;

    public function __construct($nome, $comida, $sono) {
        $this->nome = $nome;
        $this->comida = $comida;
        $this->sono = $sono;
    }



    public function comer() {
        $this->comida -= 1;
    }

    public function dormir() {
    }

    public function getNome() {
        Return $this->nome;
    }

    public function getComida() {
        Return $this->comida;
    }

    public function getsono() {
        Return $this->sono;
    }

}
    



//  criando objetos na POO
$cachorro_1 = new cachorro ("nelson" , 3, false);
$cachorro_2 = new cachorro ("jeremias", 1, true);

// usar metodos
$cachorro_1->comer();
$cachorro_2->dormir();


// Exibindo os resultados no navegador
echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Resultados dos Cachorros (POO)</title>
</head>
<body>
    <h1>Resultados dos Cachorros (POO)</h1>
    <p><strong>{$cachorro_1->getNome()}</strong> agora tem <strong>{$cachorro_1->getComida()}</strong> unidades de comida.</p>
    <p><strong>{$cachorro_2->getNome()}</strong> está com sono? <strong>" . ($cachorro_2->getSono() ? 'Sim' : 'Não') . "</strong></p>

</body>
</html>";
?>