<?php

use PHPUnit\Framework\TestCase;

/**
 * {@code CommonTest}
 *
 * @author weichangjun
 * @date 2022/04/13
 * @since 1.0.0
 */
class CommonTest extends TestCase
{
    public function testStrLen()
    {
        $empty_string = "";
        $null_string = null;
        $existing = "hello";

        $empty_string_len = strlen($empty_string);
        $null_string_len = strlen($null_string);
        $hello_string_len = strlen($existing);

        $this->assertEquals(0, $empty_string_len);
        $this->assertEquals(0, $null_string_len);
        $this->assertEquals(5, $hello_string_len);
    }

    public function testIsBlank()
    {
        $empty_string = "";
        $null_string = null;
        $existing = "existing";

        $this->assertTrue(is_blank($empty_string));
        $this->assertTrue(is_blank($null_string));
        $this->assertFalse(is_blank($existing));
    }

    public function testIsNotBlank()
    {
        $empty_string = "";
        $null_string = null;
        $existing = "existing";

        $this->assertFalse(is_not_blank($empty_string));
        $this->assertFalse(is_not_blank($null_string));
        $this->assertTrue(is_not_blank($existing));

        $this->assertTrue(is_blank($empty_string));
        $this->assertTrue(is_blank($null_string));
        $this->assertFalse(is_blank($existing));
    }

    public function testArraysContains()
    {
        $this->assertTrue(array_contains(["hello", "world", "tom", "jerry"], "tom"));
        $this->assertFalse(array_contains(["lilei", "hanmeimei", "lucy", "lily"], "rose"));
    }
}
