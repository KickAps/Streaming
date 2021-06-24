<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class BeIN2Controller extends ChannelController
{
    public function index(): Response
    {
        $content = self::curlAndParseStreamingChannel(self::BEIN_2);

        return $this->render("channel/streaming.html.twig", [
            'title' => self::BEIN_2,
            'stream' => $content
        ]);
    }
}
