<?php
require_once("db.class.geral.php");


$obj_geral = new db_geral();
$codigos = array();
$link_geral = $obj_geral->conecta_mysql_geral();
  $sql_geral=("SELECT * FROM `status` WHERE Status = 1");
  $query = mysqli_query($link_geral,$sql_geral);

    while ($rows = mysqli_fetch_assoc($query)) {

      $codigo = $rows['Codigo'];
    //  $codigos.push($codigo);
      array_push($codigos,$codigo);

    }

foreach ($codigos as $valor) {



  $sql_geral=("SELECT * FROM `status` Where Codigo = '$valor' AND Status = 1");
  //echo "$sql_geral";
  $query = mysqli_query($link_geral,$sql_geral);

    while ($rows = mysqli_fetch_assoc($query)) {
$horas = $rows['Horas'];

  //echo "$valor - $horas<br>";


      $sql_geral=("SELECT * FROM `token` WHERE Codigo = '$valor'");
      $query = mysqli_query($link_geral,$sql_geral);

        while ($rows = mysqli_fetch_assoc($query)) {
          define( 'API_ACCESS_KEY', 'AAAAHwEWeZ0:APA91bEddRhGT8AwUuEI3LHzlcyLbJGm2-AeyQh6O1baXUfThJGurQeCQ7n9pXo0nvsuHCBcymJiStaUwu_xyX8vIjWYRpeLCtgBhpfTTnZ2BIKtPVYCeh1LFGg9owtOuAY9sJ3Ay5CS' );

              $singleID = $rows['Token'];
              $nome = $rows['Nome'];


             
              $fcmMsg = array(
               'body' => $nome.' Acessou a escola às '.$horas.'',
               'largeIcon'	=> 'imagens/bell.png',
               //'title' => 'Acesso à escola',
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



        


           
        }

    }



}

$sql_geral=("UPDATE `status` SET `Status`=0 WHERE Codigo = '$valor' ");
echo "$sql_geral";
$query = mysqli_query($link_geral,$sql_geral);


?>
