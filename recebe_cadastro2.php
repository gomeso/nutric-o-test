<?php
if (!empty($_POST['metodo']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['idade']) && !empty($_POST['genero']) && !empty($_POST['peso']) && !empty($_POST['altura']) && !empty($_POST['imc']) && !empty($_POST['estado']) && !empty($_POST['nivel-atividade']) && !empty($_POST['objetivo']) && !empty($_POST['tmb']) && !empty($_POST['tdee']) && !empty($_POST['consumo']) && !empty($_POST['proteina']) && !empty($_POST['gordura']) && !empty($_POST['carboidratos']) && !empty($_POST['doencas']) && !empty($_POST['medicamentos']) && !empty($_POST['problemas-intestinais']) && !empty($_POST['fumante']) && !empty($_POST['consome-alcool']) && !empty($_POST['objetivos']) && !empty($_POST['alergia-alimentar']) && !empty($_POST['cintura']) && !empty($_POST['pescoco']) && (!empty($_POST['quadril']) || $_POST['genero'] == 'masculino') && !empty($_POST['percentualGordura'])) {
    $metodo = $_POST['metodo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $idade = $_POST['idade'];
    $genero = $_POST['genero'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $imc = $_POST['imc'];
    $estado = $_POST['estado'];
    $nivel_atividade = $_POST['nivel-atividade'];
    $objetivo = $_POST['objetivo'];
    $tmb = $_POST['tmb'];
    $tdee = $_POST['tdee'];
    $consumo = $_POST['consumo'];
    $proteina = $_POST['proteina'];
    $gordura = $_POST['gordura'];
    $carboidratos = $_POST['carboidratos'];
    $doencas = $_POST['doencas'];
    $medicamentos = $_POST['medicamentos'];
    $problemas_intestinais = $_POST['problemas-intestinais'];
    $fumante = $_POST['fumante'];
    $consome_alcool = $_POST['consome-alcool'];
    $objetivos = $_POST['objetivos'];
    $alergia_alimentar = $_POST['alergia-alimentar'];
    $cintura = $_POST['cintura'];
    $pescoco = $_POST['pescoco'];
    $quadril = isset($_POST['quadril']) ? $_POST['quadril'] : null;
    $percentualGordura = $_POST['percentualGordura'];

    include("conecta.php");

    // verifica se houve conexão
    if ($conn) {
        // seleciona o banco de dados
        $db = mysqli_select_db($conn, "nutri");

        if (!$db) {
            die("Não foi possível selecionar o banco de dados: " . mysqli_error($conn));
        }

        // comando SQL para inserir na tabela
        $sql = "INSERT INTO nutri2 (id, metodo, nome, email, telefone, idade, genero, peso, altura, imc, estado, nivel_atividade, objetivo, tmb, tdee, consumo, proteina, gordura, carboidratos, doencas, medicamentos, problemas_intestinais, fumante, consome_alcool, objetivos, alergia_alimentar, cintura, pescoco, quadril, percentualGordura) VALUES ('', '$metodo', '$nome', '$email', '$telefone', '$idade', '$genero', '$peso', '$altura', '$imc', '$estado', '$nivel_atividade', '$objetivo', '$tmb', '$tdee', '$consumo', '$proteina', '$gordura', '$carboidratos', '$doencas', '$medicamentos', '$problemas_intestinais', '$fumante', '$consome_alcool', '$objetivos', '$alergia_alimentar', '$cintura', '$pescoco', '$quadril', '$percentualGordura')";

        //* executa o comando SQL, caso ocorra algum erro na instrução SQL, mostra a mensagem de erro */
        mysqli_query($conn, $sql) or die("Não foi possível executar o comando SQL");

        // redireciona para a página principal após o registro
        {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'inicio.html';</script>";
        }
    } else {
        echo "<center><font color=red>Não houve conexão com o banco</font></center>";
    }
} else {
    echo "<script>alert('Todos os campos são obrigatórios!'); window.location.href = 'circu.php';</script>";
}
?>
