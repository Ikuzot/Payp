<?php
error_reporting(0);
function timer($t){
$p=$t;
for ($x=$p;$x>0;$x--){
$wak = date("[i:s]", $x);
echo "\r                          \r";
echo "\r  \033[1;97mwait \033[1;93m".$wak." \r";
sleep(1);
}
}
function curl_request($url, $method, $data = null) {

    $header = array(
        "Host: aviso.bz",
        "referer:https://aviso.bz/work-youtube",
        "content-type: application/x-www-form-urlencoded",
        "accept: application/json, text/javascript, */*; q=0.01",
        "x-requested-with: XMLHttpRequest",
        "cookie: PHPSESSID=avte0m9p8eqjfebntip4b5k96a; googtrans=null; googtrans=null; _ym_uid=168802224756695213; _ym_d=1688022247; _ym_isad=2; _iidt=I/9ANBO87GwdXgWnSbogNyPvBe3glIteFuVWCjYp25dYWDuCyX+6MwVdsdBAu0S46nIQ3Lhq0BapVkDfSX1V49bg2w==; _vid_t=D8MkYo/V4Z74/v8OTUVusNFUlnO+bJJTVEBvY8kJ0qMY4BALLSu6SaJS/TTDG2F6PGjM2yI3raiL31y083lz9kprKQ==; mnu_title1=1; mnu_title2=1; cenrifugo_token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIyMTE5MzM0IiwiZXhwIjoxNjg4MDMzMzcyfQ.xypSi4STlQ-h-auqz8N3xwHy7RWdC23WvdBoNltXy3c; cenrifugo_token_exp=1688033372; mnu_title3=1; mnu_title4=1",
        "user-agent: Mozilla/5.0 (Linux; Android 8.1.0; vivo 1908) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36",
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function request($url, $method, $data = null) {
    $header = array(
        "Host: aviso.bz",
        "referer: https://skyhome.squarespace.com/",
        "content-type: application/x-www-form-urlencoded",
        "accept: application/json, text/javascript, */*; q=0.01",
        "origin: https://skyhome.squarespace.com",
        "cookie: PHPSESSID=avte0m9p8eqjfebntip4b5k96a; googtrans=null; googtrans=null; _ym_uid=168802224756695213; _ym_d=1688022247; _ym_isad=2; _iidt=I/9ANBO87GwdXgWnSbogNyPvBe3glIteFuVWCjYp25dYWDuCyX+6MwVdsdBAu0S46nIQ3Lhq0BapVkDfSX1V49bg2w==; _vid_t=D8MkYo/V4Z74/v8OTUVusNFUlnO+bJJTVEBvY8kJ0qMY4BALLSu6SaJS/TTDG2F6PGjM2yI3raiL31y083lz9kprKQ==; mnu_title1=1; mnu_title2=1; cenrifugo_token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIyMTE5MzM0IiwiZXhwIjoxNjg4MDMzMzcyfQ.xypSi4STlQ-h-auqz8N3xwHy7RWdC23WvdBoNltXy3c; cenrifugo_token_exp=1688033372; mnu_title3=1; mnu_title4=1",
        "user-agent: Mozilla/5.0 (Linux; Android 8.1.0; vivo 1908) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36",
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

while("true"){
a:
$url = "https://aviso.bz/work-youtube";
$rev = curl_request($url, 'GET');
$ball = explode('</span>' ,explode('id="new-money-ballans">', $rev)[1])[0];
$id = explode("," ,explode("funcjs['start_youtube'](", $rev)[1])[0];
$hashh = explode(" 'ads-start" ,explode("funcjs['start_youtube'](", $rev)[1])[0];
$hashes = explode(", ", $hashh);
$hash = trim($hashes[1], "',");
if($hash == ""){
$gg = 1500;
timer($gg);
goto a;
}

$url = 'https://aviso.bz/ajax/earnings/ajax-youtube.php';
$data = "id=".$id."&hash=".$hash."&func=ads-start&user_response=&count_captcha_subscribe=&checkStepOneCaptchaSubscribe=false&visitor_id=&request_id=";
$res = curl_request($url, 'POST', $data);
$tim = explode('\"' ,explode('data-timer=\"', $res)[1])[0];
$idd = explode('\"' ,explode('<span id=\"ads-timer-show-', $res)[1])[0];
$repo = explode('&' ,explode('report_id=', $res)[1])[0];
$has = explode('\"' ,explode('hash=', $res)[1])[0];
$vid = explode('&' ,explode('video_id=', $res)[1])[0];
$mer = explode('&' ,explode('timer=', $res)[1])[0];
$merr = explode('\" data-meta=' ,explode('\"', $mer)[1])[0];
$hh = $tim+1;
timer($hh);

$url = 'https://aviso.bz/ajax/earnings/ajax-youtube-external.php';
$data = "hash=".$has."&report_id=".$repo."&task_id=".$idd."&timer=".$tim."&player_time=".$hh."&video_id=".$vid."&stage=1";
$response = request($url, 'POST', $data);
$suc = explode('<' ,explode('<b>', $response)[1])[0];
if($suc == ""){goto a;}
echo "\033[1;97m Balance = \033[1;92m".$ball." \n";
echo " \033[1;97mSucces claim \033[1;93m".$suc." \n";
echo " \033[1;90m========================= \n";
}

