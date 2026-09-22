<?php // Tag de abertura que indica o início do script PHP.

class Autenticacao { // Declara a classe 'Autenticacao', criada para agrupar as regras e ações de login do sistema.
    
    public static function logar($email, $senha) { // Cria um método público e estático que recebe o '$email' e a '$senha' informados pelo usuário.
        
        session_start(); // Inicia uma nova sessão (ou retoma uma existente) para permitir o uso da superglobal $_SESSION, que manterá o usuário logado.

        $sql = "SELECT * FROM usuario WHERE email = :email"; // Escreve a consulta SQL que vai procurar na tabela 'usuario' a linha correspondente ao email fornecido.
        $conexao = Conexao::conectar(); // Usa a classe 'Conexao' (provavelmente o código que você mostrou antes) para abrir a conexão com o banco de dados.
        $stmt = $conexao->prepare($sql); // Prepara a consulta SQL, uma etapa fundamental para evitar ataques de injeção de SQL (SQL Injection).
        $stmt->bindValue(':email', $email); // Vincula o valor da variável '$email' de forma segura ao espaço reservado ':email' na consulta SQL.
        $stmt->execute(); // Dispara a consulta contra o banco de dados.
        $usuario = $stmt->fetch(); // Tenta resgatar a primeira (e única) linha retornada pela consulta e guarda na variável '$usuario'.

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['foto'] = $usuario['foto'];

            header("Location:/BookVerse/views/usuario/perfil.php"); // Envia um cabeçalho HTTP instruindo o navegador a redirecionar o usuário logado para a página de perfil.
            exit(); // Interrompe imediatamente a execução do script para garantir que nada mais seja processado após o redirecionamento de sucesso.
        }
        $_SESSION['aviso'] = 'Email ou senha inválidos';
        header("Location: ../BookVerse/views/usuario/login.php)");
        exit();
    }

    //verifica se o usuario está logado
    public static function estaAutenticado() {
        session_start();
        return isset($_SESSION['id_usuario']); //isset retorna true se o usuario estiver logado
    }

    public static function logout() {
        session_start();
        $_SESSION=[];
        session_destroy();

        header('Location: /BookVerse/views/usuario/login.php');
        exit();
    }

    //verifica se a pessoa tá logada e redireciona para a página de login
    public static function exigirAutenticacao(){
        if (!self::estaAutenticado()) {
            header('Location: /BookVerse/views/usuario/login.php');
            exit();
        }
    }
}

