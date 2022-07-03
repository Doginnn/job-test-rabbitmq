<?php

namespace App\Controller;

use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SendAction
{
    /**
     * @param Request $request
     * @param ProducerInterface $sendProducer
     * @return JsonResponse
     * @Route(name="send_post", methods={"POST"}, path="/send")
     */
    public function __invoke(Request $request, ProducerInterface $sendProducer)
    {
        $content = $request->getContent();

        $sendProducer->publish($content, 'job-send');

        return new JsonResponse('Succes job-send!', Response::HTTP_OK);
    }
}
