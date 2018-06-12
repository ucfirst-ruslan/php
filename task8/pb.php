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

	$uagent = "MOT-MPx220/1.470 Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; Smartphone; 176x220)";
	$ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   // возвращает веб-страницу
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); // таймаут соединения
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);        // таймаут ответа

    $content = curl_exec($ch); // в случае удачи возвращает контент

	$info = curl_getinfo($ch);
	echo '<pre>';
	var_dump($info);
	echo'</pre>';

    curl_close($ch); // закрываю сеанс.

    // Декодирование json. Возвращает многомерный массив.
    // Для доступа использовать $array[0]['ccy']
    //$json = json_decode($content, true);

    //return $json;
//<div style="padding:0 0 10px 1px" class="web_result">

	$doc = new DOMDocument();
	$doc->loadHTML($content, LIBXML_NSCLEAN);
	echo $doc->saveHTML();

$books = $doc->getElementsByTagName('web_result');
foreach ($books as $book) {
	echo $book->nodeValue, PHP_EOL;
}



//echo $content;

