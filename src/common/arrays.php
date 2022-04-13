<?php

/**
 * {@code arrays}
 *
 * @author weichangjun
 * @date 2022/04/13
 * @since 1.0.0
 */

if (!function_exists('array_contains')) {
    /**
     * 判断 一个数组中是否包含指定对象
     * @param array $haystack 数组
     * @param mixed | string $needle 指定对象
     * @return bool
     */
    function array_contains(array $haystack = array(), $needle): bool
    {
        return in_array($needle, $haystack);
    }
}
