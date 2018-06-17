<?php


class UrlSendService
{
	public function getSearchPage($request)
	{
		$url = DEFAULT_URL.SEARCH_URL_PARAMETR.urlencode($request);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_USERAGENT, USERAGENT);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_REFERER, DEFAULT_URL);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		$content = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if (200 == $info['http_code'])
		{
			return $content;
		}

		return false;
	}
}