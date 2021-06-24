<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ChannelController extends AbstractController
{
    protected const CANAL_SPORT_1 = "Canal+ Sport";
    protected const EUROSPORT_1 = "Eurosport 1";
    protected const EUROSPORT_2 = "Eurosport 2";
    protected const EQUIPE_21 = "Equipe 21";
    protected const BEIN_1 = "beIN 1";
    protected const BEIN_2 = "beIN 2";
    protected const BEIN_3 = "beIN 3";

    protected static function curlAndParseStreamingChannel(string $channel) {

        switch ($channel) {
            case self::CANAL_SPORT_1:
                $endPoint = "canal_sport-1";
                break;
            case self::EUROSPORT_1:
                $endPoint = "eurosport_1";
                break;
            case self::EUROSPORT_2:
                $endPoint = "eurosport_2";
                break;
            case self::EQUIPE_21:
                $endPoint = "equipe_21";
                break;
            case self::BEIN_1:
                $endPoint = "bein_1-1";
                break;
            case self::BEIN_2:
                $endPoint = "bein_2";
                break;
            case self::BEIN_3:
                $endPoint = "bein_3";
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
