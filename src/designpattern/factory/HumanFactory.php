<?php

namespace Phello\HelloPhp\designpattern\factory;

/**
 * {@code HumanFactory}
 * 工厂模式
 *
 * @author weichangjun
 * @date 2022/04/06
 * @since 1.0.0
 */
class HumanFactory
{
    public const  MAN = 1 << 0;
    public const WOMAN = 1 << 1;
    public const PLAYWRIGHT = 1 << 2;

    public static function getInstance(int $symbol)
    {
        switch ($symbol) {
            case HumanFactory::MAN:
                return new Man();
            case HumanFactory::WOMAN:
                return new Woman();
            case HumanFactory::PLAYWRIGHT:
                return new Playwright();
            default:
                return NULL;
        }
    }

}
