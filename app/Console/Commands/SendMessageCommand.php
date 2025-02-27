<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class SendMessageCommand extends Command
{
    protected $signature = 'rabbitmq:publish';
    protected $description = 'Command description';

    public function handle()
    {
        try {
            $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
            $channel = $connection->channel();

            $channel->queue_declare('hello', false, true, false, false);

            $msg = new AMQPMessage('Salom meni xabarimni Xabar degan table ga yoz');
            $channel->basic_publish($msg, '', 'hello');

            echo " [x] Sent 'Salom meni xabarimni Xabar degan table ga yoz!'\n";

            $channel->close();
            $connection->close();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}
