<?php

namespace spec\Scoringline\GoogleAppsApi;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GoogleAppsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Scoringline\GoogleAppsApi\GoogleApps');
    }

    function it_should_take_options()
    {
        $this->beConstructedWith([
            'base_url'   => 'https://www.googleapis.com',
            'user_agent' => 'Scoringline/GoogleAppsApi',
        ]);
    }
}
