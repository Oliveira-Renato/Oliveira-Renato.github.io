<?php


if(isset($_POST['email']) && !empty($_POST['email'])){

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$assunto = addslashes($_POST['assunto']);
$mensagem = addslashes($_POST['mensagem']);

$to =  "renato.printf@gmail.com";
$subject = "Contato - My Soul Site ";
$body = "Nome: ".$nome. "\n"
        "Email: ".$email. "\n"
        "Assunto: ".$assunto. "\n"
        "Mensagem: ".$mensagem;

$header = "From: renato.troll@gemail.com"."\r\n" ."Reply-To:".$email. "\r\n" ."X=mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)){

    echo("Email enviado com sucesso!");

}else{
    
    echo(" Email não pode ser enviado");

}

}

?>