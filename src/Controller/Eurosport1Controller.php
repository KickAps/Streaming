<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Eurosport1Controller extends AbstractController
{
    public function index(): Response
    {
        //Récupérer le contenu de la page Web à partir de l'url.
        $url = "https://channelstream.watch/eurosport_1.php";

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

        //Afficher le résultat
        //echo $matches[0][0];

        return $this->render('channel/eurosport1/index.html.twig', [
            'title' => 'Eurosport 1',
            'stream' => $matches[0][0]
        ]);
    }
}
