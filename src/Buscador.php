<?php

namespace Pantojavii\BuscadorDeCursos {

    use GuzzleHttp\ClientInterface;
    use Symfony\Component\DomCrawler\Crawler;

    class Buscador
    {
        private $client;
        private $crawler;
        public function __construct(ClientInterface $httpClient, Crawler $crawler)
        {
            $this->client = $httpClient;
            $this->crawler = $crawler;
        }

        public function buscar(string $url): array
        {
            $resposta = $this->client->request('GET', $url);

            $html  = $resposta->getBody();
            $this->crawler->addHtmlContent($html);

            $elementorCursos = $this->crawler->filter('span.card-curso__nome');
            $cursos = [];

            foreach ($elementorCursos as $elemento) {
                $cursos[] = $elemento->textContent;
            }

            return $cursos;
        }
    }
}
