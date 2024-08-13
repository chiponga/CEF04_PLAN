<html>
<head>
   <title></title>
</head>
<body>
   <form action="#" method="POST" enctype="multipart/form-data">
      <input type="file" name="arquivo">
      <input type="submit" value="Enviar">
   </form>
</body>
</html>

<?php
require_once("db.class.php");
   if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
      $nome = $_FILES[ 'arquivo' ][ 'name' ];
      $new_name = md5(time()) . $ext; //Definindo um novo nome para o arquivo
      $dir = 'imagens/upload/'; //Diretório para uploads

      move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

      $sql = "INSERT INTO `aviso`(`Titulo`, `Dia`, `Texto`, `Turma`) VALUES ('$titulo','$data','$texto','".$valor."')";
	
$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link,$sql);
   }else{
   echo 'Você não enviou nenhum arquivo!';
   }
?> 