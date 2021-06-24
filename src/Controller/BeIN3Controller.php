<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class BeIN3Controller extends ChannelController
{
    public function index(): Response
    {
        $content = self::curlAndParseStreamingChannel(self::BEIN_3);

        return $this->render("channel/streaming.html.twig", [
            'title' => self::BEIN_3,
            'stream' => $content
        ]);
    }
}
