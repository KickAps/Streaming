<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class BeIN1Controller extends ChannelController
{
    public function index(): Response
    {
        $content = self::curlAndParseStreamingChannel(self::BEIN_1);

        return $this->render("channel/streaming.html.twig", [
            'title' => self::BEIN_1,
            'stream' => $content
        ]);
    }
}
