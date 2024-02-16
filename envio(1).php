<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'caminho/para/PHPMailer/src/Exception.php';
require 'caminho/para/PHPMailer/src/PHPMailer.php';
require 'caminho/para/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    // Configuração do PHPMailer
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0; // Descomente esta linha para habilitar o modo de depuração (0 para desativar)
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; // Substitua pelo servidor SMTP do seu provedor
    $mail->SMTPAuth = true;
    $mail->Username = 'testeemail@ms-engsolucoes.com.br'; // Substitua pelo seu e-mail
    $mail->Password = 'Teste1234@'; // Substitua pela sua senha
    $mail->SMTPSecure = 'tls'; // Use 'tls' ou 'ssl' dependendo do seu provedor
    $mail->Port = 587; // Porta do servidor SMTP

    // Configuração do e-mail
    $mail->setFrom('testeemail@ms-engsolucoes.com.br', 'MS'); // Substitua pelo seu e-mail e nome
    $mail->addAddress('testeemail@ms-engsolucoes.com.br', 'André'); // Substitua pelo e-mail e nome do destinatário
    $mail->Subject = 'Nova mensagem do formulário de contato';

    $mail->Body = "Nome: $nome\n";
    $mail->Body .= "E-mail: $email\n\n";
    $mail->Body .= "Mensagem:\n$mensagem";

    try {
        $mail->send();
        header("Location: confirmacao.html");
        exit();
    } catch (Exception $e) {
        echo "Erro no envio do e-mail: {$mail->ErrorInfo}";
    }
}
?>
