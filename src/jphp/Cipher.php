<?php

namespace Phello\HelloPhp\jphp;

use Exception;

/**
 * {@code Cipher}
 *
 * @author weichangjun
 * @date 2022/06/01
 * @since 1.0.0
 */
class Cipher
{

    private $privateKey;
    private $publicKey;

    public function __construct($privateKey, $publicKey)
    {
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
    }

    /**
     * @throws Exception
     */
    public function encrypt($data): string
    {
        if (!extension_loaded('openssl')) {
            throw new Exception("Cipher::not support openssl module");
        };

        $privateKey = openssl_pkey_get_private($this->privateKey);
        $publicKey = openssl_pkey_get_public($this->publicKey);

        if (!$privateKey) {
            throw new Exception("Cipher:: incorrect private key");
        }
        if (!$publicKey) {
            throw new Exception("Cipher:: incorrect public key");
        }

        if (openssl_public_encrypt($data, $encrypted, $publicKey)) {
            return base64_encode($encrypted);
        }

        throw new Exception("Cipher:: encrypt failed");
    }

    public function decrypt($encryptedBase64): string
    {
        $encrypted = base64_decode($encryptedBase64);
        $privateKey = openssl_pkey_get_private($this->privateKey);
        $crypto = "";
        foreach (str_split($encrypted, 128) as $chunk) {
            openssl_private_decrypt($chunk, $decryptData, $privateKey);
            $crypto .= $decryptData;
        }

        return $crypto;
    }
}
