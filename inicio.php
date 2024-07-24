<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrição - Pacientes</title>
    <link rel="stylesheet" href="css/inicio.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="#">Pacientes</a></li>
            <li><a href="#">Sair</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h1>Pacientes</h1>
            <div class="dropdown">
                <button class="add-btn">+</button>
                <div class="dropdown-content">
                    <a href="cadastro.php">Dobras Cutâneas</a>
                    <a href="circu.php">Circunferências</a>
                </div>
            </div>
        </div>
        <div class="patients-list">
            <?php
            include("conecta.php");

            // verifica se houve conexão
            if ($conn) {
                // seleciona o banco de dados
                $db = mysqli_select_db($conn, "nutri");

                if (!$db) {
                    die("Não foi possível selecionar o banco de dados: " . mysqli_error($conn));
                }

                // comando SQL para selecionar todos os registros da tabela nutri1
                $sql1 = "SELECT id, nome, email, metodo, objetivos FROM nutri1";
                $result1 = mysqli_query($conn, $sql1);

                // comando SQL para selecionar todos os registros da tabela nutri2
                $sql2 = "SELECT id, nome, email, metodo, objetivos FROM nutri2";
                $result2 = mysqli_query($conn, $sql2);

                // verifica se houve resultados
                if (mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
                    // output de cada linha da tabela nutri1
                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo "<div class='patient-item'>
                                <div class='patient-details'>
                                    <div class='patient-name'>{$row['nome']}</div>
                                    <div class='patient-email'>{$row['email']}</div>
                                    <div class='patient-phone'>{$row['metodo']}</div>
                                </div>
                                <div class='patient-goal'>{$row['objetivos']}</div>
                                <div class='actions'>
                                    <a href='alterar.php?id={$row['id']}'>Editar</a>
                                    <a href='excluir.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja excluir este paciente?\")'>Excluir</a>
                                    <a href='visualizar.php?id={$row['id']}'>Visualizar</a>
                                </div>
                            </div>";
                    }

                    // output de cada linha da tabela nutri2
                    while ($row = mysqli_fetch_assoc($result2)) {
                        echo "<div class='patient-item'>
                                <div class='patient-details'>
                                    <div class='patient-name'>{$row['nome']}</div>
                                    <div class='patient-email'>{$row['email']}</div>
                                    <div class='patient-phone'>{$row['metodo']}</div>
                                </div>
                                <div class='patient-goal'>{$row['objetivos']}</div>
                                <div class='actions'>
                                    <a href='alterar.php?id={$row['id']}'>Editar</a>
                                    <a href='excluir.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja excluir este paciente?\")'>Excluir</a>
                                    <a href='visualizar.php?id={$row['id']}'>Visualizar</a>
                                </div>
                            </div>";
                    }
                } else {
                    echo "Nenhum cliente registrado";
                }

                mysqli_close($conn);
            } else {
                echo "<center><font color=red>Não houve conexão com o banco</font></center>";
            }
            ?>
        </div>
    </div>
</body>
</html>
