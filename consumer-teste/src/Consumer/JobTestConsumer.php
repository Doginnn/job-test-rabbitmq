<?php

namespace App\Consumer;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class JobTestConsumer implements ConsumerInterface
{
    public function execute(AMQPMessage $msg)
    {
        dd($msg->getBody());
    }
}
