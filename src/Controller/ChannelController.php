<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ChannelController extends AbstractController
{
    protected const EUROSPORT_1 = "Eurosport 1";
    protected const EUROSPORT_2 = "Eurosport 2";

    protected static function curlAndParseStreamingChannel(string $channel) {

        switch ($channel) {
            case self::EUROSPORT_1:
                $endPoint = "eurosport_1";
                break;
            case self::EUROSPORT_2:
                $endPoint = "eurosport_2";
                break;
            default:
                $endPoint = "error";
                break;
        }
        //Récupérer le contenu de la page Web à partir de l'url.
        $url = "https://channelstream.watch/" . $endPoint . ".php";

        // Initialisez une session CURL.
        $ch = curl_init();

        // Récupérer le contenu de la page
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Saisir l'URL et la transmettre à la variable.
        curl_setopt($ch, CURLOPT_URL, $url);

        //Désactiver la vérification du certificat puisque waytolearnx utilise HTTPS
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Exécutez la requête
        $result = curl_exec($ch);
        preg_match_all(
            '/.*(iframe).*/',
            $result,
            $matches,
            PREG_PATTERN_ORDER
        );

        return $matches[0][0];
    }

    public function index(): Response
    {
        return $this->render('channel/index.html.twig', [
            'title' => 'Aide',
        ]);
    }
}
