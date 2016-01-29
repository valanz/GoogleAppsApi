<?php

namespace spec\Scoringline\GmailApi;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GmailSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Scoringline\GmailApi\Gmail');
    }

    function it_should_take_options()
    {
        $this->beConstructedWith([
            'base_url'   => 'https://www.googleapis.com',
            'user_agent' => 'Scoringline/GmailApi',
        ]);
    }
}
