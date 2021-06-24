<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class CanalSport1Controller extends ChannelController
{
    public function index(): Response
    {
        $content = self::curlAndParseStreamingChannel(self::CANAL_SPORT_1);

        return $this->render("channel/streaming.html.twig", [
            'title' => self::CANAL_SPORT_1,
            'stream' => $content
        ]);
    }
}
