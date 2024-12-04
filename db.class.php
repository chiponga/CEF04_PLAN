<?php
class db {
    // Parâmetros de conexão
    public $database = 'railway';
    public $host = '85788463.railway.internal';
    public $usuario = 'root';
    public $senha = 'zOSDfyNbJkAwWKtPQWkBaqXtvcIawmiJ';
    public $nome = 'CEF04_PLAN';
    public $porta = 3306;

    // Função para conectar ao banco de dados
    public function conecta_mysql() {
        // Criando a conexão
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database, $this->porta);
		
		if (!$con) {
    die('Erro ao tentar conectar com o banco de dados MySQL: ' . mysqli_connect_error());
}
		
        // Configurando o charset
        mysqli_set_charset($con, 'utf8');

        // Verificando se houve erro na conexão
        if (mysqli_connect_errno()) {
			echo "<script>console.log('Console: " . mysqli_connect_error() . "' );</script>";

        }

        return $con;
    }

    /* Método alternativo com PDO
    public function conecta_pdo() {
        $dsn = "mysql:host=$this->host;port=$this->porta;dbname=$this->database;charset=utf8";
        try {
            $pdo = new PDO($dsn, $this->usuario, $this->senha);
            // Habilitar exceções do PDO para erros
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $erro) {
            echo "Erro ao se conectar: " . $erro->getMessage();
        }
    }
    */
}
?>
