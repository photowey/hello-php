<?php

namespace Phello\HelloPhp\designpattern\singleton;

/**
 * {@code King}
 * 单例模式
 *
 * @author weichangjun
 * @date 2022/04/06
 * @since 1.0.0
 */
class King
{
    /**
     * 三私一公
     */

    /**
     * 私有化 - 实例对象
     * @var $INSTANCE
     */
    private static $INSTANCE = NULL;

    /**
     * 私有化构造函数
     */
    private function __construct()
    {
    }

    /**
     * 不允许 {@code clone}
     * @return void
     */
    private function __clone()
    {

    }

    public static function getInstance(): King
    {
        if (!(self::$INSTANCE instanceof self)) {
            self::$INSTANCE = new self();
        }

        return self::$INSTANCE;
    }
}
