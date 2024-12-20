<?php
require_once("../model/Pessoa.php");

class ControllerCadastrar{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Pessoa();
        $this->incluir();
    }

    private function incluir(){
        $nome = $_POST['nome'];
        $idade = $_POST['idade']; 
        $cpf = $_POST['cpf'];
        $ativo = isset($_POST['ativo']) ? 1 : 0;

        if (!$this->validaCPF($cpf)) {
            echo "<script>alert('CPF inválido!');history.back()</script>";
            return; 
        }

        if (!$this->validaIdade($idade)) {
            echo "<script>alert('A idade deve ser maior que 14 anos!');history.back()</script>";
            return; 
        }

        $this->cadastro->setNome($nome);
        $this->cadastro->setIdade($idade);
        $this->cadastro->setCpf($cpf);
        $this->cadastro->setAtivo($ativo);
        $result = $this->cadastro->incluir();
        if ($result >= 1) {
            echo "<script>alert('Pessoa cadastrada com sucesso!');document.location='../view/Cadastrar.php'</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar pessoa!');history.back()</script>";
        }
    }

    function validaCPF($cpf) {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    function validaIdade($dataNascimento) {
        $dataNascimento = new DateTime($dataNascimento);
        $dataAtual = new DateTime();
        $idade = $dataAtual->diff($dataNascimento)->y;

        return $idade >= 14;
    }
}

new ControllerCadastrar();
