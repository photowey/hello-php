<?php

/**
 * {@code date}
 *
 * @author weichangjun
 * @date 2022/04/14
 * @since 1.0.0
 */

if (!function_exists('seconds')) {
    /**
     * 秒级时间戳
     */
    function seconds(): int
    {
        return time();
    }

}

if (!function_exists('current_time_millis')) {
    /**
     * 毫秒级时间戳
     * @return int
     */
    function current_time_millis(): int
    {
        return microtime(true) * 1000;
    }

}

if (!function_exists('handle_date_format')) {
    /**
     * 格式化: 当前时间
     * @param string $pattern 格式化 pattern
     * @return string
     */
    function handle_date_format(string $pattern): string
    {
        // "YmdHis"
        return date($pattern);
    }
}

