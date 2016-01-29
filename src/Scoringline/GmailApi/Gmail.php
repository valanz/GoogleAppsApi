<?php

namespace Scoringline\GmailApi;

use Scoringline\GmailApi\Api\Email;
use Nekland\BaseApi\ApiFactory;
use Nekland\BaseApi\Http\HttpClientFactory;

/**
 * Class Gmail
 * @method Email getEmailApi()
 */
class Gmail extends ApiFactory
{
    /**
     * @var array
     */
    private $options = [
        'base_url'   => 'https://www.googleapis.com',
        'user_agent' => 'Scoringline/GmailApi',
    ];

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);

        parent::__construct(new HttpClientFactory($this->options));

        $this->getAuthFactory()->addNamespace('Scoringline\GmailApi\Http\Auth');
    }

    /**
     * @return array
     */
    protected function getApiNamespaces()
    {
        return ['Scoringline\GmailApi\Api'];
    }
}
