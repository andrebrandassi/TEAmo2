<?php
/* // Importar classes PHPMailer para o namespace global
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
        $mail->Host       = 'mail.teamofonoaudiologia.com.br';           
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
        $mail->Subject = 'Mensagem via site - teamofonoaudiologia';

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
window.location.href = 'https://teamofonoaudiologia.com.br/';
</script>";
    } catch (Exception $e) {
        echo "Erro ao enviar o formulário: {$mail->ErrorInfo}";
    }
} else {
    echo "Erro ao enviar formulário, acesso não foi via formulário";
} */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carrega o autoload do Composer
require 'vendor/autoload.php';

// Exibe todos os erros (para desenvolvimento)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);

    try {
        // Ativa debug (comente em produção)
        $mail->SMTPDebug = 2; // 0 = off, 2 = verbose
        $mail->isSMTP();
        $mail->Host       = 'mail.teamofonoaudiologia.com.br'; // SMTP do seu domínio
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contato@teamofonoaudiologia.com.br'; // Seu e-mail profissional
        $mail->Password   = 'JCQgEYVKn5KG'; // Senha do e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ou PHPMailer::ENCRYPTION_SMTPS para porta 465
        $mail->Port       = 587; // Porta do SMTP (465 ou 587)
        $mail->CharSet    = 'UTF-8';

        // Remetente e destinatário
        $mail->setFrom('contato@teamofonoaudiologia.com.br', 'Site Teamo Fonoaudiologia');
        $mail->addAddress('dbrandassi0@gmail.com', 'André Brandassi'); // Para onde será enviado
        $mail->addReplyTo($_POST['email'], $_POST['nome']); // Para responder ao remetente

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nova mensagem via site - teamofonoaudiologia.com.br';

        // Corpo do e-mail formatado
        $body = "
            <h3>Mensagem enviada pelo site</h3>
            <p><strong>Nome:</strong> {$_POST['nome']}</p>
            <p><strong>E-mail:</strong> {$_POST['email']}</p>
            <p><strong>Telefone:</strong> {$_POST['telefone']}</p>
            <p><strong>Assunto:</strong> {$_POST['assunto']}</p>
            <p><strong>Mensagem:</strong><br>{$_POST['msg']}</p>
        ";

        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        // Enviar e-mail
        $mail->send();
    } catch (Exception $e) {
        echo "Erro: {$mail->ErrorInfo}";
    }
} else {
     echo "Formulário não submetido corretamente.";
}
?>

