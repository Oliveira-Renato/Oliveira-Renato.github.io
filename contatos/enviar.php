<?php

date_default_timezone_set('America/Sao_Paulo')
require_once('/src/PHPMailer.php');
require_once('/src/SMTP.php');
require_once('/src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não informado';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
$assunto = isset($_POST['assunto']) ? $_POST['assunto'] : 'Não informado';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : 'Não informado';
$data = date('d/m/Y H:i:s');

if($email && $mensagem) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contato.dibudunga@gmail.com';
    $mail->Password = 'dibunga';
    $mail->Port = 587;
    
    $mail->setFrom('contato.dibudunga@gmail.com');
    $mail->addAddress('contato.dibudunga@gmail.com');
    
    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = "Nome: {$nome}<br>
                   Email: {$email}<br> 
                   Assunto: {$assunto}<br>
                   Mensagem: {$mensagem}<br>
                   Data/hora: {$data}";
    
    if($mail->send()) {

        echo 'Email enviado com sucesso.';

    } else {

        echo 'Email nao enviado.';

    }

} else {

    echo "Email não enviado: informar email e mensagem.";

    }

?>