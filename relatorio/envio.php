<?php

    require_once("../db.class.php");
    $objDb = new db();
    $escola = $objDb->nome;

    include('config.php');

    use Dompdf\Dompdf;

    require_once 'autoload.inc.php';


    if(isset($_POST['Primeiro']))
    {
             

        if(($_POST['PrimeiraData'] == ""  && $_POST['turma'] == "Todos") || ($_POST['SegundaData'] == "" && $_POST['turma'] == "Todos")){

            echo ("<script>
                window.alert('Preencha os Periodos')
                window.location.href='/relatorio/selecionar_turma.php';
                </script>");

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turma'] == "Todos" && $_POST['turno'] == "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM relatorio_alunos_faltosos WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."'ORDER BY `Nome`;";

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turma'] != "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM relatorio_alunos_faltosos WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."' AND Turma='".$_POST['turma']."'ORDER BY `Nome`;";

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turno'] != "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM relatorio_alunos_faltosos WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."' AND Turno='".$_POST['turno']."'ORDER BY `Nome`;";

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turma'] != "Todos" && $_POST['turno'] != "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM relatorio_alunos_faltosos WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."' AND Turno='".$_POST['turno']."' AND Turma='".$_POST['turma']."' ORDER BY `Nome`;";

        }

            $res = $conn->query($sql);

            if($res->num_rows > 0){
                $html = "<h3>Escola ".$escola." - Alunos Faltosos (".$_POST['PrimeiraData']." - ".$_POST['SegundaData'].") </h3><table border='1'>";
                $html .= "<td><center>Codigo</center></td>";
                $html .= "<td><center>Nome</center></td>";
                $html .= "<td><center>Turma</center></td>";
                $html .= "<td><center>Turno</center></td>";
                $html .= "<td><center>Data</center></td>";
                
                while($row = $res->fetch_object()){
                    
                    $html .= "<tr>";
                    $html .= "<td>".$row->Codigo."</td>";
                    $html .= "<td>".$row->Nome."</td>";
                    $html .= "<td><center>".$row->Turma."</center></td>";
                    $html .= "<td><center>".$row->Turno."</center></td>";
                    $html .= "<td><center>".$row->Dia."</center></td>";
                    $html .= "</tr>";
                }
                $html .= "</table>";



                $dompdf = new Dompdf();

                $dompdf->loadHtml($html);
            
                $dompdf->set_option('defaultFont', 'sans');
            
                $dompdf->setPaper('A4', 'portrait');
            
                $dompdf->render();
            
                $dompdf->stream();


            }else{
                echo ("<script>
                window.alert('Nenhum Registro Encontrado')
                window.location.href='/relatorio/selecionar_turma.php';
            </script>");
            }



    }else if (isset($_POST['Terceiro'])){
            
        if(($_POST['PrimeiraData'] == ""  && $_POST['turma'] == "Todos") || ($_POST['SegundaData'] == "" && $_POST['turma'] == "Todos")){

            echo ("<script>
                window.alert('Preencha os Periodos')
                window.location.href='/relatorio/selecionar_turma.php';
                </script>");

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turma'] == "Todos" && $_POST['turno'] == "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM entrada WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."'ORDER BY `Nome`;";

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turma'] != "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM entrada WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."' AND Turma='".$_POST['turma']."'ORDER BY `Nome`;";

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turno'] != "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM entrada WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."' AND Turno='".$_POST['turno']."'ORDER BY `Nome`;";

        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != "" && $_POST['turma'] != "Todos" && $_POST['turno'] != "Todos"){

            $sql = "SELECT DISTINCT Codigo,Nome,Turma,Turno,Dia FROM entrada WHERE Escola='".$escola."' AND Dia BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."' AND Turno='".$_POST['turno']."' AND Turma='".$_POST['turma']."' ORDER BY `Nome`;";

        }

        $res = $conn->query($sql);

        if($res->num_rows > 0){
            $html = "<h3>Escola ".$escola." - Alunos Presentes (".$_POST['PrimeiraData']." - ".$_POST['SegundaData'].") </h3><table border='1'>";
            $html .= "<td><center>Codigo</center></td>";
            $html .= "<td><center>Nome</center></td>";
            $html .= "<td><center>Turma</center></td>";
            $html .= "<td><center>Turno</center></td>";
            $html .= "<td><center>Data</center></td>";
            
            while($row = $res->fetch_object()){
                
                $html .= "<tr>";
                $html .= "<td>".$row->Codigo."</td>";
                $html .= "<td>".$row->Nome."</td>";
                $html .= "<td><center>".$row->Turma."</center></td>";
                $html .= "<td><center>".$row->Turno."</center></td>";
                $html .= "<td><center>".$row->Dia."</center></td>";
                $html .= "</tr>";
            }
            $html .= "</table>";



            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);
        
            $dompdf->set_option('defaultFont', 'sans');
        
            $dompdf->setPaper('A4', 'portrait');
        
            $dompdf->render();
        
            $dompdf->stream();


        }else{
            echo ("<script>
            window.alert('Nenhum Registro Encontrado')
            window.location.href='/relatorio/selecionar_turma.php';
        </script>");
        }


    }else if (isset($_POST['Quarta'])){
        
        

            
        if(($_POST['PrimeiraData'] == ""  && $_POST['turma'] == "Todos") || ($_POST['SegundaData'] == "" && $_POST['turma'] == "Todos")){

            echo ("<script>
                window.alert('Preencha os Periodos')
                window.location.href='/relatorio/selecionar_turma.php';
                </script>");

        
        }else if($_POST['PrimeiraData'] != "" && $_POST['SegundaData'] != ""){

            $sql = "SELECT * FROM relatorio_total_de_presentes where Escola='".$escola."' AND Data BETWEEN '".$_POST['PrimeiraData']."' AND '".$_POST['SegundaData']."';";

        }

        $res = $conn->query($sql);

        if($res->num_rows > 0){
            $html = "<h3>Escola ".$escola." - Quantidade de Alunos Presentes (".$_POST['PrimeiraData']." - ".$_POST['SegundaData'].") </h3><center><table border='1'>";
            $html .= "<td><center>Data</center></td>";
            $html .= "<td><center>Quantidade</center></td>";
            $html .= "<td><center>Turno</center></td>";
            $html .= "<td><center>Escola</center></td>";
            
            while($row = $res->fetch_object()){
                
                $html .= "<tr>";
                $html .= "<td>".$row->Data."</td>";
                $html .= "<td><center>".$row->Quantidade."</center></td>";
                $html .= "<td><center>".$row->Turno."</center></td>";
                $html .= "<td><center>".$row->Escola."</center></td>";

                $html .= "</tr>";
            }
            $html .= "</center></table>";



            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);
        
            $dompdf->set_option('defaultFont', 'sans');
        
            $dompdf->setPaper('A4', 'portrait');
        
            $dompdf->render();
        
            $dompdf->stream();


        }else{
            echo ("<script>
            window.alert('Nenhum Registro Encontrado')
            window.location.href='/relatorio/selecionar_turma.php';
        </script>");
        }

    }else if (isset($_POST['Quinto'])){
        

    if($_POST['turma'] != "Todos"){

        $sql = "SELECT * FROM cadastro WHERE Escola='".$escola."' AND Turma='".$_POST['turma']."' ORDER BY `Aluno`;";
    }else if($_POST['turma'] == "Todos"){

        $sql = "SELECT * FROM cadastro WHERE Escola='".$escola."' ORDER BY `Aluno`;";
    }
            
        

        $res = $conn->query($sql);

        if($res->num_rows > 0){
            
            $html = "<h2>Quantidades de Faltas</h2><table border='1'>";
            $html .= "<td><center>Codigo</center></td>";
            $html .= "<td><center>Aluno</center></td>";
            $html .= "<td><center>Data</center></td>";
            $html .= "<td><center>Turma</center></td>";
            $html .= "<td><center>Atrasos</center></td>";
            
            while($row = $res->fetch_object()){
                
                $html .= "<tr>";
                $html .= "<td><center>".$row->Codigo."</center></td>";
                $html .= "<td>".$row->Aluno."</td>";
                $html .= "<td><center>".$row->Data."</center></td>";
                $html .= "<td><center>".$row->Turma."</center></td>";
                $html .= "<td><center>".$row->Atrasos."</center></td>";
                $html .= "</tr>";
            }
            $html .= "</table>";



            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);
        
            $dompdf->set_option('defaultFont', 'sans');
        
            $dompdf->setPaper('A4', 'portrait');
        
            $dompdf->render();
        
            $dompdf->stream();


        }else{

            echo ("<script>
            window.alert('Nenhum Registro Encontrado')
            window.location.href='/relatorio/selecionar_turma.php';
        </script>");


        }
    }


?>

