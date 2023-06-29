<?php
system('clear');
error_reporting(0);
$rand=rand(111, 999);
$UserAgent="Mozilla/5.0 ( Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.".$rand." Safari/537.3";

function request($url, $method, $data, $proxy_ip, $proxy_port) {
    global $UserAgent;
    $header = array(
        "Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
        "upgrade-insecure-requests: 1",
        "user-agent: ".$UserAgent.""
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    curl_setopt($ch, CURLOPT_COOKIE,TRUE);
    curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt"); 

    if ($method === 'GET') {
        curl_setopt($ch, CURLOPT_HTTPGET, true);
    } elseif ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    } else {
        // Metode HTTP tidak valid
        return false;
    }

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        $result = false;
    }

    curl_close($ch);
    return $result;
}

$n=10;

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 

    return $randomString;
}

$getproxy = file("data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($getproxy as $proxy) {
	$mk = getName($n);
	
	
    $proxy_parts = explode(":", $proxy);
    $proxy_ip = $proxy_parts[0];
    $proxy_port = $proxy_parts[1];
    $ip = "";
    $proxy_string = $proxy_ip . ":" . $proxy_port;
    //$result = get("https://educateenlaweb.com/dashboard/register.php", $proxy_ip, $proxy_port);    
    $url = "https://educateenlaweb.com/dashboard/register.php";
    $method = "GET";
   $data = null; // Jangan isi data untuk metode GET
   $response = request($url, $method, $data, $proxy_ip, $proxy_port);
  $tok = explode('">', explode('<input autocomplete="off" type="hidden" id="authenticity_token" name="authenticity_token" value="', $response)[1])[0];

//$ip = explode('&', explode('<td>{&quot;ip_addr&quot;:&quot;', $response)[1])[0];
   if ($tok !== false) {
  $url = "https://educateenlaweb.com/dashboard/register.php";
  $method = "POST";
  $data = "authenticity_token=".$tok."&fullname=".$mk."&username=".$mk."&email=".$mk."@gmail.com&confirm_email=".$mk."@gmail.com&password=".$mk."&referer=XR1U82";
  $response1 = request($url, $method, $data, $proxy_ip, $proxy_port);
$suc = explode('Added !' ,explode('SignUp', $response1)[1])[0];
  echo " \033[1;37m$suc  \n";
  system('rm cookie.txt');}else{
    system('rm cookie.txt');
    echo "\033[1;31m Permintaan gagal! \033[1;37m $proxy_ip:$proxy_port\n";}

}
