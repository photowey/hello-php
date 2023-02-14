<?php

namespace jphp;

use Exception;
use Phello\HelloPhp\jphp\Cipher;
use PHPUnit\Framework\TestCase;

/**
 * {@code CipherTest}
 *
 * @author weichangjun
 * @date 2022/06/01
 * @since 1.0.0
 */
class CipherTest extends TestCase
{
    private $privateKey = '-----BEGIN RSA PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJDArkki2k3+xhze
v5emztqFtUhOzVlSveQ5dOLC4nNlLg8r81I9xBaXB7m4rb6lVjLgUuAXKUJ8y7yH
eE02s695cR/ZD0fierrMKMkmTFZIqOVYchn15N8EPz5e8WFirtP+Kaol4jDOaLCP
CSIs8QrQE6kEC7WDBi2/0mCkNI7PAgMBAAECgYB0oZuMODXXZDGyb1PGWFQRRGyl
n0Db+MwiCJ2CXG5jdiHffZUnLbdCUFycKw5rLwK+KXr9LgxDkxQBitHGvQ2XXO8w
v/2MQT658Eb49iQxZfuuhFFN8YIJZ4oFVyQQWXyCRAopyi/B0Eh6LTTTPjC/udPX
MoC0vSZl93Db8KPdyQJBANLPOnmyQmua6za/fFhWl13lsa+Ko73LhGi6dpiBjdpw
j0hp6NV/7yGCvHJFUr0hc9p5/lVJHkeAS/QtxF1IqXMCQQCvyGVL5uXj4didkO50
4HDgpPAgdROCZ6KrrNIf+RnCDn9Ffa1oA+n5cnno4trZVAYLU4yzZ63tQ/Z81ZfS
+h41AkBPXuyyUzaE0zBKTbBghkG5fbj30egyloTE9aefZe/l1clsx0t9zwxW/qU7
FPTA9u5qzNHAhKYc36Y5Sl4LjUcXAkBX50mopEXQKI+Pc/ubHOW1oSWnxYRFERhK
63iEnqgf3+oLUSbXPiXSJUoLiO5SAe+n2FcjHDTg0ry/fnyW95cFAkEAyllpaHTu
V5FPt6J5wZcEUbZoZsxYGmfUEg6HUE8BbGgRWwaem94p668ILaqGtxGKLKgbWoTM
Z8ZM+5cR/+C+yA==
-----END RSA PRIVATE KEY-----';

    private $publicKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCQwK5JItpN/sYc3r+Xps7ahbVI
Ts1ZUr3kOXTiwuJzZS4PK/NSPcQWlwe5uK2+pVYy4FLgFylCfMu8h3hNNrOveXEf
2Q9H4nq6zCjJJkxWSKjlWHIZ9eTfBD8+XvFhYq7T/imqJeIwzmiwjwkiLPEK0BOp
BAu1gwYtv9JgpDSOzwIDAQAB
-----END PUBLIC KEY-----';

    /**
     * @throws Exception
     */
    public function testEncrypt()
    {
        $cipher = new Cipher($this->privateKey, $this->publicKey);
        $data = "hello world";
        $encrypt = $cipher->encrypt($data);
        print_r($encrypt);
        $decrypt = $cipher->decrypt($encrypt);

        $xx = "WKx9m6x9qhLqiHdv0gy/H3nFDKXDwDX2uAya888vbJBQUbaW5vCO8ZQjDTr8iTD0GGQLsu3RgnAk2DFwIarftWGlXNM47kIAJR0B3dW4JEZduAtAN1K8/Z8YPlwsMe5WBqSALu47t94lSaNccS34iefO99KatElWJl1Fn1EgwUg=";
        $decryptXX = $cipher->decrypt($xx);

        $this->assertEquals($decrypt, $data);
        $this->assertEquals($decryptXX, $data);
    }
}
