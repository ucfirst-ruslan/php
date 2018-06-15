<?php

class ParseGoogleServise
{
	public function parse($content)
	{
		preg_match_all("/<cite class=\"iUh30\">(.+?)<\/cite>/is", $content, $matchUrl);
		preg_match_all('/<h3 class="r">(.+?)<\/h3>/is', $content, $matchTitle);
		preg_match_all('/<span class="st">(.+?)<\/span>/is', $content, $matchDesc);

		$title = implode("[space]", $matchTitle[0]);
		$title = strip_tags($title);
		$titleArray = explode("[space]", $title);


		$desc = implode("[space]",$matchDesc[0]);
		$desc = strip_tags($desc);
		$descArray = explode("[space]", $desc);

		$urlArray = $matchUrl[1];

		$contentArray['titles'] = $titleArray;
		$contentArray['urls'] = $urlArray;
		$contentArray['desc'] = $descArray;


		echo '<pre>';
		print_r($contentArray);
		echo '</pre>' ;

		return $contentArray;
	}
}