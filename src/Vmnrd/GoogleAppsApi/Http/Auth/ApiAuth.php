<?php declare(strict_types=1);
namespace Vmnrd\GoogleAppsApi\Http\Auth;

use Namshi\JOSE\JWS;
use Nekland\BaseApi\Exception\MissingOptionException;
use Nekland\BaseApi\Http\AbstractHttpClient;
use Nekland\BaseApi\Http\Auth\AuthStrategyInterface;
use Nekland\BaseApi\Http\Event\RequestEvent;
use Nekland\BaseApi\Http\Request;

class ApiAuth implements AuthStrategyInterface
{
    /**
     * @var array
     */
    private $options = [
        'token_path' => 'https://www.googleapis.com/oauth2/v3/token',
    ];

    /**
     * @var AbstractHttpClient
     */
    private $client;

    /**
     * @param RequestEvent $requestEvent
     */
    public function auth(RequestEvent $requestEvent): void
    {
        $request = $requestEvent->getRequest();

        if (!$request->hasHeader('Authorization')) {
            $this->client = $requestEvent->getClient();
            $token = $this->getToken();
            $request->setHeader('Authorization', 'Bearer ' . $token);
        }
    }

    /**
     * @return string
     */
    private function getToken()
    {
        $jws = new JWS('RS256');
        $jws->setPayload(array(
            'iss'   => $this->getOption('email'),
            'sub'   => $this->getOption('user_email'),
            'scope' => $this->getOption('scope'),
            'aud'   => $this->getOption('token_path'),
            'exp'   => time() + 60,
            'iat'   => time()
        ));

        $jws->sign($this->getPrivateKey());

        $response = $this->client->send(new Request(
            'post',
            $this->getOption('token_path'),
            [
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion' => $jws->getTokenString(),
                'scope' => $this->getOption('scope')
            ],
            ['Content-Type' => 'application/x-www-form-urlencoded']
        ), false);

        $finalArray = json_decode($response, true);

        return $finalArray['access_token'];
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    private function getPrivateKey()
    {
        $file            = $this->getOption('cert_file');
        $res             = [];
        $brutCertificate = file_get_contents($file);

        $worked = openssl_pkcs12_read($brutCertificate, $res, $this->getOption('cert_password', 'notasecret'));

        if ($worked) {
            return $res['pkey'];
        }

        throw new \Exception(sprintf('The certificate "%" looks wrong PHP cannot open it.', $file));
    }

    /**
     * @param $option
     * @param null $default
     * @return null
     * @throws \Exception
     */
    private function getOption($option, $default=null)
    {
        if (isset($this->options[$option])) {
            return $this->options[$option];
        }

        if (null !== $default) {
            return $default;
        }

        throw new \Exception(sprintf('The option "%s" is missing on the configuration of "%".', $option, get_class($this)));
    }

    /**
     * @param array $options
     * @return $this
     * @throws MissingOptionException
     */
    public function setOptions(array $options)
    {
        if (
            empty($options['cert_file']) ||
            empty($options['email']) ||
            empty($options['user_email']) ||
            empty($options['scope'])
        ) {
            throw new MissingOptionException('Missing options');
        }

        $this->options = array_merge($this->options, $options);

        return $this;
    }
}
