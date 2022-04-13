<?php

namespace str;

use Phello\HelloPhp\str\StringBuffer;
use PHPUnit\Framework\TestCase;

/**
 * {@code StringBufferTest}Test
 *
 * @author weichangjun
 * @date 2022/04/13
 * @since 1.0.0
 */
class StringBufferTest extends TestCase
{

    public function testAppend()
    {
        $buffer = new StringBuffer();

        $params = [
            "product_id" => "389238",
            "user_id" => "29389",
            "content" => "newproductmask",
            "environment" => "test",
        ];

        foreach ($params as $key => $value) {
            $join = $buffer->join($key, $value);
            $buffer->append($join);
        }
        $toString = $buffer->toString("&");
        $toSortString = $buffer->toSortString("&");

        $this->assertEquals("product_id=389238&user_id=29389&content=newproductmask&environment=test", $toString);
        $this->assertEquals("content=newproductmask&environment=test&product_id=389238&user_id=29389", $toSortString);
    }

}
