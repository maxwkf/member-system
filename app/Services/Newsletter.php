<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter {


    public function subscribe(string $email, string $list = null) {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->getClient()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);

    }

    public function getClient() {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server'),
        ]);
    }
}