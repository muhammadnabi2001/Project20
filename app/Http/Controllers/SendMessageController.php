<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class SendMessageController extends Controller
{
    public function index()
    {
        // dd(123);
        return view('SendMessage.index');
    }
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);
        // dd($request->all());
        try {
            $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
            $channel = $connection->channel();

            $channel->queue_declare('hello', false, true, false, false);

            // Formadan kelgan ma’lumot
            $messageBody = $request->input('message');
            $msg = new AMQPMessage($messageBody);

            $channel->basic_publish($msg, '', 'hello');

            $channel->close();
            $connection->close();
            return redirect()->back()->with('success','Xabar RabbitMq ga yuborildi');
            // return response()->json(['success' => true, 'message' => 'Xabar RabbitMQ ga yuborildi!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
