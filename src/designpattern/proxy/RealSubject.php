<?php

namespace Phello\HelloPhp\designpattern\proxy;

/**
 * {@code RealSubject}
 * RealSubject
 *
 * @author weichangjun
 * @date 2022/04/06
 * @since 1.0.0
 */
class RealSubject implements Subject
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function run(): string
    {
        return $this->name . ".run()";
    }

}
