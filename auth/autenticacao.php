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

        if ($usuario && password_verify($senha, $usuario['senha'])) { // Verifica duas coisas: 1º se o e-mail foi encontrado (se $usuario é verdadeiro) e 2º se a senha digitada bate com o hash criptografado salvo no banco.
            
            $_SESSION['nome'] = $usuario['nome']; // Salva o nome do usuário recuperado do banco na sessão do navegador.
            $_SESSION['email'] = $usuario['email']; // Salva o email do usuário na sessão.
            $_SESSION['foto'] = $usuario['foto']; // Salva o caminho da foto de perfil do usuário na sessão.

            header("Location:/BookVerse/views/usuario/perfil.php"); // Envia um cabeçalho HTTP instruindo o navegador a redirecionar o usuário logado para a página de perfil.
            exit(); // Interrompe imediatamente a execução do script para garantir que nada mais seja processado após o redirecionamento de sucesso.
        }

        header("Location: /BookVerse/views/usuario/login.php)"); // Caso o if acima seja falso (email não existe ou senha errada), força o redirecionamento de volta para a página de login. (Obs: existe um parêntese extra ')' dentro das aspas nesta linha do seu código original).
        exit(); // Interrompe a execução do script após o redirecionamento de falha.
    }
}
