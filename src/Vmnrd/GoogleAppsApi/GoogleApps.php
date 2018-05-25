<?php declare(strict_types=1);
namespace Vmnrd\GoogleAppsApi;

use Vmnrd\GoogleAppsApi\Api\Drive;
use Vmnrd\GoogleAppsApi\Api\Gmail;
use Nekland\BaseApi\ApiFactory;
use Nekland\BaseApi\Http\HttpClientFactory;

/**
 * Class GoogleApps
 * @method Gmail getGmailApi()
 * @method Drive getDriveApi()
 */
class GoogleApps extends ApiFactory
{
    /**
     * @var array
     */
    private $options = [
        'base_url'   => 'https://www.googleapis.com',
        'user_agent' => 'Vmnrd/GoogleAppsApi',
    ];

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);

        parent::__construct(new HttpClientFactory($this->options));

        $this->getAuthFactory()->addNamespace('Vmnrd\GoogleAppsApi\Http\Auth');
    }

    /**
     * @return array
     */
    protected function getApiNamespaces()
    {
        return ['Vmnrd\GoogleAppsApi\Api'];
    }
}
