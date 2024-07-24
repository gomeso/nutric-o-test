<?php
include "conecta.php";

if ($conn) {
    // Pegue os valores do formulário de alteração
    $codigo = $_POST['codi'];
    $nome = $conteudo['nome'];
    $email = $conteudo['email'];
    $telefone = $conteudo['telefone'];
    $idade = $conteudo['idade'];
    $genero = $conteudo['genero'];
    $peso = $conteudo['peso'];
    $altura = $conteudo['altura'];
    $imc = $conteudo['imc'];
    $estado = $conteudo['estado'];
    $nivel_atividade = $conteudo['nivel_atividade'];
    $objetivo = $conteudo['objetivo'];
    $tmb = $conteudo['tmb'];
    $tdee = $conteudo['tdee'];
    $consumo = $conteudo['consumo'];
    $proteina = $conteudo['proteina'];
    $gordura = $conteudo['gordura'];
    $carboidratos = $conteudo['carboidratos'];
    $doencas = $conteudo['doencas'];
    $medicamentos = $conteudo['medicamentos'];
    $problemas_intestinais = $conteudo['problemas_intestinais'];
    $fumante = $conteudo['fumante'];
    $consome_alcool = $conteudo['consome_alcool'];
    $objetivos = $conteudo['objetivos'];
    $alergia_alimentar = $conteudo['alergia_alimentar'];
    $cintura = $conteudo['cintura'];
    $pescoco = $conteudo['pescoco'];
    $quadril = $conteudo['quadril'];
    $percentualGordura = $conteudo['percentualGordura'];

    $db = mysqli_select_db($conn, "nutri");

    // Comando SQL para atualizar o registro na tabela
    $sql = "UPDATE nutri2 SET 
            nome='$nome', 
            email='$email', 
            telefone='$telefone', 
            idade='$idade', 
            genero='$genero', 
            peso='$peso', 
            altura='$altura', 
            imc='$imc', 
            estado='$estado', 
            nivel_atividade='$nivel_atividade', 
            objetivo='$objetivo', 
            tmb='$tmb', 
            tdee='$tdee', 
            consumo='$consumo', 
            proteina='$proteina', 
            gordura='$gordura', 
            carboidratos='$carboidratos', 
            doencas='$doencas', 
            medicamentos='$medicamentos', 
            problemas_intestinais='$problemas_intestinais', 
            fumante='$fumante', 
            consome_alcool='$consome_alcool', 
            objetivos='$objetivos', 
            alergia_alimentar='$alergia_alimentar' ,
            cintura='$cintura', 
            pescoco='$pescoco', 
            quadril='$quadril', 
            percentualGordura='$percentualGordura'
            WHERE id = '$codigo'";

    // Executa o comando SQL
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Dados alterados com sucesso!'); window.location.href = 'inicio.html';</script>";
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "Não houve conexão com o banco";
}
?>
