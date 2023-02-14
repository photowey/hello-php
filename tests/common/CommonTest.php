<?php

namespace common;

use Phello\HelloPhp\str\StringBuffer;
use PHPUnit\Framework\TestCase;
use function array_contains;
use function is_blank;
use function is_not_blank;

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

    public function testModeCode()
    {
        $authCode = "133693492194839689";
        $modeCodeByAuthCode = $this->getModeCodeByAuthCode($authCode);
        $this->assertTrue(is_not_blank($modeCodeByAuthCode));
    }

    public function testInnerSign()
    {

        $buffer = new StringBuffer();

        $params = [
            "appId" => "b79613196d1899c4c18d76786f55c123",
            "timestamp" => "1658280263000",
            "nonceStr" => "9f0ceeeab639f64a9058a06a4bb5c7fc",
        ];

        foreach ($params as $key => $value) {
            $join = $buffer->join($key, $value);
            $buffer->append($join);
        }

        $toSortString = $buffer->toSortString("&") . "&key=" . "414003edb6397fe126afe98c20159cc2";

        // appId=b79613196d1899c4c18d76786f55c123&nonceStr=9f0ceeeab639f64a9058a06a4bb5c7fc&timestamp=1658280263000&key=414003edb6397fe126afe98c20159cc2
        print_r($toSortString . "\n");

        $md5 = md5($toSortString);
        // 65465844002cac57242b699d24a74fc8
        print_r($md5 . "\n");

        $base64_encode = base64_encode($md5);
        // NjU0NjU4NDQwMDJjYWM1NzI0MmI2OTlkMjRhNzRmYzg=
        print_r($base64_encode . "\n");

        $this->assertTrue(true);
    }

    public static function getModeCodeByAuthCode(string $auth_code)
    {
        $start = substr($auth_code, 0, 2);
        $len = mb_strlen($auth_code);
        if (preg_match('/^fp[0-9A-Za-z]{33}$/', $auth_code)) { // 支付宝刷脸设备【已知为海马】
            return 'alipay';
        } else if ($len == 18 && in_array($start, [10, 11, 12, 13, 14, 15])) {
            return 'weixin';
        } else if ((16 <= $len) && ($len <= 24) && in_array($start, [25, 26, 27, 28, 29, 30])) {
            return 'alipay';
        } else if ($start == '62' && $len == 19) {
            //京东（舍弃） 银联云闪付
            return 'unionpay';
        } else if ($start == '20') {
            //三峡付
            return 'threebank';
        } else {
            return false;
        }
    }

    /**
     * @return string[]
     */
    public function dataProvider(): array
    {
        $stack = [['device1'], ['device2']];
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @return string[]
     * @dataProvider dataProvider
     */
    public function testDataProvider($device): array
    {
        $this->assertNotNull($device);
        print_r($device);

        return [$device];
    }

    /**
     * @return string[]
     */
    public function testDevices(): array
    {
        $stack = [['device1'], ['device2']];
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @param string $device
     * @return int
     * @depends testDevices
     */
    public function testApply($device): int
    {
        $this->assertNotEmpty($device);
        foreach ($device as $key => $value) {
            if ($value == "device1") {
                return 0;
            } else {
                return 1;
            }
        }

        return 0;
    }

    /**
     * @param $result
     * @depends testApply
     */
    public function testConsumer($result)
    {
        print_r($result);
        $this->assertTrue($result >= 0);
    }
}
