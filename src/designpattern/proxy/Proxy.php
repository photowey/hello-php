<?php

namespace Phello\HelloPhp\designpattern\proxy;

/**
 * {@code Proxy}
 * Proxy 代理模式
 *
 * @author weichangjun
 * @date 2022/04/06
 * @since 1.0.0
 */
class Proxy implements Subject
{

    private $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public function run(): string
    {
        $response = $this->before();
        $response .= $this->subject()->run();
        $response .= $this->after();

        return $response;
    }

    private function subject(): Subject
    {
        return $this->subject;
    }

    private function before(): string
    {
        return "pre:";
    }

    private function after(): string
    {
        return ":post";
    }

}
