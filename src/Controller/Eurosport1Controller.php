<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class Eurosport1Controller extends ChannelController
{
    public function index(): Response
    {
        $content = self::curlAndParseStreamingChannel(self::EUROSPORT_1);

        return $this->render("channel/streaming.html.twig", [
            'title' => self::EUROSPORT_1,
            'stream' => $content
        ]);
    }
}
