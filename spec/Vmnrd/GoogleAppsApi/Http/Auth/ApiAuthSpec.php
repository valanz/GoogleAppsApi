<?php declare(strict_types=1);
namespace spec\Vmnrd\GoogleAppsApi\Http\Auth;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiAuthSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType('Vmnrd\GoogleAppsApi\Http\Auth\ApiAuth');
    }

    public function it_should_throw_an_exception_when_options_are_missing(): void
    {
        $this->shouldThrow('Nekland\BaseApi\Exception\MissingOptionException')->duringSetOptions([]);
    }
}
