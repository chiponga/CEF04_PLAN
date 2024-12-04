<?php
	session_start();
	require_once("db.class.php");
	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
}
	$nome =	$_SESSION['nome'];
	$usuario = $_SESSION['usuario'];
	$turma = $_SESSION['turma'];
	$tipo = $_POST['tipo'];
    $data = $_POST['date'];
	$ocorrencia = $_POST['ocorrencia'];
    $nome_professor = $_SESSION['nome_professor'];
    $origem = $_SESSION['origem'];
    //$data = date ("Y-m-d");
   
    $obj = new db();
    $link = $obj->conecta_mysql();
    $escola = $obj->nome;



  $sql = "INSERT INTO `registro`(`Codigo`, `Nome`, `Turma`, `Tipo`, `Origem`, `Data`, `Profissional`, `Mensagem`, Leitura, `Assunto`,`Escola`) VALUES ('$usuario','$nome','','$tipo','$nome_professor','$data','$origem','$ocorrencia','NAO', 'Registro','$escola')";
  $resultado_id = mysqli_query($link,$sql);


      /*$sql=("SELECT * FROM `token` WHERE Codigo = '$usuario'");
      $query = mysqli_query($link,$sql);

        while ($rows = mysqli_fetch_assoc($query)) {
          define( 'API_ACCESS_KEY', 'AAAAHwEWeZ0:APA91bEddRhGT8AwUuEI3LHzlcyLbJGm2-AeyQh6O1baXUfThJGurQeCQ7n9pXo0nvsuHCBcymJiStaUwu_xyX8vIjWYRpeLCtgBhpfTTnZ2BIKtPVYCeh1LFGg9owtOuAY9sJ3Ay5CS' );

              $singleID = $rows['Token'];
              
              $fcmMsg = array(
               'body' => 'Novo registro escolar de '.$nome.'',
               'largeIcon'	=> 'imagens/bell.png',
               'title' => 'CEF04',
               'sound' => "default",
               'color' => "#49d676"
              );
              $fcmFields = array(
               'to' => $singleID,
               'priority' => 'high',
               'notification' => $fcmMsg
              );
              $headers = array(
               'Authorization: key=' . API_ACCESS_KEY,
               'Content-Type: application/json'
              );
              $ch = curl_init();
              curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
              curl_setopt( $ch,CURLOPT_POST, true );
              curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
              curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
              curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
              curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
              $result = curl_exec($ch );
              curl_close( $ch );
            }*/

	if($resultado_id){
        echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";

      }else{
        echo "<script>alert('Erro ao Salvar!');document.location='alunos_professor.php';</script>";

      }






?>
