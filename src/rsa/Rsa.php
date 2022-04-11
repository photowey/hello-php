<?php

namespace Phello\HelloPhp\rsa;

use Exception;

/**
 * {@code Rsa}
 * Rsa
 *
 * @author weichangjun
 * @date 2022/04/06
 * @since 1.0.0
 */
class Rsa
{
    protected $publicKey;
    protected $privateKey;

    public function __construct($context)
    {
        $this->publicKey = $context['public_key'];
        $this->privateKey = $context['private_key'];
    }

    /**
     * @throws Exception
     */
    public function fire(array $params = array()): string
    {
        ksort($params);
        $string = $this->join($params);
        return $this->sign($string);
    }

    public function join(array $params = array()): string
    {
        return $this->join2('&', $params);
    }

    public function join2(string $separator, array $params = array()): string
    {
        return $this->join3($separator, 'sign', $params);
    }

    public function join3(string $separator, string $exclude, array $params = array()): string
    {
        return $this->join4($separator, '=', $exclude, $params);
    }

    public function join4(string $separator, string $joiner, string $exclude, array $params = array()): string
    {
        $inner = array();
        foreach ($params as $key => $value) {
            if ($key == $exclude) {
                continue;
            }
            if (is_array($value)) {
                // JSON_UNESCAPED_UNICODE -> 中文不转为 {@code unicode}
                $value = stripslashes(json_encode($value, JSON_UNESCAPED_UNICODE));
            }
            $inner[] = $key . $joiner . $value;
        }

        return implode($separator, $inner);
    }

    /**
     * @throws Exception
     */
    public function sign(string $data, string $private_key = ''): string
    {
        return $this->sign2($data, $private_key);
    }

    /**
     * @throws Exception
     */
    public function sign2(string $data, string $private_key = '', int $algorithm = OPENSSL_ALGO_SHA1): string
    {
        if (empty($private_key)) {
            $private_key = $this->privateKey;
        }
        $pri_key = openssl_pkey_get_private($private_key);
        if (!$pri_key) {
            throw new Exception("parse the private key failure");
        }
        openssl_sign($data, $sign, $private_key, $algorithm);

        return base64_encode($sign);
    }

    /**
     * @throws Exception
     */
    function verify(string $data, string $sign, string $public_Key = ''): bool
    {
        return $this->verify2($data, $sign, $public_Key);
    }

    /**
     * @throws Exception
     */
    function verify2(string $data, string $sign, string $public_Key = '', int $algorithm = OPENSSL_ALGO_SHA1): bool
    {
        if (empty($public_Key)) {
            $public_Key = $this->publicKey;
        }
        $pub_key = openssl_pkey_get_public($public_Key);
        if (!$pub_key) {
            throw new Exception("parse the public key failure");
        }

        return (bool)openssl_verify($data, base64_decode($sign), $public_Key, $algorithm);
    }
}

