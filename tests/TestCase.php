<?php
namespace Tests;

use Mockery as m;

class TestCase extends \PHPUnit_Framework_TestCase
{
	public function setUp()
    {
        m::close();
    }
}
