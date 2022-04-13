<?php

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst(string $string, string $encoding = 'UTF-8'): string
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $rest = mb_substr($string, 1, null, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $rest;
    }
}

if (!function_exists('mb_ucwords')) {
    function mb_ucwords(string $string, string $encoding = 'UTF-8'): string
    {
        $words = preg_split("/\s/u", $string, -1, PREG_SPLIT_NO_EMPTY);

        $titelized = array_map(function ($word) use ($encoding) {
            return mb_ucfirst($word, $encoding);
        }, $words);

        return implode(' ', $titelized);
    }
}

if (!function_exists('to_camel_case')) {
    function to_camel_case(string $string): string
    {
        $string = str_replace('-', ' ', $string);
        $string = str_replace('_', ' ', $string);
        $string = ucwords(strtolower($string));

        return str_replace(' ', '', $string);
    }
}

if (!function_exists('pstarts_with')) {
    /**
     * 是否以 指定的字串 {@code $needle} 开始
     * @param string $haystack 原始串
     * @param string $needle 指定的子串
     * @return bool
     */
    function pstarts_with(string $haystack, string $needle): bool
    {
        return strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}

if (!function_exists('pends_with')) {
    /**
     * 是否以 指定的字串 {@code $needle} 结束
     * @param string $haystack 原始串
     * @param string $needle 指定的子串
     * @return bool
     */
    function pends_with(string $haystack, string $needle): bool
    {
        return $needle === '' || substr_compare($haystack, $needle, -strlen($needle)) === 0;
    }
}

if (!function_exists('pisClosure')) {
    /**
     * 是否为: 闭包-函数
     * @param $closure
     * @return bool
     */
    function pisClosure($closure): bool
    {
        return !empty($closure) && $closure instanceof Closure;
    }
}

if (!function_exists('is_blank')) {
    /**
     * 判断: 字符串是否为空
     * "" 或者 null 将被判定为: true
     * @param string | null $needle 指定字符串
     * @return bool
     */
    function is_blank(?string $needle): bool
    {
        return !is_not_blank($needle);
    }
}

if (!function_exists('is_not_blank')) {
    /**
     * 判断: 字符串是否不为空
     * 非("" 或者 null) 将被判定为: true
     * @param string | null $needle 指定字符串
     * @return bool
     */
    function is_not_blank(?string $needle): bool
    {
        return strlen($needle) > 0;
    }
}


