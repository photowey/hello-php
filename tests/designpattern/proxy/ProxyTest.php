<?php

namespace designpattern\proxy;

use Phello\HelloPhp\designpattern\proxy\Proxy;
use Phello\HelloPhp\designpattern\proxy\RealSubject;
use PHPUnit\Framework\TestCase;

class ProxyTest extends TestCase
{

    public function testProxy()
    {
        $subject = new RealSubject("sharkchili");

        $proxy = new Proxy($subject);
        $run = $proxy->run();
        $this->assertEquals("pre:sharkchili.run():post", $run);
    }

}
