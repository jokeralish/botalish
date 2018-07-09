<?php

require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = '3ubkcdNu312JAGMBo1rPuLeBvQOSNU7MhgzYdgrVWb0pska6O4YZAA4yF0TgsmcmbK7pTMoqgG8GCXFjYRlKO4IvPiebZGmzOzl5yWri74my9dWv9e/c6yt7/sPH2jllCktyJthg7H0EuSuGswKZvgdB04t89/1O/w1cDnyilFU='; #ChannelAccessToken (paste token akses kamu disini)
$channelSecret = '1417036ec81b676e61142196650838be';#Channel Secret (paste token secret kamu disini)
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$groupId 	= $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$type 		= $client->parseEvents()[0]['type'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = explode(" ", $message['text']);
$pesan_simi = explode("Sally ", $message['text']);
$siminya = $pesan_simi[1];
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
#function ==
function simi($keyword) {
    $uri = "https://corrykalam.gq/simi.php?text=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json["answer"];
    return $result;
}
function say($keyword) { 
    $uri = "https://script.google.com/macros/exec?service=AKfycbw7gKzP-WYV2F5mc9RaR7yE3Ve1yN91Tjs91hp_jHSE02dSv9w&nama=" . $keyword . "&tanggal=10-05-2003"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['nama']; 
    return $result; 
}
function instapoto($keyword) {
    $uri = "https://ari-api.herokuapp.com/instagram?username=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['result']['profile_pic_url'];
    return $result;
}

function fansign($keyword) {
    $listnya = array(
	    "https://farzain.xyz//api//premium//fansign//cos/cos%20(1).php?text=" . $keyword . "&apikey=ag73837ung43838383jdhdhd",
        "https://farzain.xyz//api//premium//fansign//cos/cos%20(2).php?text=" . $keyword . "&apikey=ag73837ung43838383jdhdhd",
	    "https://farzain.xyz//api//premium//fansign//cos/cos%20(3).php?text=" . $keyword . "&apikey=ag73837ung43838383jdhdhd",
	    "https://farzain.xyz//api//premium//fansign//cos/cos%20(4).php?text=" . $keyword . "&apikey=ag73837ung43838383jdhdhd",
	    "https://farzain.xyz//api//premium//fansign//cos/cos%20(5).php?text=" . $keyword . "&apikey=ag73837ung43838383jdhdhd",
	    "https://farzain.xyz//api//premium//fansign//cos/cos%20(6).php?text=" . $keyword . "&apikey=ag73837ung43838383jdhdhd",
	    "https://farzain.xyz//api//premium//fansign//cos/cos%20(7).php?text=" . $keyword . "&apikey=ag73837ung43838383jdhdhd",
	    );
            $jaws = array_rand($listnya);
            $result = $listnya[$jaws];
    return $result;
}

function film_syn($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "➥「Judul」 \n";
	$result .= $json['Title'];
	$result .= "\n\n➥「Sinopsis」 \n";
	$result .= $json['Plot'];
    return $result;
}
function film($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = " 「 FILM 」\n\n";
    $result = "➥「Judul」 : ";
	$result .= $json['Title'];
	$result .= "\n➥「Rilis pada」 ";
	$result .= $json['Released'];
	$result .= "\n➥「Tipe」 ";
	$result .= $json['Genre'];
	$result .= "\n➥「Pemain」 ";
	$result .= $json['Actors'];
	$result .= "\n➥「Bahasa」 ";
	$result .= $json['Language'];
	$result .= "\n➥「Dari negara」 ";
	$result .= $json['Country'];
    return $result;
}
function twitter($keyword) {
    $uri = "https://farzain.xyz/api/twitter.php?apikey=9YzAAXsDGYHWFRf6gWzdG5EQECW7oo&id=";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Twitter Result」\n\n";
    $result .= "➥「DisplayName」 ";
    $result .= $json[0]['user']['name'];
    $result .= "➥「UserName」 ";
    $result .= $json[0]['user']['screen_name'];
    return $result;
}
function ytdownload($keyword) {
    $uri = "http://wahidganteng.ga/process/api/b82582f5a402e85fd189f716399bcd7c/youtube-downloader?url=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Judul」 \n";
	$result .= $json['title'];
	$result .= "\n➥「Type」 ";
	$result .= $json['data']['type'];
	$result .= "\n➥「Ukuran」 ";
	$result .= $json['data']['size'];
	$result .= "\n➥「Alamat」 ";
	$result .= $json['data']['link'];
    return $result;
}
function insta($keyword) {
    $uri = "https://ari-api.herokuapp.com/instagram?username=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = " 「 INFO INSTAGRAM 」\n\n";
    $result .= "➥「DisplayName」 ";
    $result .= $json['result']['full_name'];
    $result .= "\n➥「UserName」 ";
    $result .= $json['result']['username'];
    $result .= "\n➥「Pengikut」 ";
    $result .= $json['result']['byline'];
    $result .= "\n\n➥「 https://www.instagram.com/" . $keyword . " 」";
    return $result;
}

function cloud($keyword) {
    $uri = "https://farzain.com/api/premium/soundcloud.php?apikey=URgHXv1R5zqVz4v9BLE8tb9r5&id=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    
    $result['id']    .= $json['result'][0]['id'];
    $result['judul'] .= $json['result'][0]['title'];
    $result['link']  .= $json['result'][0]['url'];
    $result['audio'] .= $json['result'][0]['url_download'];
    $result['icon']  .= $json['result'][0]['img'];
	
    return $result;
}

function youtubelist($keyword) {
    $uri = "https://ari-api.herokuapp.com/youtube/search?q=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = " 「 YOUTUBE LIST 」\n\n";
    $parsed .= "➥「JUDUL VID」 : \n";
    $parsed .= $json['result'][0]['title'];
    $parsed .= "\n➥「URL VID」 : ";
    $parsed .= $json['result'][0]['link'];
    $parsed .= "\n➥「ID VID」 : ";
    $parsed .= $json['result'][0]['id'];
    
    $parsed .= "\n\n➥「JUDUL VID」 : \n";
    $parsed .= $json['result'][1]['title'];
    $parsed .= "\n➥「URL VID」 : ";
    $parsed .= $json['result'][1]['link'];
    $parsed .= "\n➥「ID VID」 : ";
    $parsed .= $json['result'][1]['id'];
    return $parsed;
}

function music($keyword) { 
    $uri = "http://api.ntcorp.us/joox/search?q=" . $keyword . ""; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result = " 「 MUSIK 」 ";
    $result .= "\n➥Judul : ";
    $result .= $json['0']['0'];
    $result .= "\n➥Durasi : ";
    $result .= $json['0']['1'];
    $result .= "\n➥Alamat : ";
    $result .= $json['0']['4'];
    $result .= "\n\n➥Pencarian : Google";
    return $result; 
}

function urb_dict($keyword) {
    $uri = "http://api.urbandictionary.com/v0/define?term=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['list'][0]['definition'];
    $result .= "\n\n➥「Contoh」 \n";
    $result .= $json['list'][0]['example'];
    return $result;
}

function qrcode($keyword) {
    $uri = "http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=" . $keyword;
    return $uri;
}

function quotes($keyword) {
    $uri = "https://botfamily.faith/api/quotes/?apikey=beta" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
	$result .= "\n➥「Quotes」 ";
	$result .= $json["result"]["quote"];
	$result .= "\n➥「Pembuat」 ";
	$result .= $json["result"]["author"];
    $result.= "\n➥「Kategori」 ";
    $result .= $json["result"]["category"];
    return $result;
}

function google_image($keyword) {
    $uri = "https://ari-api.herokuapp.com/images?q=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['result'][0];	
    return $result;
}
function image_neon($keyword) {
    $uri = "https://ari-api.herokuapp.com/neon?text=" . $keyword;	
    return $uri;
}

function bodybuilder($keyword) {
    $uri = "https://ari-api.herokuapp.com/bodybuilder?url=" . $keyword;
    return $uri;
}

function zodiak($keyword) {
    $uri = "https://script.google.com/macros/exec?service=AKfycbw7gKzP-WYV2F5mc9RaR7yE3Ve1yN91Tjs91hp_jHSE02dSv9w&nama=ervan&tanggal=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = " 「 Zodiak 」 ";
    $result .= "\n➥Lahir : ";
	$result .= $json['data']['lahir'];
	$result .= "\n➥Usia : ";
	$result .= $json['data']['usia'];
	$result .= "\n➥Ultah : ";
	$result .= $json['data']['ultah'];
	$result .= "\n➥Zodiak : ";
	$result .= $json['data']['zodiak'];
	$result .= "\n\n➥Pencarian : Google";
    return $result;
}

function manga($keyword) {

    $fullurl = 'https://myanimelist.net/api/manga/search.xml?q=' . $keyword;
    $username = 'jamal3213';
    $password = 'FZQYeZ6CE9is';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_URL, $fullurl);

    $returned = curl_exec($ch);
    $xml = new SimpleXMLElement($returned);
    $parsed = array();

    $parsed['id'] = (string) $xml->entry[0]->id;
    $parsed['image'] = (string) $xml->entry[0]->image;
    $parsed['title'] = (string) $xml->entry[0]->title;
    $parsed['desc'] = "Episode : ";
    $parsed['desc'] .= $xml->entry[0]->episodes;
    $parsed['desc'] .= "\nNilai : ";
    $parsed['desc'] .= $xml->entry[0]->score;
    $parsed['desc'] .= "\nTipe : ";
    $parsed['desc'] .= $xml->entry[0]->type;
    $parsed['synopsis'] = str_replace("<br />", "\n", html_entity_decode((string) $xml->entry[0]->synopsis, ENT_QUOTES | ENT_XHTML, 'UTF-8'));
    return $parsed;
}

