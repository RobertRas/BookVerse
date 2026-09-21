<?php // Tag de abertura que indica o início de um script PHP.

class Conexao { // Declaração da classe chamada 'Conexao', que vai encapsular a lógica de banco de dados.
    
    // Cria um método público e estático. 
    // 'Estático' significa que você pode chamar essa função sem precisar criar um objeto da classe antes (ex: Conexao::conectar()).
    public static function conectar() { 
        
        // Lê o arquivo de configuração '.env' localizado na pasta pai (../) do diretório atual (__DIR__).
        // A função 'parse_ini_file' transforma as configurações desse arquivo em um array associativo.
        $env = parse_ini_file(__DIR__ . "/../.env"); 

        // Pega os valores do array $env (que vieram do arquivo .env) e os guarda em variáveis locais.
        $host = $env['DB_HOST'];         // Endereço do servidor do banco de dados (ex: localhost).
        $dbname = $env['DB_NAME'];       // Nome do banco de dados que será acessado.
        $username = $env['DB_USER'];     // Nome de usuário para acessar o banco.
        $password = $env['DB_PASS'];     // Senha para acessar o banco.

        // Cria uma nova instância da classe PDO (PHP Data Objects), que é a interface segura do PHP para acessar bancos de dados.
        // O primeiro parâmetro é o DSN (Data Source Name), onde definimos que o banco é mysql, passamos o host, o nome do banco e o charset (utf8mb4 para suportar emojis e acentos).
        // Os outros dois parâmetros são as credenciais de acesso.
        $conn = new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8mb4", $username, $password);
        
        // Configura o PDO para lançar "Exceções" (erros fatais) sempre que um erro de banco de dados ocorrer.
        // Isso facilita muito descobrir onde o erro aconteceu e tratá-lo com blocos try/catch.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Define o modo de busca padrão como FETCH_ASSOC.
        // Isso significa que quando você buscar dados do banco, eles virão em um array onde as chaves são os nomes das colunas da tabela.
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        // Retorna o objeto de conexão pronto para ser usado por outras partes do sistema.
        return $conn; 
    }
}

// Executa o método estático para testar ou iniciar a conexão imediatamente.
// (Nota: Em aplicações reais, essa linha costuma ficar de fora deste arquivo, sendo chamada apenas pelos Controllers/Models quando precisarem da conexão).
Conexao::conectar();
