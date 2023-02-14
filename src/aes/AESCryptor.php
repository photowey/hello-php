<?php

namespace Phello\HelloPhp\aes;

/**
 * {@code AESCryptor}
 *
 *
 * @author weichangjun
 * @date 2022/12/30
 * @since 1.0.0
 */
class AESCryptor
{

    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encrypt_short($data)
    {
        return $this->encrypt($data, $this->key);
    }

    public function encrypt($data, $key)
    {
        $encrypted = openssl_encrypt($data, 'aes-128-ecb', base64_decode($key), OPENSSL_RAW_DATA);
        return base64_encode($encrypted);
    }

    public function decrypt_short($encrypted)
    {
        return $this->decrypt($encrypted, $this->key);
    }


    public function decrypt($encrypted, $key)
    {
        $encrypted = base64_decode($encrypted);
        return openssl_decrypt($encrypted, 'aes-128-ecb', base64_decode($key), OPENSSL_RAW_DATA);
    }

}
