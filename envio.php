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
        $mail->Host       = 'smtp.hostinger.com';           
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'testeemail@ms-engsolucoes.com.br';      
        $mail->Password   = 'Teste1234@';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;   
        $mail->CharSet    = 'UTF-8';  // Define a codificação como UTF-8

        // Remetente e destinatário
        $mail->setFrom('testeemail@ms-engsolucoes.com.br', 'Mailer');
        $mail->addAddress('testeemail@ms-engsolucoes.com.br', 'André');
        $mail->addReplyTo('testeemail@ms-engsolucoes.com.br', 'Information');

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
window.location.href = 'https://ms-engsolucoes.com.br/';
</script>";
    } catch (Exception $e) {
        echo "Erro ao enviar o formulário: {$mail->ErrorInfo}";
    }
} else {
    echo "Erro ao enviar formulário, acesso não foi via formulário";
}