<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/lib.php';

// URL for parsing
//$url = 'http://ananaska.com/vse-novosti/';





function getArticlesListFromCatalog($url)
{
// Получаем страницу
  $html = file_get_html($url);
  foreach ($html->find('a.read-more-link') as $linkToArticle) {
    echo $linkToArticle->href . PHP_EOL;
  }

  // recursion to next page
  if ($nextLink = $html->find('a.next', 0)) {
    getArticlesListFromCatalog($nextLink->href);
  }
}
getArticlesListFromCatalog('http://ananaska.com/vse-novosti/');

// исходный код страницы

