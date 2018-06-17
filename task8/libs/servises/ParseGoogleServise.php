<?php

class ParseGoogleServise
{
	public function parse($content)
	{
		preg_match_all("/<cite>(.+?)<\/cite>/is", $content, $matchUrl);
		preg_match_all('/<h3 class="r">(.+?)<\/h3>/is', $content, $matchTitle);
		preg_match_all('/<span class="st">(.+?)<\/span>/is', $content, $matchDesc);

		$title = implode("[space]", $matchTitle[0]);
		preg_match_all('/<a href="(.*?)"/s',$title, $url);
		$title = strip_tags($title);
		$titleArray = explode("[space]", $title);

		$desc = implode("[space]",$matchDesc[0]);
		$desc = strip_tags($desc);
		$descArray = explode("[space]", $desc);

		$urlArray = $matchUrl[1];
		// очищаю результат
		$url[1] = str_replace("/url?q=http", "http", $url[1]);

		$result = '';
		$count = count($titleArray);
		for ($i=0; $i < $count; $i++)
		{
			$result .= '<div class="container">';
			$result .= '<div class="wrap-content">';
			$result .= '<div class="data">';
			$result .= '<div class="title">';
			$result .= '<h3><a href="';
			$result .= $url[1][$i];
			$result .= '">';
			$result .= $titleArray[$i];
			$result .= '</a></h3>
			</div>

			<div class="visible-link">';
			$result .= $urlArray[$i];
			$result .= '</div>

			<div class="description">';
			$result .= $descArray[$i];
			$result .= '</div>
			</div>
			</div>
			</div>';
		}

		return $result;
	}
}