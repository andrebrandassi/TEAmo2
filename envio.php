<?php
// Importar classes PHPMailer para o namespace global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Carregar o autoloader do Composer
require 'vendor/autoload.php';

// Verificar se o formulário foi submetido
if (isset($_POST['enviar'])) {
    // Criar uma nova instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->SMTPDebug = 0;  
        $mail->isSMTP();                                   
        $mail->Host       = 'www.cpanel.net';           
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'dbrandassi0@gmail.com';      
        $mail->Password   = 'Teste1234@';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;   
        $mail->CharSet    = 'UTF-8';  // Define a codificação como UTF-8

        // Remetente e destinatário
        $mail->setFrom('dbrandassi0@gmail.com', 'Mailer');
        $mail->addAddress('dbrandassi0@gmail.com', 'André');
        $mail->addReplyTo('dbrandassi0@gmail.com', 'Information');

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Mensagem via site - MS EngSoluções';

        $body = "Mensagem enviada através do site segue informações abaixo:<br>
        Nome: " . $_POST['nome'] . "<br>
        E-mail: " . $_POST['email'] . "<br>
        Telefone:" . $_POST['telefone'] . "<br>
        Assunto:" . $_POST['assunto'] . "<br>
        Mensagem:" . $_POST['msg'];

        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // Enviar e-mail
        $mail->send();
        echo "<script>
alert('Mensagem enviada com sucesso! Em breve responderemos.');
window.location.href = 'www.cpanel.net/';
</script>";
    } catch (Exception $e) {
        echo "Erro ao enviar o formulário: {$mail->ErrorInfo}";
    }
} else {
    echo "Erro ao enviar formulário, acesso não foi via formulário";
}