<?php

//responsável por fazer registro do ponto
session_start();
requireValidSession();

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

//tratando os erros
try {
    $currentTime = strftime('%H:%M:%S', time());

    if($_POST['forcedTime']) {//Simulando pontos
        $currentTime = $_POST['forcedTime'];
    }

    $records->innout($currentTime);
    addSuccessMsg('Ponto inserido com sucesso!');
} catch(AppException $e) {
    addErrorMsg($e->getMessage());
}

header('Location: day_records.php');