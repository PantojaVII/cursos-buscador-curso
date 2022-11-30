<?php
require 'vendor/autoload.php';
 

use Pantojavii\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/',  'verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar(url: '/cursos-online-programacao/php');

foreach ($cursos as $curso) {
     echo $curso . PHP_EOL;
}

mensagem("efetuando teste de files do composer");


?>