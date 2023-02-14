<?php

namespace aes;

use Phello\HelloPhp\aes\AESCryptor;
use PHPUnit\Framework\TestCase;

/**
 * {@code AesTest}
 *
 *
 * @author weichangjun
 * @date 2022/12/30
 * @since 1.0.0
 */
class AesTest extends TestCase
{

    public function testAES()
    {
        $data = "{\"wx_openId\":\"20220101\",\"zfb_openId\":\"20220102\",\"time\":\"1672296927749\",\"userId\":\"admin\"}";
        $key = "hZxcASVEMTPIZ8lWNGtQCA==";
        $encrypted_result = "Bk6hovTNjVe/XhDdztTKHtxoYdUp/F73tYKv7zjtK2kroLWFUHV1ViKRVr3MNAxtr/uv4f7t5cG/hToi9t6ZV9Wn41+uBNki5v414IC/uWaJ5zwNr39nX4gsDSR/N22e";

        $encrypted = $this->encrypt($data, $key);
        $this->assertEquals($encrypted_result, $encrypted);

        $aes_decrypt = $this->decrypt($encrypted, $key);
        $this->assertEquals($data, $aes_decrypt);

        $encryptor = new AESCryptor($key);

        $encrypt_short = $encryptor->encrypt_short($data);
        $this->assertEquals($encrypted_result, $encrypt_short);
        $decrypt = $encryptor->decrypt_short($encrypt_short);
        $this->assertEquals($data, $decrypt);
    }

    /**
     * AES-ECB
     * 加密
     *
     * @param string $data
     * @param string $key
     * @return string
     */
    public function encrypt(string $data, string $key): string
    {
        $encrypted = openssl_encrypt($data, 'aes-128-ecb', base64_decode($key), OPENSSL_RAW_DATA);
        return base64_encode($encrypted);
    }

    /**
     * AES-ECB
     * 解密
     *
     * @param string $encrypted
     * @param string $key
     * @return string
     */
    public function decrypt(string $encrypted, string $key): string
    {
        $encrypted = base64_decode($encrypted);
        return openssl_decrypt($encrypted, 'aes-128-ecb', base64_decode($key), OPENSSL_RAW_DATA);
    }
}
