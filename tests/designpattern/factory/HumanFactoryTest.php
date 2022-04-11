<?php

namespace designpattern\factory;

use Phello\HelloPhp\designpattern\factory\HumanFactory;
use PHPUnit\Framework\TestCase;

class HumanFactoryTest extends TestCase
{
    public function testFactory()
    {
        $man = HumanFactory::getInstance(HumanFactory::MAN);
        $this->assertEquals('Adam', $man->name);

        $woman = HumanFactory::getInstance(HumanFactory::WOMAN);
        $this->assertEquals('Eve', $woman->name);

        $playwright = HumanFactory::getInstance(HumanFactory::PLAYWRIGHT);
        $this->assertEquals('Shakespeare', $playwright->name);

        $man = HumanFactory::getInstance(HumanFactory::MAN);
        $this->assertEquals('eat', $man->eat());
    }
}
