<?php ini_set('display_errors', 1);




//    $uagent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.1 Safari/603.1.30";



//        $url= 'https://query1.finance.yahoo.com/v7/finance/quote?symbols=BZ=F';
//$url= 'https://query1.finance.yahoo.com/v7/finance/quote?symbols=CL=F';
//$url= 'https://query1.finance.yahoo.com/v7/finance/quote?symbols=EURUSD=X';
//
//$url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=rub&date='.date("Ymd").'&json';

    // API
    //https://bank.gov.ua/control/uk/publish/article?art_id=38441973
    //https://api.privatbank.ua/#p24/gold
	$url = 'https://www.google.com/search?q=test+server';

	$uagent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.183 Safari/537.36 Vivaldi/1.97.1177.5";
	$ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com/");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);        // таймаут ответа

    $content = curl_exec($ch); // в случае удачи возвращает контент

	$info = curl_getinfo($ch);
//	echo '<pre>';
//	var_dump($info);
//	echo'</pre>';

    curl_close($ch); // закрываю сеанс.

    // Декодирование json. Возвращает многомерный массив.
    // Для доступа использовать $array[0]['ccy']
    //$json = json_decode($content, true);

    //return $json;
//<div style="padding:0 0 10px 1px" class="web_result">   universal

$data_url = $content;
preg_match_all("/<cite class=\"iUh30\">(.+?)<\/cite>/is",$data_url,$matches_url);
preg_match_all('/<h3 class="r">(.+?)<\/h3>/is',$data_url,$matches_title);
preg_match_all('/<span class="st">(.+?)<\/span>/is',$data_url,$matches_description);

preg_match (https?|ftp)://.[-a-zA-Z0-9:!*%_\–+.~#?()^;,&//=]+

$text_title = implode("[space]", $matches_title[0]);

$text_title = strip_tags($text_title);

$text_title_array = explode("[space]", $text_title);




$description = implode("[space]",$matches_description[0]);
$description = strip_tags($description);
$description_array = explode("[space]", $description);

$url_array = $matches_url[1];

$final_array['titles'] = $text_title_array;
$final_array['urls'] = $url_array;
$final_array['descriptions'] = $description_array;


echo '<pre>';
	print_r($final_array);
echo '</pre>' ;

