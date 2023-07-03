<?php

error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
function timer($t){
$p=$t;
for ($x=$p;$x>0;$x--){
$wak = date("[i:s]", $x);
echo "\r                          \r";
echo "\r  \033[1;97mwait \033[1;93m".$wak." \r";
sleep(1);
}}
function clear() {
    system("clear");
}
clear();
/* START COLOR */
$res = "\033[0m";
$hitam = "\033[0;30m";
$abu2 = "\033[1;30m";
$putih = "\033[0;37m";
$putih2 = "\033[1;37m";
$red = "\033[0;31m";
$red2 = "\033[1;31m";
$green = "\033[92m";
$green2 = "\033[1;32m";
$yellow = "\033[0;33m";
$yellow2 = "\033[1;33m";
$blue = "\033[0;34m";
$blue2 = "\033[1;34m";
$purple = "\033[0;35m";
$purple2 = "\033[1;35m";
$lblue = "\033[0;36m";
$lblue2 = "\033[1;36m";
/* STARD BECGROUND */
$biru = "\033[44m";
$merah = "\033[41m";
$kuning = "\033[43m";
$biruM = "\033[46m";
$ungu = "\033[45m";
$hijau = "\033[42m";
$puti = "\033[47m";

function ban(){
$green = "\033[92m";
strip();
echo $green."       _                       _     _
  __ _(_)_   __         __   _(_) __| | ___  ___
 / _` | \ \ / /  _____  \ \ / / |/ _` |/ _ \/ _ \
| (_| | |\ V /  |_____|  \ V /| | (_| |  __/ (_) |
 \__, |_| \_/             \_/ |_|\__,_|\___|\___/
 |___/\n";
strip();
}

function strip(){$putih = "\033[0;37m";
echo $putih."~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
}


function curl($url, $post = 0, $httpheader = 0, $proxy = 0){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_COOKIE,TRUE);
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        if($proxy){
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }

#-------------------------#
#-- metode GET dan POST --#
#-------------------------#

function curl_get($url,$host){
   return curl($url,'',$host)[1];
}
function curl_post($url,$data,$host){
  return curl($url,$data,$host)[1];
}

    function save($data,$data_post){

    if(!file_get_contents($data)){
      file_put_contents($data,"[]");
     }
    $json=json_decode(file_get_contents($data),1);
    $arr=array_merge($json,$data_post);
    file_put_contents($data,json_encode($arr,JSON_PRETTY_PRINT));

  }

#-----------------------------------------------------------------------------#
#---------------------- [CODINGAN SCRIPT NUYUL PHP] --------------------------#
#-----------------------------------------------------------------------------#

function enc($message){
$ts = round(microtime(true) * 1000);
$secret  =  b"\xa1'\x85j\t@3r\xc1I\xed\xb1\xd5b~\xf4";
$cipher = "AES-128-ECB";
$option = 0;
$encrypted =  openssl_encrypt($message,$cipher,$secret,$option);
$binary = base64_decode($encrypted);
$hex = bin2hex($binary);
return $hex;
}

   if(!file_exists("config.json")){
	 clear();ban();
	 $user=readline("userId: ");
	 $data = [
	 "userId" => $user,
 	 ];
	 save("config.json",$data);
	}
	balik:
	clear();ban();
	$cfg=json_decode(file_get_contents("config.json"), true);
	$userId=$cfg['userId'];

$host="givvy-video-backend.herokuapp.com";
$ua=[
"language: English",
"currency: USD",
"version: 9.0",
"api_level: 31",
"authCode: jwfox7k55<h",
"sessionId: d5zfsbkt",
"packageName: com.givvyvideos",
"Content-Type: application/json; charset=utf-8",
"Host: ".$host,
"Connection: Keep-Alive",
"User-Agent: okhttp/5.0.0-alpha.9",
];


function info($userId,$ua,$host){
	$ts = round(microtime(true) * 1000);
	$login="https://".$host."/getUser";
	$datt=json_encode([
		"userId" => $userId,
		"verts"  => $ts
		]);
	$datah=json_encode([
		"verificationCode" => enc($datt)
		]);
	$res=json_decode(curl_post($login,$datah,$ua), true);
	return $res;
}


	$log=info($userId,$ua,$host);

	$nama=$log['result']['name'];
        $poin=$log['result']['credits'];
        $usd=$log['result']['userBalance'];

        echo $blue."connect as ".$putih2.$nama."\n";
        echo $lblue."\tbalance ".$green.$poin.$putih." usd ".$green.$usd."\n";
        strip();

	$ts = round(microtime(true) * 1000);
	$login="https://".$host."/getSuggestedSectionsForUser";
	$datt=json_encode([
		"userId" => $userId,
		"country"  => "ID",
		"verts"  => $ts
		]);
	$datah=json_encode([
		"verificationCode" => enc($datt)
		]);
	$res=json_decode(curl_post($login,$datah,$ua), true);

while(true):

	$ts = round(microtime(true) * 1000);
	$login="https://".$host."/canWatchVideo";
	$datt=json_encode([
		"userId" => $userId,
		"verts" => $ts
		]);
	$datah=json_encode([
		"verificationCode" => enc($datt)
		]);
	$res=json_decode(curl_post($login,$datah,$ua), true);


	$ts = round(microtime(true) * 1000);
	$login="https://".$host."/getPresentReward";
	$datt=json_encode([
		"userId" => $userId,
		"verts" => $ts+60000
		]);
	$datah=json_encode([
		"verificationCode" => enc($datt)
		]);
	$res=json_decode(curl_post($login,$datah,$ua), true);
	
//	print_r($res);die();
	$claim=$res['result']['earnCredits'];
	$poin=$res['result']['credits'];
	echo $putih."\t add claim ".$green."+".$claim.$lblue." balance ".$green.$poin."\n";
$jj = 30;
timer($jj);
endwhile;
