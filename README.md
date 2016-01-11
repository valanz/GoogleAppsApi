#GmailApi

##PHP wrapper for the Gmail API

###Usage

```php
    <?php

    require "vendor/autoload.php";

    use Scoringline\GmailApi\Gmail;

    $api = new Gmail();
    
    $api->useAuthentication('ApiAuth', [
        'cert_file' => 'my-cert-file.p12',
        'email' => 'foobar@baz.iam.gserviceaccount.com',
        'user_email' => 'john@doe.com',
    ]);
    
    $messages = $api->getEmailApi()->getMessages(['maxResults' => 2]);
    
    foreach ($messages['messages'] as $message) {
        $data = $api->getEmailApi()->getMessage($message['id']);
    }

```
