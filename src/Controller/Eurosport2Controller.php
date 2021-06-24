<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class Eurosport2Controller extends ChannelController
{
    public function index(): Response
    {
        $content = self::curlAndParseStreamingChannel(self::EUROSPORT_2);

        return $this->render("channel/streaming.html.twig", [
            'title' => self::EUROSPORT_2,
            'stream' => $content
        ]);
    }
}
