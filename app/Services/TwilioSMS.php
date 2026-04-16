<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class TwilioSMS
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(
            'AC6ec4c3946a04523407075f913ab1a15f',
            'ac9981dd90acf7e82925f3391483d7bc'
        );
    }


    public function sendSms($message)
    {
        $recipent = ['+14693838321'];
        // $recipent = ['+14693838321'];
//        $recipent = ['+8801845891962', '+8801677248045'];
        foreach ($recipent as $to) {
            try {
                $this->client->messages->create($to, [
                    'from' => '+18444827053',
                    'body' => $message,
                ]);

            } catch (\Exception $e) {
                Log::info("Error: " . $e->getMessage());
            }
        }

    }
}

?>
