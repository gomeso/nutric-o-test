<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Paciente</title>
    <link rel="stylesheet" href="css/alterar.css">
    <script language="javascript">
    function mascara(src, mask) {
        var i = src.value.length;
        var saida = mask.substring(1, 2);
        var texto = mask.substring(i);
        if (texto.substring(0, 1) != saida) {
            src.value += texto.substring(0, 1);
        }
    }
    </script>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="inicio.html">Pacientes</a></li>
            <li><a href="inicio.html">Sair</a></li>
        </ul>
    </div>
    <div class="content">
        <?php
        include("conecta.php");

        // Captura o ID da URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($id > 0) {
            // Verifica se houve conexão
            if ($conn) {
                $db = mysqli_select_db($conn, "nutri");

                // Comando SQL para selecionar o registro na tabela
                $sql = "SELECT * FROM nutri1 WHERE id = '$id'";
                $resultado = mysqli_query($conn, $sql) or die("Não foi possível executar o comando SQL");

                if ($conteudo = mysqli_fetch_array($resultado)) {
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
                    $triceps = $conteudo['triceps'];
                    $subescapular = $conteudo['subescapular'];
                    $axilar = $conteudo['axilar'];
                    $peitoral = $conteudo['peitoral'];
                    $suprailiaca = $conteudo['suprailiaca'];
                    $abdominal = $conteudo['abdominal'];
                    $coxa = $conteudo['coxa'];
                    $percentualGordura = $conteudo['percentualGordura'];
        ?>

<form id="form" method="post" action="alterar2.php">
    <h1>Alteração de informações do paciente</h1>
    <div class="form-group">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
        </div>
        <div>
            <label for="idade">Idade:</label>
            <input type="text" id="idade" name="idade" value="<?php echo $idade; ?>">
        </div>
        <div>
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" value="<?php echo $genero; ?>">
        </div>
        <div>
            <label for="peso">Peso:</label>
            <input type="text" id="peso" name="peso" value="<?php echo $peso; ?>">
        </div>
        <div>
            <label for="altura">Altura:</label>
            <input type="text" id="altura" name="altura" value="<?php echo $altura; ?>">
        </div>
        <div>
            <label for="imc">Tríceps (mm):</label>
            <input type="text" id="triceps" name="triceps" value="<?php echo $triceps; ?>" >
        </div>
        <div>
            <label for="imc">Subescapular (mm):</label>
            <input type="text" id="subescapular" name="subescapular" value="<?php echo $subescapular; ?>" >
        </div>
        <div>
            <label for="imc">Axilar Média (mm):</label>
            <input type="text" id="axilar-media" name="axilar" value="<?php echo $axilar; ?>" >
        </div>
        <div>
            <label for="imc">Peitoral (mm):</label>
            <input type="text" id="peitoral" name="peitoral" value="<?php echo $peitoral; ?>" >
        </div>
        <div>
            <label for="imc">Supra-ilíaca (mm):</label>
            <input type="text" id="suprailiaca" name="suprailiaca" value="<?php echo $suprailiaca; ?>" >
        </div>
        <div>
            <label for="imc">Abdominal (mm):</label>
            <input type="text" id="abdominal" name="abdominal" value="<?php echo $abdominal; ?>" >
        </div>
        <div>
            <label for="imc">Coxa (mm):</label>
            <input type="text" id="coxa" name="coxa" value="<?php echo $coxa; ?>" >
        </div>
        <div>
            <label for="imc">Percentual de Gordura:</label>
            <input type="text" id="percentualGordura" name="percentualGordura" value="<?php echo $percentualGordura; ?>" readonly>
        </div>
        <div>
            <label for="imc">IMC:</label>
            <input type="text" id="imc" name="imc" value="<?php echo $imc; ?>" readonly>
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" value="<?php echo $estado; ?>">
        </div>
        <div>
            <label for="nivel_atividade">Nível de Atividade:</label>
            <input type="text" id="nivel_atividade" name="nivel_atividade" value="<?php echo $nivel_atividade; ?>">
        </div>
        <div>
            <label for="objetivo">Objetivo:</label>
            <input type="text" id="objetivo" name="objetivo" value="<?php echo $objetivo; ?>">
        </div>
        <div>
            <label for="tmb">TMB:</label>
            <input type="text" id="tmb" name="tmb" value="<?php echo $tmb; ?>" readonly>
        </div>
        <div>
            <label for="tdee">TDEE:</label>
            <input type="text" id="tdee" name="tdee" value="<?php echo $tdee; ?>" readonly>
        </div>
        <div>
            <label for="consumo">Consumo diário(objetivo escolhido):</label>
            <input type="text" id="consumo" name="consumo" value="<?php echo $consumo; ?>" readonly>
        </div>
        <div>
            <label for="proteina">Proteína:</label>
            <input type="text" id="proteina" name="proteina" value="<?php echo $proteina; ?>" readonly>
        </div>
        <div>
            <label for="gordura">Gordura:</label>
            <input type="text" id="gordura" name="gordura" value="<?php echo $gordura; ?>" readonly>
        </div>
        <div>
            <label for="carboidratos">Carboidratos:</label>
            <input type="text" id="carboidratos" name="carboidratos" value="<?php echo $carboidratos; ?>" readonly>
        </div>
        <div>
            <label for="doencas">Doenças:</label>
            <input type="text" id="doencas" name="doencas" value="<?php echo $doencas; ?>">
        </div>
        <div>
            <label for="medicamentos">Medicamentos:</label>
            <input type="text" id="medicamentos" name="medicamentos" value="<?php echo $medicamentos; ?>">
        </div>
        <div>
            <label for="problemas_intestinais">Problemas Intestinais:</label>
            <input type="text" id="problemas_intestinais" name="problemas_intestinais" value="<?php echo $problemas_intestinais; ?>">
        </div>
        <div>
            <label for="fumante">Fumante:</label>
            <input type="text" id="fumante" name="fumante" value="<?php echo $fumante; ?>">
        </div>
        <div>
            <label for="consome_alcool">Consome Álcool:</label>
            <input type="text" id="consome_alcool" name="consome_alcool" value="<?php echo $consome_alcool; ?>">
        </div>
        <div>
            <label for="objetivos">Objetivos:</label>
            <input type="text" id="objetivos" name="objetivos" value="<?php echo $objetivos; ?>">
        </div>
        <div>
            <label for="alergia_alimentar">Alergia Alimentar:</label>
            <input type="text" id="alergia_alimentar" name="alergia_alimentar" value="<?php echo $alergia_alimentar; ?>">
        </div>
    </div>
    <div style="text-align:center;">
        <input type="submit" value="Alterar">
    </div>
</form>

        <?php
                } else {
                    echo "Paciente não encontrado.";
                }

                mysqli_close($conn);
            } else {
                echo "Sem conexão com o banco de dados";
            }
        } else {
            echo "ID do paciente não fornecido.";
        }
        ?>
    </div>
</body>
</html>
