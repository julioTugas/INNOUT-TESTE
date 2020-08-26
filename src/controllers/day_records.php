<?php

//Registros diários
session_start();
requireValidSession();//chamando a session php

$date = (new Datetime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);// gerando a data
loadTemplateView('day_records', ['today' => $today]);