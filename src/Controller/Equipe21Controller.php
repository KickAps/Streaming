<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class Equipe21Controller extends ChannelController
{
    public function index(): Response
    {
        $content = self::curlAndParseStreamingChannel(self::EQUIPE_21);

        return $this->render("channel/streaming.html.twig", [
            'title' => self::EQUIPE_21,
            'stream' => $content
        ]);
    }
}