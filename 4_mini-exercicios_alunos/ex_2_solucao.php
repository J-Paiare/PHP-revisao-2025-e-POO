<?php

// Classe abstrata
abstract class Veiculo {
    protected string $modelo;
    protected string $placa;
    protected bool $disponivel;

    public function __construct(string $modelo, string $placa) {
        $this->modelo = $modelo;
        $this->placa = $placa;
        $this->disponivel = true;
    }

    abstract public function calcularAluguel(int $dias): float;

    public function isDisponivel(): bool {
        return $this->disponivel;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function emprestar(): string {
        if ($this->disponivel) {
            $this->disponivel = false;
            return "Veículo '{$this->modelo}' emprestado com sucesso!";
        }
        return "Veículo '{$this->modelo}' não está disponível.";
    }

    public function devolver(): string {
        if (!$this->disponivel) {
            $this->disponivel = true;
            return "Veículo '{$this->modelo}' devolvido com sucesso!";
        }
        return "Veículo '{$this->modelo}' já foi devolvido.";
    }
}

// Classes concretas
class Carro extends Veiculo {
    public function calcularAluguel(int $dias): float {
        return $dias * 100;
    }
}

class Moto extends Veiculo {
    public function calcularAluguel(int $dias): float {
        return $dias * 50;
    }
}

// Classe gerenciadora
class Locadora {
    private array $veiculos = [];

    public function adicionarVeiculo(Veiculo $veiculo): string {
        $this->veiculos[$veiculo->getModelo()] = $veiculo;
        return "Veículo '{$veiculo->getModelo()}' adicionado ao acervo!";
    }

    public function emprestarVeiculo(string $modelo): string {
        return isset($this->veiculos[$modelo]) ? $this->veiculos[$modelo]->emprestar() : "Veículo não encontrado.";
    }

    public function devolverVeiculo(string $modelo): string {
        return isset($this->veiculos[$modelo]) ? $this->veiculos[$modelo]->devolver() : "Veículo não encontrado.";
    }

    public function alugarVeiculo(string $modelo): string {
        return $this->emprestarVeiculo($modelo); // reaproveita o método acima
    }
}

// Criando instância da locadora
$locadora = new Locadora();

// Criando veículos (corrigido: placa deve ser string e não precisa de parâmetro 'disponível')
$moto1 = new Moto("Yamaha XTZ", "0001");
$carro1 = new Carro("HB20", "0002");

// Adicionando veículos na locadora
echo $locadora->adicionarVeiculo($carro1) . "<br>";
echo $locadora->adicionarVeiculo($moto1) . "<br><br>";

// Alugando veículos
echo $locadora->alugarVeiculo("Yamaha XTZ") . "<br>";
echo $locadora->alugarVeiculo("HB20") . "<br><br>";

// Devolvendo veículo
echo $locadora->devolverVeiculo("HB20") . "<br><br>";

// Calculando aluguéis
echo "Aluguel da moto (3 dias): R$" . number_format($moto1->calcularAluguel(3), 2) . "<br>";
echo "Aluguel do carro (3 dias): R$" . number_format($carro1->calcularAluguel(3), 2) . "<br>";

?>
