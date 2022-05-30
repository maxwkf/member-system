<?php
namespace App\Services;


use MailchimpMarketing\ApiClient;


class MailchimpNewsletter implements Newsletter {
    
    public function __construct(protected ApiClient $client, protected string $foo) {
        
    }

    // public function getClient() {
    //     return (new ApiClient())->setConfig([
    //         'apiKey' => config('services.mailchimp.key'),
    //         'server' => config('services.mailchimp.server'),
    //     ]);
    // }
    
    public function subscribe(string $email, string $list = null) {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);

    }
}