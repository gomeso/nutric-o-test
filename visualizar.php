<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Paciente</title>
    <link rel="stylesheet" href="css/visualizar.css">
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
        ?>

        <div class="patient-info">
            <h2>Informações do Paciente</h2>
            <table>
                <tr>
                    <td align="right">Nome:</td>
                    <td><?php echo $nome; ?></td>
                </tr>
                <tr>
                    <td align="right">E-mail:</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td align="right">Telefone:</td>
                    <td><?php echo $telefone; ?></td>
                </tr>
                <tr>
                    <td align="right">Idade:</td>
                    <td><?php echo $idade; ?></td>
                </tr>
                <tr>
                    <td align="right">Gênero:</td>
                    <td><?php echo $genero; ?></td>
                </tr>
                <tr>
                    <td align="right">Peso:</td>
                    <td><?php echo $peso; ?></td>
                </tr>
                <tr>
                    <td align="right">Altura:</td>
                    <td><?php echo $altura; ?></td>
                </tr>
                <tr>
                    <td align="right">IMC:</td>
                    <td><?php echo $imc; ?></td>
                </tr>
                <tr>
                    <td align="right">Estado:</td>
                    <td><?php echo $estado; ?></td>
                </tr>
                <tr>
                    <td align="right">Nível de Atividade:</td>
                    <td><?php echo $nivel_atividade; ?></td>
                </tr>
                <tr>
                    <td align="right">Objetivo:</td>
                    <td><?php echo $objetivo; ?></td>
                </tr>
                <tr>
                    <td align="right">TMB:</td>
                    <td><?php echo $tmb; ?></td>
                </tr>
                <tr>
                    <td align="right">TDEE:</td>
                    <td><?php echo $tdee; ?></td>
                </tr>
                <tr>
                    <td align="right">Consumo:</td>
                    <td><?php echo $consumo; ?></td>
                </tr>
                <tr>
                    <td align="right">Proteína:</td>
                    <td><?php echo $proteina; ?></td>
                </tr>
                <tr>
                    <td align="right">Gordura:</td>
                    <td><?php echo $gordura; ?></td>
                </tr>
                <tr>
                    <td align="right">Carboidratos:</td>
                    <td><?php echo $carboidratos; ?></td>
                </tr>
                <tr>
                    <td align="right">Doenças:</td>
                    <td><?php echo $doencas; ?></td>
                </tr>
                <tr>
                    <td align="right">Medicamentos:</td>
                    <td><?php echo $medicamentos; ?></td>
                </tr>
                <tr>
                    <td align="right">Problemas Intestinais:</td>
                    <td><?php echo $problemas_intestinais; ?></td>
                </tr>
                <tr>
                    <td align="right">Fumante:</td>
                    <td><?php echo $fumante; ?></td>
                </tr>
                <tr>
                    <td align="right">Consome Álcool:</td>
                    <td><?php echo $consome_alcool; ?></td>
                </tr>
                <tr>
                    <td align="right">Objetivos:</td>
                    <td><?php echo $objetivos; ?></td>
                </tr>
                <tr>
                    <td align="right">Alergia Alimentar:</td>
                    <td><?php echo $alergia_alimentar; ?></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 20px;">
                <button onclick="window.history.back()">Voltar</button>
            </div>
        </div>

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
