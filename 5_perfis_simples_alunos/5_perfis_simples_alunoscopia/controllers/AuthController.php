<!-- 2ª Digitação (Aqui)
Este arquivo será o responsável por: (Controlar a autenticação) -->

<?php 

Class AuthControler {

    // exibe a pagina de login

    public function login($erro = '') {
        require_once 'views/login.php';
        renderizarLogin($erro);

    }

    // precessa a tentativa de login
    public function autenticar() {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($usuario) || empty($senha)) {
        $this->login('preencha todos os campos');
        return;
        } 

        $dadosUsuario = Auth::autenticar($usuario, $senha);
        if ($dadosUsuario) {
            Auth::iniciarSessao($dadosUsuario);
            header('Location: index.php?pagina=lista');
            exit;
        } else {
            $this->login('Usuario ou senha incorretos');
        }
    }

    // precessa o logout
    public function logout() {
        Auth::encerrarSessao();
        header('Location: index.php?pagina=login');
        exit;
    }

}