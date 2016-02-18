#GoogleAppsApi

##PHP wrapper for the Google apps API

###Available Google apps

- [Gmail](#gmail)
- [Drive](#drive)

###Authentication

```php
    <?php

    require "vendor/autoload.php";

    use Scoringline\GoogleAppsApi\GoogleApps;

    $api = new GoogleApps();
    
    $api->useAuthentication('ApiAuth', [
        'cert_file' => 'my-cert-file.p12',
        'email' => 'foobar@baz.iam.gserviceaccount.com',
        'user_email' => 'john@doe.com',
        'scope' => 'https://www.googleapis.com/auth/gmail.readonly',
    ]);
```

###Gmail

```php
    $messages = $api->getEmailApi()->getMessages(['maxResults' => 2]);

    foreach ($messages['messages'] as $message) {
        $data = $api->getEmailApi()->getMessage($message['id']);
    }
```

###Drive

```php
    $files = $api->getDriveApi()->getFiles();
```
