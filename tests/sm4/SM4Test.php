<?php

namespace sm4;

use Phello\HelloPhp\sm4\SM4;
use PHPUnit\Framework\TestCase;

/**
 * {@code SM4Test}
 * ${DESCRIPTION}
 *
 * @author weichangjun
 * @date 2022/10/12
 * @since 1.0.0
 */
class SM4Test extends TestCase
{

    /**
     * @throws \Exception
     */
    public function testEncrypt()
    {
        $json = "1234567891abcdef1234567891abcdef1234567891abcdef1234567891abcdef";
        //自定义的32位16进制秘钥
        $key = "e99c4e6ac3af384a3cf9d605fbe029fa";

        $sm4 = new SM4();
        $encrypt = $sm4->setKey($key)->encryptData($json);
        print_r($encrypt . "\n");
        $decrypt = $sm4->decryptData($encrypt);
        print_r($decrypt);
        $this->assertEquals($json, $decrypt);
    }
}
