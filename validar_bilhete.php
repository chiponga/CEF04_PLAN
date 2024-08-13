<?php
	session_start();
	require_once("db.class.php");

  if(!isset ($_SESSION['logado_p'])){
    header('Location: login_professor.php');
  }

  $titulo = $_POST['titulo'];
  $data = date ("Y-m-d");
  $texto = $_POST['texto'];



  $objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;

   if(!isset($_POST['ativo'])){
    echo "<script>alert('Selecione as turmas!');document.location='registrar_bilhete_1.php';</script>";
   }

    if ($_POST && isset($_POST['ativo'])){
        $ativo = $_POST['ativo'];

        foreach($ativo as $valor){
          $sql = "INSERT INTO `aviso`(`Imagem`,`Titulo`, `Dia`, `Texto`, `Turma`, 'Escola') VALUES ('$nome_imagem','$titulo','$data','$texto','".$valor."', '$escola')";
          $resultado_id = mysqli_query($link,$sql);


        }
      }

      if($resultado_id){
        echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";

      }else{
        echo "<script>alert('Erro ao Salvar!');document.location='alunos_professor.php';</script>";

		}

?>
