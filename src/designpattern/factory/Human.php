<?php

namespace Phello\HelloPhp\designpattern\factory;

/**
 * {@code Human}
 * 根接口
 *
 * @author weichangjun
 * @date 2022/04/06
 * @since 1.0.0
 */
class Human
{
    public function eat(): string
    {
        return 'eat';
    }
}