function ps($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "➥「 Nama 」 ";
    $result .= $json['text']['0'];
    $result .= "\n➥「 Link 」 ";
    $result .= "https://play.google.com/store/search?q=" . $keyword . "";
    return $result; 
}

function manga_syn($title) {
    $parsed = manga($title);
    $result = "➥「 Judul 」 " . $parsed['title'];
    $result .= "\n\n➥「 Sinopsis 」\n" . $parsed['synopsis'];
    return $result;
}

function jadwaltv() {
    $uri = "https://ari-api.herokuapp.com/jadwaltv";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = " 「 Jadwal Tv 」\n";
    $result .= "\n 1) [ Judul ] : ";
    $result .= $json['result'][0]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][0]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][0]["jam"];
    
    $result .= "\n\n 2) [ Judul ] : ";
    $result .= $json['result'][1]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][1]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][1]["jam"];
    
    $result .= "\n\n 3) [ Judul ] : ";
    $result .= $json['result'][2]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][2]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][2]["jam"];
    
    $result .= "\n\n 4) [ Judul ] : ";
    $result .= $json['result'][3]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][3]["channelName"];
    $result .= "\n    ➥Waktu ";
    $result .= $json['result'][3]["jam"];
    
    $result .= "\n\n 5) [ Judul ] : ";
    $result .= $json['result'][4]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][4]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][4]["jam"];
    
    $result .= "\n\n 6) [ Judul ] : ";
    $result .= $json['result'][5]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][5]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][5]["jam"];
    
    $result .= "\n\n 7) [ Judul ] : ";
    $result .= $json['result'][7]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][7]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][7]["jam"];
    
    $result .= "\n\n 8) [ Judul ] : ";
    $result .= $json['result'][8]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][8]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][8]["jam"];
    
    $result .= "\n\n 9) [ Judul ] : ";
    $result .= $json['result'][9]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][9]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][9]["jam"];
    
    $result .= "\n\n 10) [ Judul ] : ";
    $result .= $json['result'][10]["acara"];
    $result .= "\n    ➥Tv Channel : ";
    $result .= $json['result'][10]["channelName"];
    $result .= "\n    ➥Waktu : ";
    $result .= $json['result'][10]["jam"];
    return $result;
}
function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = " 「 Jadwal Waktu Sholat 」\n\n";
	  $result .= $json['location']['address'];
	  $result .= "\n\n ➥Shubuh : ";
	  $result .= $json['data']['Fajr'];
	  $result .= "\n ➥Dzuhur : ";
	  $result .= $json['data']['Dhuhr'];
	  $result .= "\n ➥Ashar : ";
	  $result .= $json['data']['Asr'];
	  $result .= "\n ➥Maghrib : ";
	  $result .= $json['data']['Maghrib'];
	  $result .= "\n ➥Isya : ";
	  $result .= $json['data']['Isha'];
	  $result .= "\n ➥Tanggal : ";
	  $result .= $json['time']['date'];
    return $result;
}
function cuaca($keyword) {
    $uri = "http://api.openweathermap.org/data/2.5/weather?q=" . $keyword . ",ID&units=metric&appid=e1be858848678c5a3e5915e8a215c665";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = " 「 Cuaca 」 ";
    $result .= "\n ➥「Nama kota」 ";
	  $result .= $json['name'];
	  $result .= "\n ➥「Cuaca」 ";
	  $result .= $json['weather']['0']['main'];
	  $result .= "\n ➥「Deskripsi」 ";
	  $result .= $json['weather']['0']['description'];
    return $result;
}
function weatherr($keyword) {
    $uri = "https://farzain.com/api/cuaca.php?id=bandung&apikey=URgHXv1R5zqVz4v9BLE8tb9r5" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = " 「 Cuaca 」 ";
    $result .= "\n ➥「Nama kota」 ";
	$result .= $json['tempat'];
	$result .= "\n ➥「Cuaca」 ";
	$result .= $json['result']['200']['cuaca'];
	$result .= "\n ➥「Deskripsi」 ";
	$result .= $json['result']['200']['deskripsi'];
	$result .= "\n ➥「Suhu」 ";
	$result .= $json['result']['200']['suhu'];
	$result .= "\n ➥「Udara」 ";
	$result .= $json['result']['200']['udara'];
    return $result;
}
function waktu($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = " 「 Waktu 」 ";
	$result .= "\n\n ➥「Wib」 ";
	$result .= $json['time']['time'];
	$result .= "\n ➥「Sunrise」 ";
	$result .= $json['debug']['sunrise'];
	$result .= "\n ➥「Sunset」 ";
	$result .= $json['debug']['sunset'];
    $result .= "\n";
	$result .= $json['location']['address'];
    return $result;
}
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
function adfly($url, $key, $uid, $domain = 'adf.ly', $advert_type = 'int')
{
  // base api url
  $api = 'http://api.adf.ly/api.php?';

  // api queries
  $query = array(
    '7970aaad57427df04129cfe2cfcd0584' => $key,
    '16519547' => $uid,
    'advert_type' => $advert_type,
    'domain' => $domain,
    'url' => $url
  );

  // full api url with query string
  $api = $api . http_build_query($query);
  // get data
  if ($data = file_get_contents($api))
    return $data;
}
function lokasi($keyword) { 
    $uri = "https://time.siswadi.com/pray/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result['address'] .= $json['location']['address'];
 $result['latitude'] .= $json['location']['latitude'];
 $result['longitude'] .= $json['location']['longitude'];
    return $result; 
}
function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}
function jawabs(){
    $list_jwb = array(
		'Ya',
	        'Bisa jadi',
	        'Mungkin',
	        'Gak tau',
	        'Woya donk',
	        'Jawab gk yah!',
		'Tidak',
		'Coba ajukan pertanyaan lain',	    
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}
#-------------------------[Function]-------------------------#
# require_once('./src/function/search-1.php');
# require_once('./src/function/download.php');
# require_once('./src/function/random.php');
# require_once('./src/function/search-2.php');
# require_once('./src/function/hard.php');
          //),
        //),
      //),
            //)
        //)
    //);
//}
//show menu, saat join dan command /menu
if ($type == 'join') {
    //$text = "Terimakasih sudah mengundang Puy ke Grup\n\nInfo perintah Puy :\n#menu\n#about\n#myinfo";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
          array (
  'type' => 'template',
  'altText' => 'Invited to Group',
  'template' =>
  array (
    'type' => 'carousel',
    //'actions' => [],
    'columns' =>
    array (
        0 =>
      array (
        'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'Thanks for invited Puy to Group',
        //'actions' => [
        'text' => ' ',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'uri',
            'label' => 'Creator',
            'uri' => 'https://line.me/ti/p/~heefpuy',
          ),
          (
            'type' => 'text',
            'label' => 'Perintah',
            'text' => '#menu',
          ),
        ),
      ),
      'text': 'About Puy',
    ),
    'imageAspectRatio' => 'square',
    'imageSize' => 'cover',
  ),
)
)
);
}
if ($command == '#menu') {
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
          array (
  'type' => 'template',
  'altText' => 'Command',
  'template' =>
  array (
    'type' => 'carousel',
    'columns' =>
    array (
        0 =>
      array (
        //'thumbnailImageUrl' => ' ',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'MENU',
        'text' => 'Geser untuk intip',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => ' ',
            'text' => ' ',
          ),
        ),
      ),
      1 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'MENU MEDIA',
        'text' => 'Menampilkan Menu Media',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK DISINI',
            'text' => '#menumedia',
          ),
        ),
      ),
      2 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'DEFINISI',
        'text' => 'Menampilkan definisi',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#definisi botak',
          ),
        ),
      ),
      3 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'PLAYSTORE',
        'text' => 'Mencari isi PlayStore',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#playstore moba analog ',
          ),
        ),
      ),
      4 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'GOOGLE IMAGE',
        'text' => 'Menampilkan gambar dari Google',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#carigambar sarahvilo',
          ),
        ),
      ),
      5 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'TIME',
        'text' => 'Menampilkan Waktu saat ini',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#waktu depok',
          ),
        ),
      ),
      6 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'PRAYTIME',
        'text' => 'Menampilkan Jadwal Waktu Sholat',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#jshalat depok',
          ),
        ),
      ),
      7 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'CUACA',
        'text' => 'Menampilkan Cuaca Dini Hari',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#cuaca depok',
          ),
        ),
      ),
      8 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'TV JADWAL',
        'text' => 'Menampilkan Jadwal TV',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#acaratv',
          ),
        ),
      ),
    ),
    'imageAspectRatio' => 'rectangle',
    'imageSize' => 'contain',
  ),
)
)
);
}
if ($command == '#menumedia') {
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
          array (
  'type' => 'template',
  'altText' => 'MENU MEDIA PUY',
  'template' =>
  array (
    'type' => 'carousel',
    'columns' =>
    array (
        0 =>
      array (
        //'thumbnailImageUrl' => ' ',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => '￼MENU MEDIA￼',
        'text' => 'Geser untuk intip',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => ' ',
            'text' => ' ',
          ),
        ),
      ),
      1 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'FILM INFO',
        'text' => 'Menampilkan info film',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#filminfo warkop dki',
          ),
        ),
      ),
      2 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'YOUTUBE VID',
        'text' => 'Menampilkan video video dari youtube',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#youtube sarahvilo',
          ),
        ),
      ),
      3 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'FILM',
        'text' => 'Mencari Film',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#film warkop dki',
          ),
        ),
      ),
      4 =>
      array (
        //'thumbnailImageUrl' => 'https://img.buzzfeed.com/buzzfeed-static/static/2016-07/7/15/campaign_images/buzzfeed-prod-web12/i-am-tired-of-watching-black-people-die-2-29975-1467919446-2_dblbig.jpg',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'INSTAGRAM',
        'text' => 'Instagram acc Info',
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'KLIK',
            'text' => '#instainfo muh.khadaffy',
          ),
        ),
      ),
    ),
    'imageAspectRatio' => 'square',
    'imageSize' => 'contain',
  ),
)
)
);
}
if ($command == '#about') {
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
          array (
  'type' => 'template',
  'altText' => 'About Puy',
  'template' =>
  array (
    'type' => 'carousel',
    'columns' =>
    array (
        0 =>
      array (
        //'thumbnailImageUrl' => ' ',
        //'imageBackgroundColor' => '#FFFFFF',
        'title' => 'Pembuat PUY',
        'text' => 'Klik untuk lihat pembuat Puy',
        //'defaultAction' =>
        //array (
          //'type' => 'uri',
          //'label' => 'View detail',
          //'uri' => 'https://line.me/ti/p/~heefpuy',
        //),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'Tap',
            'text' => '#aboutpuy',
          ),
        ),
      ),
    ),
    'imageAspectRatio' => 'square',
    'imageSize' => 'contain',
  ),
)
)
);
}
if($message['type']=='text') {
	    if ($command == '#lokasi') {
        $result = lokasi($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'location',
                    'title' => 'Lokasi',
                    'address' => $result['address'],
                    'latitude' => $result['latitude'],
                    'longitude' => $result['longitude']
                ),
            )
        );
    }
}
//fitur musik
if($message['type']=='text') {
	    if ($command == '#carimusik') {
        $result = music($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur soundcloud
if($message['type']=='text') {
	    if ($command == '#soundcloud' || $command == '#Soundcloud') {
        $result = cloud($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
		    array(
                  'type' => 'image',
                  'originalContentUrl' => $result['icon'],
                  'previewImageUrl' => $result['icon']
                ),
                array(
                    'type' => 'text',
                    'text' => 'ID: '.$result['id'].'
TITLE: '. $result['judul'].'
URL: '. $result['link']
                ),
		    array(
                  'type' => 'audio',
                  'originalContentUrl' => $result['audio'],
                  'duration' => 60000
                )
            )
        );
    }
}
if($message['type']== 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == '#apakah') {
        $balas = send(jawabs(), $replyToken);
    }
}
// fitur instagram
if($message['type']=='text') {
	    if ($command == '#instainfo') {
        $resultnya = instapoto($options);
        $result = insta($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
		array(
                  'type' => 'image',
                  'originalContentUrl' => $resultnya,
                  'previewImageUrl' => $resultnya
                ),
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur film
if($message['type']=='text') {
	    if ($command == '#film') {

        $result = film($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur quotes
if($message['type']=='text') {
        if ($command == '#quotes') {
        $result = quotes($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => $result
                )
            )
        );
    }
}
//fitur synfilm
if($message['type']=='text') {
        if ($command == '#filminfo') {
        $result = film_syn($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array( 
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur youtube
if($message['type']=='text') {
	    if ($command == '#youtube') {
        $result = youtubelist($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '#myinfo') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(

										'type' => 'text',					
										'text' => '「 Info Profile 」

-Nama : '.$profil->displayName.'
-Status : '.$profil->statusMessage.'
Picture : '.$profil->pictureUrl.'
'
                                    )
                            )
                        );
    }
}
if($message['type']=='text') {
	    if ($command == '#aboutpuy') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(

										'type' => 'text',					
										'text' => '「 About PUY 」

EN : [ This bot Made by Mkhadaffy ]
The Beginning of this Bot Comes from Rynda, Im just Reworked This!
Of Course Special Thanks To Allah SWT, Ryndaaaaa, And the Friends Around Me!

ID : [ Bot ini Dibuat oleh Mkhadaffy ]
Awal Bot Ini Berasal dari Rynda, Saya Hanya Menrakit Ini!
Terima Kasih Kepada Allah SWT, Rynda, Dan Teman - Teman Di Sekitar Saya!

Mkhadaffy : https://line.me/ti/p/~heefpuy
PUY : https://line.me/ti/p/~@kxh8977j
￼©Heefpuy'
									)
							)
						);
				
	}
}
if($message['type']=='text') {
	    if ($command == '#issues') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(

										'type' => 'text',					
										'text' => '「 Ask a Problem 」

➥[EN : Jika ada yang ingin ditanyakan bisa hubungi admin / komen di postingan akhir]
➥[ID : If Anyone Wants to be Asked Can contact the Admin / Comment in the Last Post]

Mkhadaffy : https://line.me/ti/p/~heefpuy
PUY : https://line.me/ti/p/~@kxh8977j
©Heefpuy'
									)
							)
						);
				
	}
}
//fitur fs
if($message['type']=='text') {
	    if ($command == '#fansign') {
        $result = fansign($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $result,
                    'previewImageUrl' => $result
                )
            )
        );
    }
}
//fitur qr
if($message['type']=='text') {
	    if ($command == '#qr') {
        $result = qrcode($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $result,
                    'previewImageUrl' => $result
                )
            )
        );
    }
}
//fitur zodiak
if($message['type']=='text') {
	    if ($command == '#zodiak') {
        $result = zodiak($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur replymsg
if($message['type']=='text') {
	    if ($command == 'Halo' || $command == 'Hai' || $command == 'Woi' || $command == 'Bot' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'iya kak? Ketik #menu untuk info perintah Puy atau ketik #about untuk info Puy, '.$profil->displayName
                )
            )
        );
    }
}
//fitur pstore
if($message['type']=='text') {
	    if ($command == '#playstore') {

        $result = ps($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }

}
//fitur manga
if($message['type']=='text') {
	    if ($command == '#manga') {
        $result = manga($options);
        $altText = "Title : " . $result['title'];
        $altText .= "\n\n" . $result['desc'];
        $altText .= "\nMAL Page : https://myanimelist.net/manga/" . $result['id'];
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'template',
                    'altText' => $altText,
                    'template' => array(
                        'type' => 'buttons',
                        'title' => $result['title'],
                        'thumbnailImageUrl' => $result['image'],
                        'text' => $result['desc'],
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => 'Baca Sinopsis-nya',
                                'data' => 'action=add&itemid=123',
                                'text' => '/manga-syn' . $options
                            ),
                            array(
                                'type' => 'uri',
                                'label' => 'Website MAL',
                                'uri' => 'https://myanimelist.net/manga/' . $result['id']
                            )
                        )
                    )
                )
            )
        );
    }
}
//fitur sinopsis manga
if($message['type']=='text') {
	    if ($command == '#manga-syn') {

        $result = manga_syn($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur waktu
if($message['type']=='text') {
	    if ($command == '#waktu') {
        $result = waktu($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur kata 
if($message['type']=='text') {
	    if ($command == '#katakan') {
        $result = say($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur definisi
if ($message['type'] == 'text') {
    if ($command == '#definisi') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Definisi : ' . urb_dict($options)
                )
            )
        );
    }
}
//fitur yt-get
if($message['type']=='text') {
	    if ($command == '/ytget') {
        $result = ytdownload($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => ytdownload($options)
                )
            )
        );
    }
}
//fitur gambar kiblat
if($message['type']=='text') {
	    if ($command == '#qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}

if($message['type']=='text') {
	    if ($command == '#carigambar') {
        $result = google_image($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '#gambarneon') {
        $result = image_neon($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}

if($message['type']=='text') {
	    if ($command == '#bodybuilder') {
        $result = bodybuilder($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}

if($message['type']=='text') {
	    if ($command == '#acaratv') {
        $result = jadwaltv();
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur pray
if($message['type']=='text') {
	    if ($command == '#jshalat') {
        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur twitt
if($message['type']=='text') {
	    if ($command == '/twitter') {
        $result = twitter($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur cuaca
if($message['type']=='text') {
	    if ($command == '#cuaca') {
        $result = cuaca($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur cuaca2
if($message['type']=='text') {
	    if ($command == '#weather') {
        $result = weatherr($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
