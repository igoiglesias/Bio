<?php

require_once ( __DIR__ . "/../app/info.model.php" );
require_once ( __DIR__ . "/../app/info.service.php" );
require_once ( __DIR__ . "/../app/database/connection.php" );

$info = new Info();
$connection = new Connection();
$infoService = new InfoService($connection, $info);

$returnData = $infoService->save($data);

// $fiveNews = $empresasService->getFiveNews();