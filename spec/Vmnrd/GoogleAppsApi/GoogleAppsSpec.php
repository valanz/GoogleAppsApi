<?php declare(strict_types=1);
namespace spec\Vmnrd\GoogleAppsApi;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GoogleAppsSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType('Vmnrd\GoogleAppsApi\GoogleApps');
    }

    public function it_should_take_options(): void
    {
        $this->beConstructedWith([
            'base_url'   => 'https://www.googleapis.com',
            'user_agent' => 'Vmnrd/GoogleAppsApi',
        ]);
    }
}
