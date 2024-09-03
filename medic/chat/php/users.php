<?php
    session_start();
    include_once("../../../../conexao.php");
    $unique_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conexao, "SELECT pa.* FROM tb_paciente as pa join tb_medico as me on (me.id_medico = pa.id_medico) where me.unique_id = $unique_id and pa.ativo = 'a'");
    $output = "";

    if(mysqli_num_rows($sql) == 0){ // se tiver apenas 1 ususario na lninha do banco de dados significa que é esse que está logado, se tiver apenas ele no banco, significa que não há outro usuarios logados no momento
        $output .= "Não há usuarios disponiveis...";
    }elseif(mysqli_num_rows($sql) > 0){// enquanto tiver mais de um usuario, mostre todos estes que estao ativos no momento
        include "data.php";
    }
    echo $output;
   

?>