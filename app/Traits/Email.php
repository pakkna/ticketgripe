<?php

namespace App\Traits;

use App\ContactUs;
use Illuminate\Support\Facades\Validator;

trait Email
{
    /*
     * Send Drafts Email===============
     */
    private function send_email($email, $sub, $msg)
    {
        $sub    = $sub;
        $msg    = $msg;
        $from   = "admin@ticketgripe.com";

        $msgBody  = '<html><body>';

        $msgBody .=  "$msg" . '<br><br>';

        $msgBody .= '</html></body>';

        $headers  = "Form: " . strip_tags($from) . "\r\n";
        $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $isSuccess = mail($email, $sub, $msgBody, $headers);

        return $isSuccess;
    }

    
}
