<?php

namespace spec\Scoringline\GoogleAppsApi\Http\Auth;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiAuthSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Scoringline\GoogleAppsApi\Http\Auth\ApiAuth');
    }

    function it_should_throw_an_exception_when_options_are_missing()
    {
        $this->shouldThrow('Nekland\BaseApi\Exception\MissingOptionException')->duringSetOptions([]);
    }
}
