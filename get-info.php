<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once( __DIR__ . "/extra/Browser.php");

function getUserIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$data_front = json_decode(file_get_contents('php://input'), true);

$browser = new Browser();

$data = [
    "ip"              => getUserIpAddr(),
    "browser"         => $browser->getBrowser(),
    "browser_version" => $browser->getVersion(),
    "platform"        => $browser->getPlatform(),
    "mobile"          => $browser->isMobile(),
    "robot"           => $browser->isRobot(),
    "tablet"          => $browser->isTablet(),
    "facebook"        => $browser->isFacebook(),
    "base_url"        => $data_front["baseUrl"],
    "site_prev"       => $data_front["sitePrev"],
    "site_name"       => $data_front["siteName"],
];

if ($data){
    require_once( __DIR__ . "/controller/bio_info.php");
    
    echo json_encode($returnData);

}
