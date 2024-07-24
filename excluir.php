<?php
include("conecta.php");

// Captura o ID da URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Verifica se houve conexão
    if ($conn) {
        $db = mysqli_select_db($conn, "nutri");

        if (!$db) {
            die("Não foi possível selecionar o banco de dados: " . mysqli_error($conn));
        }

        // Comando SQL para deletar o registro na tabela
        $sql = "DELETE FROM nutri1 WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            echo "<script>alert('Paciente excluído com sucesso!'); window.location.href = 'inicio.html';</script>";
        } else {
            echo "Erro ao excluir paciente: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Sem conexão com o banco de dados";
    }
} else {
    echo "ID do paciente não fornecido.";
}
?>
