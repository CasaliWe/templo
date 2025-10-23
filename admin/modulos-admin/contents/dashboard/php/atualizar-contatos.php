<?php

require '../../../../config/config.php';
use Repositories\ContatosRepository;

$instagram = $_POST['instagram'];
$instagramTXT = $_POST['@_instagram'];
$facebook = $_POST['facebook'];
$facebookTXT = $_POST['@_facebook'];
$linkedin = $_POST['linkedin'];
$linkedinTXT = $_POST['@_linkedin'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$wpp = $_POST['wpp'];

$data = [
    'instagram' => $instagram,
    '@_instagram' => $instagramTXT,
    'facebook' => $facebook,
    '@_facebook' => $facebookTXT,
    'linkedin' => $linkedin,
    '@_linkedin' => $linkedinTXT,
    'email' => $email,
    'telefone' => $telefone,
    'wpp' => $wpp
];

$res = ContatosRepository::update($data);

if(!$res){
    header('Location: ../../../../dashboard.php?error=true');
    exit;
}else{
    header('Location: ../../../../dashboard.php?success=true');
    exit;
}


