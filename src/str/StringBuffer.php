<?php

namespace Phello\HelloPhp\str;

/**
 * {@code StringBuffer}
 *
 * @author weichangjun
 * @date 2022/04/13
 * @since 1.0.0
 */
class StringBuffer
{
    private $buffer = array();

    private const DEFAULT_SEPARATOR = ",";
    private const DEFAULT_JOINER = "=";

    public function join(string $key, $value, $joiner = StringBuffer::DEFAULT_JOINER): string
    {
        return $key . $joiner . $value;
    }

    public function append(string $content): StringBuffer
    {
        $this->buffer[$content] = $content;

        return $this;
    }

    public function toString(string $separator = StringBuffer::DEFAULT_SEPARATOR): string
    {
        return implode($separator, $this->buffer);
    }

    public function toSortString(string $separator = StringBuffer::DEFAULT_SEPARATOR): string
    {
        $cloneArray = $this->cloneArray();
        ksort($cloneArray);
        return implode($separator, $cloneArray);
    }

    private function cloneArray(): array
    {
        return array_merge(array(), $this->buffer);
    }
}
