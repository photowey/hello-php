<?php

namespace rsa;

use Exception;
use Phello\HelloPhp\rsa\Rsa as RSA;
use PHPUnit\Framework\TestCase;

class RsaTest extends TestCase
{

    private function rsa_context(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAtRF8lrvE3pEq8FsHtSe5INHGud/rA8wtNWv7A6fsf5F2NJNv
ZbT82BaHw9po67oixqBnJGutAmI2t9yrxBfku5WLH5xXSEkSGANJTG46GO+ujPIz
TxPFl9rPpJshAa6wDp1yX8DbOAC0arod3A5fYN7Cj2cWLk8/w6/pjpTQWo8eblXU
0qwQyz8FNQ8w7UbsW44GOS6hbJDHbv8nq1vY+5pnrCZGut4Gdove6OJkt3mk4Dlh
oQ15bF+NHI6dhL/b/68mC48sVwrgqP6T7U89zdHLmi+bGVn+qN4G+FjB0QnxPk2K
25o+4xgZcwCJDYiUj0sbxKMsj/yiTAQGO03czQIDAQABAoIBACyYUvQY6OLcJBQw
h1RxpSHVKLms0YgM6HGI17jNyeydWdyXF0+YZNGfsu5kw4STQm9jICQTNPgqUkm0
WsWgEOC2cx5k9gZCoOczIAFoAH0VwwrJuCNYvkipRozG/Dka2hevZXT53cQMQGMs
1Z/WFl2YX5jMDeV39T9v+vj349z5ig+tUjnOlZDY4qulsmATlWojjp1Y0Rj7L+gl
Jzf8xO3ym5I4ZovuG0kd5NFipQqOejrVUF0xkXZ28ra+658qkDFgMx1lZGivzzzs
RKFx2mkwAjqli/w4SPaeUNDJ6chd91aHU/uXYfbv/luXw3gIZoXDPO2ALCmNASZl
l2S4DK0CgYEA8Ns2bpzZJ22C3fjHgL0czZcVxEScEkzpE4rLO3gnMvz9JkoFw6lw
Q7/YeCoWWVrOA9LWihMcEdLMjaWwPUhVnhvy9P0yYIGDzCL70vSD4cGveaXaNO9U
EU/OHbA0V+3rMdlPU5QDEa22MzwZczZwg6cQSePGTjxBr5hU/+TY06MCgYEAwHPv
dI/NTphc87J284zWJfjvk/xqna/BswupgTBVzDDFjEs9uvA9ITSUoi9dmlKrlb0w
KlpJi6JCVHbTrifrr/EFD8WagvBwYqe8yRjK6vKLe5O/ksROpLWmVrMr3+4xzOpZ
5VTDvCrmQ5snPS1DxJ3pmsCZ+bC7ZZpX2CnmFM8CgYEAkTUoCOHpDZs5VcfBx3y8
G7qltdFDYskZj92Sj0TuJRBfMrFX7lF9zGqiADgnhzF2mNmI3G+O8bPr/M3She/R
JmRlQoxPzdznb6/7sIAX7ohN2YJDHrzXKyS4+C8eL5DRxhjkeVf3zbWz7gmislI0
3TpgWJvJF6u+UjX9sNTwYA8CgYB/Ktx6cB8gpQseuLljG5fRxZlBdxRYF+/tSHJ7
/B1lbIDMwFcM9HvgOidQt+2o8KGSs01lXv2j99bOiyo6tQRG4QMQNelwRkJs3huf
4fMLprNGOA3phC/XJHTCa2g9ct6TYfN+1zDzYIGBAL+/6+4QuKvI5yWXWRGrBH6x
RpZS/wKBgDPVQOBjmPMFkE4EibQhHjTrToSA5sIeKS25/VV+BiirhmBDQ3JM0PS6
YWRNwfAomGOpRSRATQnTc9sB8lnPNQejERz8RB9w0BtRA5JxrL1SbkMVcyB938+P
MLU0cEkw5Lxv9eYJqVaJPJcL2QouwIaB8Y2iimu8aP9c2MBEcQ6K
-----END RSA PRIVATE KEY-----';
        $context['public_key'] = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtRF8lrvE3pEq8FsHtSe5
INHGud/rA8wtNWv7A6fsf5F2NJNvZbT82BaHw9po67oixqBnJGutAmI2t9yrxBfk
u5WLH5xXSEkSGANJTG46GO+ujPIzTxPFl9rPpJshAa6wDp1yX8DbOAC0arod3A5f
YN7Cj2cWLk8/w6/pjpTQWo8eblXU0qwQyz8FNQ8w7UbsW44GOS6hbJDHbv8nq1vY
+5pnrCZGut4Gdove6OJkt3mk4DlhoQ15bF+NHI6dhL/b/68mC48sVwrgqP6T7U89
zdHLmi+bGVn+qN4G+FjB0QnxPk2K25o+4xgZcwCJDYiUj0sbxKMsj/yiTAQGO03c
zQIDAQAB
-----END PUBLIC KEY-----';

        return $context;
    }

    private function tongl_rsa_context(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAtRF8lrvE3pEq8FsHtSe5INHGud/rA8wtNWv7A6fsf5F2NJNv
ZbT82BaHw9po67oixqBnJGutAmI2t9yrxBfku5WLH5xXSEkSGANJTG46GO+ujPIz
TxPFl9rPpJshAa6wDp1yX8DbOAC0arod3A5fYN7Cj2cWLk8/w6/pjpTQWo8eblXU
0qwQyz8FNQ8w7UbsW44GOS6hbJDHbv8nq1vY+5pnrCZGut4Gdove6OJkt3mk4Dlh
oQ15bF+NHI6dhL/b/68mC48sVwrgqP6T7U89zdHLmi+bGVn+qN4G+FjB0QnxPk2K
25o+4xgZcwCJDYiUj0sbxKMsj/yiTAQGO03czQIDAQABAoIBACyYUvQY6OLcJBQw
h1RxpSHVKLms0YgM6HGI17jNyeydWdyXF0+YZNGfsu5kw4STQm9jICQTNPgqUkm0
WsWgEOC2cx5k9gZCoOczIAFoAH0VwwrJuCNYvkipRozG/Dka2hevZXT53cQMQGMs
1Z/WFl2YX5jMDeV39T9v+vj349z5ig+tUjnOlZDY4qulsmATlWojjp1Y0Rj7L+gl
Jzf8xO3ym5I4ZovuG0kd5NFipQqOejrVUF0xkXZ28ra+658qkDFgMx1lZGivzzzs
RKFx2mkwAjqli/w4SPaeUNDJ6chd91aHU/uXYfbv/luXw3gIZoXDPO2ALCmNASZl
l2S4DK0CgYEA8Ns2bpzZJ22C3fjHgL0czZcVxEScEkzpE4rLO3gnMvz9JkoFw6lw
Q7/YeCoWWVrOA9LWihMcEdLMjaWwPUhVnhvy9P0yYIGDzCL70vSD4cGveaXaNO9U
EU/OHbA0V+3rMdlPU5QDEa22MzwZczZwg6cQSePGTjxBr5hU/+TY06MCgYEAwHPv
dI/NTphc87J284zWJfjvk/xqna/BswupgTBVzDDFjEs9uvA9ITSUoi9dmlKrlb0w
KlpJi6JCVHbTrifrr/EFD8WagvBwYqe8yRjK6vKLe5O/ksROpLWmVrMr3+4xzOpZ
5VTDvCrmQ5snPS1DxJ3pmsCZ+bC7ZZpX2CnmFM8CgYEAkTUoCOHpDZs5VcfBx3y8
G7qltdFDYskZj92Sj0TuJRBfMrFX7lF9zGqiADgnhzF2mNmI3G+O8bPr/M3She/R
JmRlQoxPzdznb6/7sIAX7ohN2YJDHrzXKyS4+C8eL5DRxhjkeVf3zbWz7gmislI0
3TpgWJvJF6u+UjX9sNTwYA8CgYB/Ktx6cB8gpQseuLljG5fRxZlBdxRYF+/tSHJ7
/B1lbIDMwFcM9HvgOidQt+2o8KGSs01lXv2j99bOiyo6tQRG4QMQNelwRkJs3huf
4fMLprNGOA3phC/XJHTCa2g9ct6TYfN+1zDzYIGBAL+/6+4QuKvI5yWXWRGrBH6x
RpZS/wKBgDPVQOBjmPMFkE4EibQhHjTrToSA5sIeKS25/VV+BiirhmBDQ3JM0PS6
YWRNwfAomGOpRSRATQnTc9sB8lnPNQejERz8RB9w0BtRA5JxrL1SbkMVcyB938+P
MLU0cEkw5Lxv9eYJqVaJPJcL2QouwIaB8Y2iimu8aP9c2MBEcQ6K
-----END RSA PRIVATE KEY-----';
        $context['public_key'] = '-----BEGIN RSA PUBLIC KEY-----
MIGJAoGBALtizrUkNM33IG/VZTmRiiKC5NkO3YCNjLmA7CLg4gA0vhtlyFBnB2ZL
v/7dKeEnC3Dm2iyoBAqmXQXEshH8Q/Urw1te9pgzYA45cxCoWraVPYghrd6lstNk
WdrhqbxpjPWAYgebYxVkZkNwwMnJ3TTx41yrQJyjd5FtptMbE7nbAgMBAAE=
-----END RSA PUBLIC KEY-----';

        return $context;
    }

    private function rsa_context_not_match(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAqkOook7PlfA2zolZHe4rtvy6DGwXCGPy67kkHzwKX7kLiIDvZB5ltHKp70YO8f6RQpgjPXcvQQaA9TjP0Yj9BRLXFqLj5exs7704iE0QE8sz0W6VaVGtRd7ACa4ttR2bb2mTkkV6lpVNsvrSox2bkLntmaXRH2rK8h+G2beGKF8otu+brYx5mak0DAAed5nzbeHt4VCYmZSJccERnpOi8MOxsgTJWalbGDdYAvWw0uTnA2vxdycUuiG8H90CsYDlSqThfnkAfuT50fMP9IvevtWC66/K15XLluNJf05yvNWwTtpCWI0rON5MLwf2Uv+OqA5H1wgJS7jp9szqwvQnzwIDAQABAoIBAAcw9F5mlb3vd2Ehy/HHrXD9G56Ksi5YiloKZ8wp7QY9+o65Y2MHJaSJc0P34Ym3BsuZQWPHNOe6Lpgs3horfwRH123NU3LSmYdGpqybFKLBYl7mHMll+buJvPKruKJ9raL3ApSa+qKBi9aTYXIiPf/O2ooyxrJdAFVZn4hyh+gMizV/Z6R+maGghzYrPJEcxIBhWAl1uJqMjGluo/l8RvRPFTjr9j3Q0hd9Zr4SHtXw159P/dc+w/GshteTKoF6iMn4/yZZBSQMO1KwSNJQBcwhsIa9rfmSkk0BS9ffYnCy9KGB5qqVLquo5Ck3jtt4W69WrdDdEFChbb89uTFN6AECgYEA2QcEv2aziKRVfLKPiy72VIJwkL3ErMYNwIrciKYz8LW3YFQKGNqYUTZVCCTk3eSON0K2yZSnbolI6Sms46Odv6pqHgEqGA5Ed69qNFjQSR++7hNPuBNJk1XN4CaDAmFG0buyCCseb/DN+v53Mu4HIjkzWEfI+zlsVeYoo3QZ4cECgYEAyNbjueGlUpofG1qxbqCP3VVyEKvkhDesnW99MOmNh0NeTarRVVOAB6JNBNFoapoFhk4Pr1qsfLd2XykN5OnoHc9qwJcwQAR6F7D/p5OEFTy7JRU2NCF4/pUZCFBbgKCbscTde5zMlLrJTgkB9W0ug2XCCvpDYqGs6dRj3lWYTY8CgYAgeeNk/OpaxTShr1q5mjJ0XPyZPDyFGjIOoPj1XeGh4J9rQ8grBfMLHBVHXbX92mjJrisKKTuQ1+xYL8tWWTKO7uJoUQZKiUAHpPFAmhW5C44XtD4WrpQw/wMKytiJ76KYWfz/KeypFaDNMW0G6wWYQnUDfeJ+bY5foExugT4qQQKBgFpVNQY1NKvLgHRIPYgZlbuio/RVrCm/9Na2/6MRWUPejDr4usDbFrnYSTYCjilsb1GyKKHhcbWCuy4gBAzTHEDUOxq2pdAVc2jWhpaz5fO7Zh1Oxht6drZjD2hK5G0dUAoMFuZzZxz6SnLb4FKoMgSNr1JKsCZbu69MhULKUv+HAoGAJE3F3xDkruHtbiWXOc6bBtmro6YgVUjJcMbSatiWGAcJMRP4ZmLT1+9ZBqhNry9kgy3OxpIILUT8pg9GQiJaIO54voyaHO4eDmo7HYAh4228ifezRFqAmADcjCu2VWwi/QaPBK3xHFRRtWP2fVEaWBo2Ko7M1i7dfKeHwS1qc+U=
-----END RSA PRIVATE KEY-----';
        $context['public_key'] = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqkOook7PlfA2zolZHe4rtvy6DGwXCGPy67kkHzwKX7kLiIDvZB5ltHKp70YO8f6RQpgjPXcvQQaA9TjP0Yj9BRLXFqLj5exs7704iE0QE8sz0W6VaVGtRd7ACa4ttR2bb2mTkkV6lpVNsvrSox2bkLntmaXRH2rK8h+G2beGKF8otu+brYx5mak0DAAed5nzbeHt4VCYmZSJccERnpOi8MOxsgTJWalbGDdYAvWw0uTnA2vxdycUuiG8H90CsYDlSqThfnkAfuT50fMP9IvevtWC66/K15XLluNJf05yvNWwTtpCWI0rON5MLwf2Uv+OqA5H1wgJS7jp9szqwvQnzwIDAQAB
-----END PUBLIC KEY-----';

        return $context;
    }

    /**
     * @throws Exception
     */
    public function testRsaVerifyPythonSign()
    {
        $context = $this->rsa_context();
        $rsa = new RSA($context);

        $params = [];
        $params['actual_fee'] = '0';
        $params['order_number'] = '32204054436346797751717339136';

        // $sign = $rsa->fire($params);
        $sign = 'kRfWU28tS5fHaXKvqLHoKF3sAHJiTumgRkut1V+dv/Up2H71OBpfaA5bAHijEn0gapq6SOCBKWujsliC6e8FuIQ4XmmOElhRmqlUfbVbzdpHxsxbU29zFB7AJ1WyhWxUK0cu2rDicMFRjU0kZZGjT8HhnyG4AtMnOpadlb7tsHQKKesVXFgOtCnCWDcye0vyLFLnzp+XnnbqbG+I8pyNPBTFS6Ea7Qodd2OZe7wGYeqPtXh2BTjCNrnyVnF0dWrohV//HbwHk+aeZNo0INnmUVKe1dFE1iOndlpmeVRsb63W8v11Ox+yNIJokBd1Drf3EF+SRvVcNnh0qxThbgD7mA==';
        ksort($params);
        $response_sign_candidate = $rsa->join($params);

        $verify = $rsa->verify($response_sign_candidate, $sign);

        $this->assertTrue($verify);
    }

    public function testRsaVerifyTonglPythonSign()
    {

        $context = $this->tongl_rsa_context();
        $rsa = new RSA($context);

        $params = [];
        $params['actual_fee'] = '0';
        $params['order_number'] = '32204054436346797751717339136';

        // $sign = $rsa->fire($params);
        $sign = 'PLA0rcSWh5y1mUAWc5qp68TzMo6Fd8vUjV8/3yVRFkxuNvzAE4DW5rY+dkhHFDHEYAgQd8nxbmuutyBaNTFBDZe6MScvSqk5x3creTDfmFzyPLEdAzdHBkTaHJ0JLMx8et5b9oavRvVqXyWg28k1OJGQ6GcMHzTvZVt7Sz9T3l4=';
        ksort($params);
        $response_sign_candidate = $rsa->join($params);

        $this->expectException(Exception::class);

        // throw Exception
        $rsa->verify($response_sign_candidate, $sign);
    }

    /**
     * @throws Exception
     */
    public function testMatchRsaKey()
    {
        $context = $this->rsa_context_not_match();
        $rsa = new RSA($context);

        $params = [];
        $params['actual_fee'] = '0';
        $params['order_number'] = '32204054436346797751717339136';

        $sign = $rsa->fire($params);
        ksort($params);
        $response_sign_candidate = $rsa->join($params);

        $verify = $rsa->verify($response_sign_candidate, $sign);
        $this->assertTrue($verify);
    }

    /**
     * @throws Exception
     */
    public function testUnionPay1()
    {
        $url = "accessType=0&bizType=000000&certType=01&encoding=UTF-8&encryptPubKeyCert=-----BEGIN CERTIFICATE-----
MIIEGjCCAwKgAwIBAgIFEgg4VmIwDQYJKoZIhvcNAQEFBQAwITELMAkGA1UEBhMC
Q04xEjAQBgNVBAoTCUNGQ0EgT0NBMTAeFw0xODExMzAwNzUxNDBaFw0yNDAxMDIw
OTA3MThaMIGFMQswCQYDVQQGEwJjbjESMBAGA1UEChMJQ0ZDQSBPQ0ExMRYwFAYD
VQQLEw1Mb2NhbCBSQSBPQ0ExMRQwEgYDVQQLEwtFbnRlcnByaXNlczE0MDIGA1UE
AxQrMDQxQFoxMjAwMDQwMDAwOlNJR05AMDAwNDAwMDA6U0lHTkAwMDAwMDAwMjCC
ASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAN3BsX/kyJ2BRh2IW4GyYfFs
4g5RcIEPhzGfo0IztDeqM8cfwRGqklavYHuZfFG6XPb1N/p1rXQlwyBJ6UQwgnVu
ACyWa9+Cqf664XNp+vIVx9grqor9lzrJK6jTPrd57AJNuhpFGAW0dRAjfF5ZAdpZ
56gYiWFgp2zTIXGjXoA0MHqYKBGMMYdFSZ3EkRhsJ0jyJeaBep2VmsFDtODliW0X
5T+cSgPn1+zzlHwu1svmBYxh3ZpEY3hEwR8KQwja5d5b0kUZ5eCepg9OyB8y+K6P
5VxCN8YHwVsXFYz1rpEmjGp2qObO2A+vyJaaCdtB3AeppsGLwGCIXQ/t5wyjOqEC
AwEAAaOB8zCB8DAfBgNVHSMEGDAWgBTR2+mIguXdGo9MqgCMvnzyqxv22TBIBgNV
HSAEQTA/MD0GCGCBHIbvKgEBMDEwLwYIKwYBBQUHAgEWI2h0dHA6Ly93d3cuY2Zj
YS5jb20uY24vdXMvdXMtMTQuaHRtMDgGA1UdHwQxMC8wLaAroCmGJ2h0dHA6Ly9j
cmwuY2ZjYS5jb20uY24vUlNBL2NybDE3ODgwLmNybDALBgNVHQ8EBAMCA+gwHQYD
VR0OBBYEFAIndZ83GnekyNLXDbnxhC6+p4aCMB0GA1UdJQQWMBQGCCsGAQUFBwMC
BggrBgEFBQcDBDANBgkqhkiG9w0BAQUFAAOCAQEASJTBgXZUnzJ7PVv9Ro4LvVtY
G/8UOyB7d6TPnWkOGsPghVJujwiSpGmzI3wCCqWbQI23sOBuwkRFCZdK11bc01Wb
bsapui647RfG0zCAd86ggn5eoe41lZRgIVc1PN/te9JtKcdHkAS9n1PUkD64lPVn
WEMOcUXukW1emQG9WXauQ8+MVWUtQPW3mmNz2pWsrLk4jk9bppCwkY0lT6KRUXWp
1xfxXF57wOoNR11wx7WQv1zHJok4oJTrM9lQuVLCwFNr7Pmg0JeEZMF7M7fGaBDi
ecJB+qLudeVOIpFijW6AQfZaLawlT6eco5/UclK95gnCSct1/BgMOe9UMYPG+w==
-----END CERTIFICATE-----&merId=898650173720117&orderId=8e5b4b9ad7cc37bca1caedde7a4b27fa&respCode=00&respMsg=成功[0000000]&signMethod=01&txnSubType=00&txnTime=20220617171652&txnType=95&version=5.1.0&signPubKeyCert=-----BEGIN CERTIFICATE-----
MIIEKzCCAxOgAwIBAgIFEpVGRCEwDQYJKoZIhvcNAQEFBQAwITELMAkGA1UEBhMC
Q04xEjAQBgNVBAoTCUNGQ0EgT0NBMTAeFw0yMDA3MTYwOTM4MzRaFw0yNTA3MTYw
OTM4MzRaMIGWMQswCQYDVQQGEwJjbjESMBAGA1UEChMJQ0ZDQSBPQ0ExMRYwFAYD
VQQLEw1Mb2NhbCBSQSBPQ0ExMRQwEgYDVQQLEwtFbnRlcnByaXNlczFFMEMGA1UE
Aww8MDQxQDgzMTAwMDAwMDAwODMwNDBA5Lit5Zu96ZO26IGU6IKh5Lu95pyJ6ZmQ
5YWs5Y+4QDAwMDE2NDk0MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA
r50XGgVgM+8NnK3fDoMkqy0E+KcnnA6lQflB0Oet1zemVIzzn+76tPS0vV02OcpV
u9dPt5iq83pMKBLY9isUuyRUWz8fn8Z7o3KvBoCRK4edtui/ihUt5vysJ920s8aG
CbBRAdRmdIa44ha6W61KEJqrhw5iI2QkDK6OgVxs7imXgYiMc5lxLQL+9bRRGbKq
zCAidolds633dQC58GZCtKIGvnwuDo8GGVTtjci7OU4c+54vtss2aDnE4QfLY4OY
1y+YXqy0D8Pax9T8ZnX7op8rCcO7FyH+0xgYA6gGnFlE3puiqxCFXCD7QI0np/bA
XuZ6tIoBrqKGvsUobVO3swIDAQABo4HzMIHwMB8GA1UdIwQYMBaAFNHb6YiC5d0a
j0yqAIy+fPKrG/bZMEgGA1UdIARBMD8wPQYIYIEchu8qAQEwMTAvBggrBgEFBQcC
ARYjaHR0cDovL3d3dy5jZmNhLmNvbS5jbi91cy91cy0xNC5odG0wOAYDVR0fBDEw
LzAtoCugKYYnaHR0cDovL2NybC5jZmNhLmNvbS5jbi9SU0EvY3JsMjQ5NjMuY3Js
MAsGA1UdDwQEAwID6DAdBgNVHQ4EFgQUQP9Yqy8KJGuiHVVGrE1k+OryQyYwHQYD
VR0lBBYwFAYIKwYBBQUHAwIGCCsGAQUFBwMEMA0GCSqGSIb3DQEBBQUAA4IBAQBk
OfvkzBq1GSgBCED+ETg15xpIz/Zujb9PkgNY0UinywYIjkn6dfluMIk2cNiCOMfM
Rg6LhtFi01Fnn3qwHe2vCEVBPJlazSsFE61tRCBTTWm8p/zfZKI9wGyir5aYBiPC
TRPgXaQ4cYqSAh1n98a4ONBy2/StBl+TfKvCIoXARUSp12lOVY/aKg+8Jk4MIvEw
8WCL98tTVxXe1nWPlpFDS9y0ivMyfYlWkTb6+0gMrYA2nzrfFGS1KZNRBS7p3Bh5
tdBPIgSd5gLZpAun8d0C3CcRZhcIof9hmxIc9ieQoWas52oVZDzsaGTo9rsTo9nU
3N3BThugW+P/koUnIFRG
-----END CERTIFICATE-----&signature=TgMsuFnuPuvwU70rGvVDUU7bzVzEDN11p4S6nHxGe+ybd8Y36xlU6NTcU0F6e1qlLkaBZkKgC8ErR9NzODJMdqEieH4QOgcXsIVgmanq5EospluWXgJ3aeLh1rA37PEvqO+syKCJkx93H5lSU3dbiiLxubz0DQs1PvUJqOYvILCo7j1E1AjuQX6dY8He4n9LQ7DCc3xDETOwvt9LgjJpMkf9pSkpIZnv/UpcDB6WelBXPncQAwZK/V+ogSDnKPfYKoIw7shP2L+KzA9gXscjZsREeurDMsfBZp+QLBHpSSpAmm724d/JQ8kczBCXd5SwAzGBMYv4Q47vDLXJuwXqEw=='";


        $context = $this->union_match_context();
        $rsa = new RSA($context);

        $data = [];
        parse_str($url, $data);

        unset($data['signature']);
        ksort($data);

        $response_sign_candidate = $rsa->join($data);
        $localSign = $rsa->sign($response_sign_candidate, "");
        $verify = $rsa->verify($response_sign_candidate, $localSign, "");


        $this->assertTrue($verify);
    }

    /**
     * @throws Exception
     */
    public function testUnionPay2()
    {
        $url = "accessType=0&bizType=000000&certType=01&encoding=UTF-8&encryptPubKeyCert=-----BEGIN CERTIFICATE-----
MIIEGjCCAwKgAwIBAgIFEgg4VmIwDQYJKoZIhvcNAQEFBQAwITELMAkGA1UEBhMC
Q04xEjAQBgNVBAoTCUNGQ0EgT0NBMTAeFw0xODExMzAwNzUxNDBaFw0yNDAxMDIw
OTA3MThaMIGFMQswCQYDVQQGEwJjbjESMBAGA1UEChMJQ0ZDQSBPQ0ExMRYwFAYD
VQQLEw1Mb2NhbCBSQSBPQ0ExMRQwEgYDVQQLEwtFbnRlcnByaXNlczE0MDIGA1UE
AxQrMDQxQFoxMjAwMDQwMDAwOlNJR05AMDAwNDAwMDA6U0lHTkAwMDAwMDAwMjCC
ASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAN3BsX/kyJ2BRh2IW4GyYfFs
4g5RcIEPhzGfo0IztDeqM8cfwRGqklavYHuZfFG6XPb1N/p1rXQlwyBJ6UQwgnVu
ACyWa9+Cqf664XNp+vIVx9grqor9lzrJK6jTPrd57AJNuhpFGAW0dRAjfF5ZAdpZ
56gYiWFgp2zTIXGjXoA0MHqYKBGMMYdFSZ3EkRhsJ0jyJeaBep2VmsFDtODliW0X
5T+cSgPn1+zzlHwu1svmBYxh3ZpEY3hEwR8KQwja5d5b0kUZ5eCepg9OyB8y+K6P
5VxCN8YHwVsXFYz1rpEmjGp2qObO2A+vyJaaCdtB3AeppsGLwGCIXQ/t5wyjOqEC
AwEAAaOB8zCB8DAfBgNVHSMEGDAWgBTR2+mIguXdGo9MqgCMvnzyqxv22TBIBgNV
HSAEQTA/MD0GCGCBHIbvKgEBMDEwLwYIKwYBBQUHAgEWI2h0dHA6Ly93d3cuY2Zj
YS5jb20uY24vdXMvdXMtMTQuaHRtMDgGA1UdHwQxMC8wLaAroCmGJ2h0dHA6Ly9j
cmwuY2ZjYS5jb20uY24vUlNBL2NybDE3ODgwLmNybDALBgNVHQ8EBAMCA+gwHQYD
VR0OBBYEFAIndZ83GnekyNLXDbnxhC6+p4aCMB0GA1UdJQQWMBQGCCsGAQUFBwMC
BggrBgEFBQcDBDANBgkqhkiG9w0BAQUFAAOCAQEASJTBgXZUnzJ7PVv9Ro4LvVtY
G/8UOyB7d6TPnWkOGsPghVJujwiSpGmzI3wCCqWbQI23sOBuwkRFCZdK11bc01Wb
bsapui647RfG0zCAd86ggn5eoe41lZRgIVc1PN/te9JtKcdHkAS9n1PUkD64lPVn
WEMOcUXukW1emQG9WXauQ8+MVWUtQPW3mmNz2pWsrLk4jk9bppCwkY0lT6KRUXWp
1xfxXF57wOoNR11wx7WQv1zHJok4oJTrM9lQuVLCwFNr7Pmg0JeEZMF7M7fGaBDi
ecJB+qLudeVOIpFijW6AQfZaLawlT6eco5/UclK95gnCSct1/BgMOe9UMYPG+w==
-----END CERTIFICATE-----&merId=898650173720117&orderId=8e5b4b9ad7cc37bca1caedde7a4b27fa&respCode=00&respMsg=成功[0000000]&signMethod=01&txnSubType=00&txnTime=20220617171652&txnType=95&version=5.1.0&signPubKeyCert=-----BEGIN CERTIFICATE-----
MIIEKzCCAxOgAwIBAgIFEpVGRCEwDQYJKoZIhvcNAQEFBQAwITELMAkGA1UEBhMC
Q04xEjAQBgNVBAoTCUNGQ0EgT0NBMTAeFw0yMDA3MTYwOTM4MzRaFw0yNTA3MTYw
OTM4MzRaMIGWMQswCQYDVQQGEwJjbjESMBAGA1UEChMJQ0ZDQSBPQ0ExMRYwFAYD
VQQLEw1Mb2NhbCBSQSBPQ0ExMRQwEgYDVQQLEwtFbnRlcnByaXNlczFFMEMGA1UE
Aww8MDQxQDgzMTAwMDAwMDAwODMwNDBA5Lit5Zu96ZO26IGU6IKh5Lu95pyJ6ZmQ
5YWs5Y+4QDAwMDE2NDk0MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA
r50XGgVgM+8NnK3fDoMkqy0E+KcnnA6lQflB0Oet1zemVIzzn+76tPS0vV02OcpV
u9dPt5iq83pMKBLY9isUuyRUWz8fn8Z7o3KvBoCRK4edtui/ihUt5vysJ920s8aG
CbBRAdRmdIa44ha6W61KEJqrhw5iI2QkDK6OgVxs7imXgYiMc5lxLQL+9bRRGbKq
zCAidolds633dQC58GZCtKIGvnwuDo8GGVTtjci7OU4c+54vtss2aDnE4QfLY4OY
1y+YXqy0D8Pax9T8ZnX7op8rCcO7FyH+0xgYA6gGnFlE3puiqxCFXCD7QI0np/bA
XuZ6tIoBrqKGvsUobVO3swIDAQABo4HzMIHwMB8GA1UdIwQYMBaAFNHb6YiC5d0a
j0yqAIy+fPKrG/bZMEgGA1UdIARBMD8wPQYIYIEchu8qAQEwMTAvBggrBgEFBQcC
ARYjaHR0cDovL3d3dy5jZmNhLmNvbS5jbi91cy91cy0xNC5odG0wOAYDVR0fBDEw
LzAtoCugKYYnaHR0cDovL2NybC5jZmNhLmNvbS5jbi9SU0EvY3JsMjQ5NjMuY3Js
MAsGA1UdDwQEAwID6DAdBgNVHQ4EFgQUQP9Yqy8KJGuiHVVGrE1k+OryQyYwHQYD
VR0lBBYwFAYIKwYBBQUHAwIGCCsGAQUFBwMEMA0GCSqGSIb3DQEBBQUAA4IBAQBk
OfvkzBq1GSgBCED+ETg15xpIz/Zujb9PkgNY0UinywYIjkn6dfluMIk2cNiCOMfM
Rg6LhtFi01Fnn3qwHe2vCEVBPJlazSsFE61tRCBTTWm8p/zfZKI9wGyir5aYBiPC
TRPgXaQ4cYqSAh1n98a4ONBy2/StBl+TfKvCIoXARUSp12lOVY/aKg+8Jk4MIvEw
8WCL98tTVxXe1nWPlpFDS9y0ivMyfYlWkTb6+0gMrYA2nzrfFGS1KZNRBS7p3Bh5
tdBPIgSd5gLZpAun8d0C3CcRZhcIof9hmxIc9ieQoWas52oVZDzsaGTo9rsTo9nU
3N3BThugW+P/koUnIFRG
-----END CERTIFICATE-----&signature=TgMsuFnuPuvwU70rGvVDUU7bzVzEDN11p4S6nHxGe+ybd8Y36xlU6NTcU0F6e1qlLkaBZkKgC8ErR9NzODJMdqEieH4QOgcXsIVgmanq5EospluWXgJ3aeLh1rA37PEvqO+syKCJkx93H5lSU3dbiiLxubz0DQs1PvUJqOYvILCo7j1E1AjuQX6dY8He4n9LQ7DCc3xDETOwvt9LgjJpMkf9pSkpIZnv/UpcDB6WelBXPncQAwZK/V+ogSDnKPfYKoIw7shP2L+KzA9gXscjZsREeurDMsfBZp+QLBHpSSpAmm724d/JQ8kczBCXd5SwAzGBMYv4Q47vDLXJuwXqEw=='";

        $context = $this->union_bat_context();
        $rsa = new RSA($context);

        $data = [];
        parse_str($url, $data);

        $sign = $data['signature'];
        unset($data['signature']);
        ksort($data);

        $response_sign_candidate = $rsa->join($data);
        $verify = $rsa->verify3($response_sign_candidate, $sign, '', OPENSSL_ALGO_SHA256);

        $this->assertTrue($verify);
    }

    public function testCqvie() {
        $context = $this->union_cqvie_context();
        $rsa = new RSA($context);
        $response_sign_candidate = "page=1&pay_at=2022-06-28&size=100";
        $sign = "X9DLVCOqNaencbFQ0KagBKDJz4NTDXfW/Kf3R7us5FAJI1tP+0+qnuW/JiFLdJHn2878gXUgTHXtmhntgnXvDC4gRR+Q9hARY7rNAJV5/rha+caH9F4J9sPIoSl9g+QEYH/n7PHKbj/y7pVMlG1DnGpFE3jqwI2RkvE5YSbXIMzHkDuz5Acq7mwoLHOgOZrbhL8CcVJKfcXrCQOwzLngOI/k79k29iqOaGBLJFb2ZiBPfM+bD3Snxoo5NgpcGbvCirxMCq5GEMo3mfugeA14tmxT574G3ntSpS45TUvXLxqz4qgDC78YPA/xU1acrZTYXC5wfrDja7VVMKKdiwRpMA==";

        $verify = $rsa->verify2($response_sign_candidate, $sign, '', OPENSSL_ALGO_SHA256);

        $this->assertTrue($verify);
    }

    private function union_cqvie_context(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAx9VsWljdPuTAhPOQDWaug0ra/ZTyDuEpkzWsyEnuQ58O+tj+9EirhxQXMHuKwe7SUQXQYn1BlwG45xLwd9njgWKuGGk7tAxTBQRAFVUt+NeEhJyA0Pa9z26EfA00Ec7UwMmu0i2tDWsoNEqbW/d3X1PiEqA3mE8PeOCHBVOd2kAcbjGBfh9jDf+yxm1ldoW/ZBuX6JqERzQ2pcYPk6fzjYP3WIcIMc3Sgrki0ClQ6gFAxuKfNAMz8HSfW4SbR+NIYCedKjPmuK9mEXnl4y8knovs78q8gdmZ2X6KANEc/y8kRAZ/IUB7q1+2uZFktgnfbS5x6F4s7Fk72ACQfUij2QIDAQABAoIBAEUaebC4gDHKmwSe0VbBBmIilZ4RTq90j5L3gbt1TW6W53A5b9j79Ezu1qIOZspvks0v7ILSe8cDcnR96SgY8gKBJGEOqvW1OVRHxv1Zil897/aHxEf+u16rAid/zVzHIG1WkRzfbLNyNeH3VsgzyFTvxgLY4sDJvjj3s9lUtAaPfo0f3jke1vncf0QWLdZfmVD0IXyMG6mL4fqW5OMvnOhSzW3UulgQvWiP3Uv+IsFS5kK6UvfwYZpiyICEbGCHneJsFb++JmKc1McZqP9GH3kHSP8P5XtBbZcCGmOCuEbFobU/yf9oeL4rc54O+hJk52z04dEAMLrPusV35c6F7e0CgYEA50tg1cqPoOMIBGbVYSBdTDjU1XUbIZFjA0XoCbumYGZP1sv7ShwbhppOaPSlP0E0KCnVvYGgpls8qMzG/uvIE8VUaTrJeAe4trTMB6HJyDXPyiq9iZV9fk/qsnaNby19wgiHxb1rbOFC5L7r4meVyD4LNErA6Zck+A//b8bq5L8CgYEA3S3Ed5flptio74h66HxeBM0qMs3kb85eUKMOlwp7aW04Gyo8SOzwk7Z5dR+Oyquj7VfJzGanK3gMUR0gfEHaxMwNlvUZR+dXAEl1twZ/XfpAg0F6RDRQ5Hb5/3ymysD28zS2OstJWQqzWja2LiuJuW3qw3ZwnPo4r6qmZUkJJWcCgYAaOcLOGvy0KmnzTdGuBKRvixYe6ftckAahDWElEWDpF1DAMzrYCV3Zok93uR2vkW4fi7bPmQ4lLr0vCqEZsJRsIXjTwbWsZXu9Q7zKtL6Tc/6OltAM9KVZGCiteaHJ1GepA5yZgEPZAaW7GCbY8hPas6ZDlKJRGjE362B0RSLHMwKBgEOOBBEHGwSv7kFjLS8vNURAKeBklJ41qQb2FrG5aOJVkqpxZwJbJEvpkwVcAzAR5rrKcn905yBWxWRNAiwRrTEopgnyiKs2lJMo3MRvPp3Ensm4SRDl7cMqN8d6GjOZZpP4CKTCjH+ezhMC3PgTIji5wte6qEC6CHBXLgWHnjyHAoGBAONYcoZnhnPsbeeVVThPM74cbx1pSxrGIVQOhhxu2fpSp1Ile5/59DIhTULmihCe7ri6nmxH11fwbtW5dIFSijrg9Eh3LnYMt31N2bXj88q4WWh1FFRKFoxPaVYn+FKyWCqDyw7oIBSJ0kKw0GYSOKRdztbGSjkYa6/1mhKKxyBR
-----END RSA PRIVATE KEY-----';
        $context['public_key'] = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAx9VsWljdPuTAhPOQDWaug0ra/ZTyDuEpkzWsyEnuQ58O+tj+9EirhxQXMHuKwe7SUQXQYn1BlwG45xLwd9njgWKuGGk7tAxTBQRAFVUt+NeEhJyA0Pa9z26EfA00Ec7UwMmu0i2tDWsoNEqbW/d3X1PiEqA3mE8PeOCHBVOd2kAcbjGBfh9jDf+yxm1ldoW/ZBuX6JqERzQ2pcYPk6fzjYP3WIcIMc3Sgrki0ClQ6gFAxuKfNAMz8HSfW4SbR+NIYCedKjPmuK9mEXnl4y8knovs78q8gdmZ2X6KANEc/y8kRAZ/IUB7q1+2uZFktgnfbS5x6F4s7Fk72ACQfUij2QIDAQAB
-----END PUBLIC KEY-----';

        return $context;
    }


    private function union_match_context(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCW+REUckRreQdCdNS1Ex/9QtlxcerAIJn3BUPvVyvQXQ0zCLvjwrfeWZ3nfGoXgaptOzG08wE8c49Y9nwbOLUcQAvK/323gxh5APgLbEg0R8oF5VFaQfbSjgM7uR+EUVJxMOh/yEDETVZ4LSLopc+cgRGku+P0qvuYdMvwBqv7C1nf4vrq7qN0+kPDjbcZxMobqml2aQcalMxFFPvBhm6ZB+UqgpNA37Y+etlli0ImwbEKxxDlybm7+ciFXoRe4mrBvzABlOiw7jub0KehG3SLA7uPx1e5zp6WlQSQXcm9F1jzJbPCluAWR+jjmgCb9iKcti5Lpq/MpqJW7HtBbuNVAgMBAAECggEAedpNjtMrphLpaRojFIN7Lk7mckofzzKBEn+NdYBGPMbeAHLsM8jV3wE2EcC5YH+nrsI4PHRmawRajtNjGBWNGGAZJJ9SOOv2tLOzgITFQm0vAdM09kSHkypMMcgZSBLbF8EB5yEaJVbGk/jaVCyAhTEnrG56buAScdrTP8gix1wEq1Ivzto48dqw681WERHDWWGNqqZDEZ8Sy+BRjieceFf1URqZcKdyxb1MKl4py/IsbcubOfFSWOXpBdKooSA/CPH8oia/P6LCg7v58AUQNCcm1ZLpWctMfhuQye0qD3ei5+5kj5sbAbfgE0cCONxWeXL8JvmJhUTezrw6RcUfgQKBgQDBvmrikAzfeaS6pkfdWxmISSHCLHOY52IsNGXdrlFjU0d4tus62WIJRM0lK6SqgjOSn9cBJWY9C1ZpbGOzLJkAMDYXt8Pe42jmW0ZC8f8yOQue2oelfW3xpLMFkD11Fq7JbDMcyJTrai9eGnRA4DvNblTLAkqAXVYkogMn9pLLRwKBgQDHfERkZCAj8VPRj+KR5JL/o5Wg4VM3GwcV3kJBoARdC0ROhIzDXWuKENTMqJUwJAhZHROjUNJQgKp8d1ECgRKXb7EGOdk9V/b/RJMTyKsz8zsKS1kZoKInthBijibksgP2DZnJ8ECgcDmFT7H1AlsDdZMmwvufGhD5gfu2FvsygwKBgQCB2O/jxm2KPQmlOppBhbPX/kOM0qPq33CRddCrwQ+1BPSKt/VxbI3i7mSbO+PRjw+nfk7n6rvZv8Z7Q3SSehpU4Prv7G5u7HS6poOxjGTfsRHTtlxhEm5kHGELIn++AKTGRCkBaoE8Qd9bL1movV/3L7HOmUt7OpLoXFjHKN97MwKBgHNDzpDjed7K1s/D//qkxHuKHi8zg03YBCQSpN4eg+bvV6y20k8gb777Mrp+vpVufJRhRLOdQ6jYb6ozl0+HHSL7mqIqUugrJ8Ef8ov/60y9QmQUXYt9UbT4ckdANCD462kFOtOASxdpQRNSlVUo40YAbeJ7z8CC40QIY1U3ujXZAoGAD6qm393+d+o+0lOqaDdppigapW1Wu62c7dg/nTc180g8aYPXMhXSL+uBj6I1iq2icSUelRJgLKUtR09fGIgn/heqFd8xhrQiNIcv3YcXOB5xtlXnc3nbYRG8BwFQDXtPgFk/pGC51GtcQWW6rP6w1y5UjSZ9foLhdoNZPzVay0A=
-----END RSA PRIVATE KEY-----';
        $context['public_key'] = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlvkRFHJEa3kHQnTUtRMf/ULZcXHqwCCZ9wVD71cr0F0NMwi748K33lmd53xqF4GqbTsxtPMBPHOPWPZ8Gzi1HEALyv99t4MYeQD4C2xINEfKBeVRWkH20o4DO7kfhFFScTDof8hAxE1WeC0i6KXPnIERpLvj9Kr7mHTL8Aar+wtZ3+L66u6jdPpDw423GcTKG6ppdmkHGpTMRRT7wYZumQflKoKTQN+2PnrZZYtCJsGxCscQ5cm5u/nIhV6EXuJqwb8wAZTosO47m9CnoRt0iwO7j8dXuc6elpUEkF3JvRdY8yWzwpbgFkfo45oAm/YinLYuS6avzKaiVux7QW7jVQIDAQAB
-----END PUBLIC KEY-----';

        return $context;
    }

    private function union_php_sdk_context(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDZUJN33V+dSfvd
fL0Mu+39XrZNXFFMQSy1V15FpncHeV47SmV0TzTqZc7hHB0ddqAdDi8Z5k3TKqb7
6sOwYr5TcAfuR6PIPaleyE0/0KrljBum2Isa2Nyq7Dgc3ElBQ6YN4l/a+DpvKaz1
FSKmKrhLNskqokWVSlu4g8OlKlbPXQ9ibII14MZRQrrkTmHYHzfi7GXXM0thAKuR
0HNvyhTHBh4/lrYM3GaMvmWwkwvsMavnOex6+eioZHBOb1/EIZ/LzC6zuHArPpyW
3daGaZ1rtQB1vVzTyERAVVFsXXgBHvfFud3w3ShsJYk8JvMwK2RpJ5/gV0QSARcm
LDRUAlPzAgMBAAECggEBAMc7rDeUaXiWv6bMGbZ3BTXpg1FhdddnWUnYE8HfX/km
OFI7XtBHXcgYFpcjYz4D5787pcsk7ezPidAj58zqenuclmjKnUmT3pfbI5eCA2v4
C9HnbYDrmUPK1ZcADtka4D6ScDccpNYNa1g2TFHzkIrEa6H+q7S3O2fqxY/DRVtN
0JIXalBb8daaqL5QVzSmM2BMVnHy+YITJWIkP2a3pKs9C0W65JGDsnG0wVrHinHF
+cnhFZIbaPEI//DAFMc9NkrWOKVRTEgcCUxCFaHOZVNxDWZD7A2ZfJB2rK6eg//y
gEiFDR2h6mTaDowMB4YF2n2dsIO4/dCG8vPHI20jn4ECgYEA/ZGu6lEMlO0XZnam
AZGtiNgLcCfM/C2ZERZE7QTRPZH1WdK92Al9ndldsswFw4baJrJLCmghjF/iG4zi
hhBvLnOLksnZUfjdumxoHDWXo2QBWbI5QsWIE7AuTiWgWj1I7X4fCXSQf6i+M/y2
6TogQ7d0ANpZFyOkTNMn/tiJvLECgYEA22XqlamG/yfAGWery5KNH2DGlTIyd6xJ
WtJ9j3jU99lZ0bCQ5xhiBbU9ImxCi3zgTsoqLWgA/p00HhNFNoUcTl9ofc0G3zwT
D1y0ZzcnVKxGJdZ6ohW52V0hJStAigtjYAsUgjm7//FH7PiQDBDP1Wa6xSRkDQU/
aSbQxvEE8+MCgYEA3bb8krW7opyM0XL9RHH0oqsFlVO30Oit5lrqebS0oHl3Zsr2
ZGgoBlWBsEzk3UqUhTFwm/DhJLTSJ/TQPRkxnhQ5/mewNhS9C7yua7wQkzVmWN+V
YeUGTvDGDF6qDz12/vJAgSwDDRym8x4NcXD5tTw7mmNRcwIfL22SkysThIECgYAV
BgccoEoXWS/HP2/u6fQr9ZIR6eV8Ij5FPbZacTG3LlS1Cz5XZra95UgebFFUHHtC
EY1JHJY7z8SWvTH8r3Su7eWNaIAoFBGffzqqSVazfm6aYZsOvRY6BfqPHT3p/H1h
Tq6AbBffxrcltgvXnCTORjHPglU0CjSxVs7awW3AEQKBgB5WtaC8VLROM7rkfVIq
+RXqE5vtJfa3e3N7W3RqxKp4zHFAPfr82FK5CX2bppEaxY7SEZVvVInKDc5gKdG/
jWNRBmvvftZhY59PILHO2X5vO4FXh7suEjy6VIh0gsnK36mmRboYIBGsNuDHjXLe
BDa+8mDLkWu5nHEhOxy2JJZl
-----END RSA PRIVATE KEY-----';
        $context['public_key'] = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlvkRFHJEa3kHQnTUtRMf/ULZcXHqwCCZ9wVD71cr0F0NMwi748K33lmd53xqF4GqbTsxtPMBPHOPWPZ8Gzi1HEALyv99t4MYeQD4C2xINEfKBeVRWkH20o4DO7kfhFFScTDof8hAxE1WeC0i6KXPnIERpLvj9Kr7mHTL8Aar+wtZ3+L66u6jdPpDw423GcTKG6ppdmkHGpTMRRT7wYZumQflKoKTQN+2PnrZZYtCJsGxCscQ5cm5u/nIhV6EXuJqwb8wAZTosO47m9CnoRt0iwO7j8dXuc6elpUEkF3JvRdY8yWzwpbgFkfo45oAm/YinLYuS6avzKaiVux7QW7jVQIDAQAB
-----END PUBLIC KEY-----';

        return $context;
    }

    private function union_bat_context(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCW+REUckRreQdCdNS1Ex/9QtlxcerAIJn3BUPvVyvQXQ0zCLvjwrfeWZ3nfGoXgaptOzG08wE8c49Y9nwbOLUcQAvK/323gxh5APgLbEg0R8oF5VFaQfbSjgM7uR+EUVJxMOh/yEDETVZ4LSLopc+cgRGku+P0qvuYdMvwBqv7C1nf4vrq7qN0+kPDjbcZxMobqml2aQcalMxFFPvBhm6ZB+UqgpNA37Y+etlli0ImwbEKxxDlybm7+ciFXoRe4mrBvzABlOiw7jub0KehG3SLA7uPx1e5zp6WlQSQXcm9F1jzJbPCluAWR+jjmgCb9iKcti5Lpq/MpqJW7HtBbuNVAgMBAAECggEAedpNjtMrphLpaRojFIN7Lk7mckofzzKBEn+NdYBGPMbeAHLsM8jV3wE2EcC5YH+nrsI4PHRmawRajtNjGBWNGGAZJJ9SOOv2tLOzgITFQm0vAdM09kSHkypMMcgZSBLbF8EB5yEaJVbGk/jaVCyAhTEnrG56buAScdrTP8gix1wEq1Ivzto48dqw681WERHDWWGNqqZDEZ8Sy+BRjieceFf1URqZcKdyxb1MKl4py/IsbcubOfFSWOXpBdKooSA/CPH8oia/P6LCg7v58AUQNCcm1ZLpWctMfhuQye0qD3ei5+5kj5sbAbfgE0cCONxWeXL8JvmJhUTezrw6RcUfgQKBgQDBvmrikAzfeaS6pkfdWxmISSHCLHOY52IsNGXdrlFjU0d4tus62WIJRM0lK6SqgjOSn9cBJWY9C1ZpbGOzLJkAMDYXt8Pe42jmW0ZC8f8yOQue2oelfW3xpLMFkD11Fq7JbDMcyJTrai9eGnRA4DvNblTLAkqAXVYkogMn9pLLRwKBgQDHfERkZCAj8VPRj+KR5JL/o5Wg4VM3GwcV3kJBoARdC0ROhIzDXWuKENTMqJUwJAhZHROjUNJQgKp8d1ECgRKXb7EGOdk9V/b/RJMTyKsz8zsKS1kZoKInthBijibksgP2DZnJ8ECgcDmFT7H1AlsDdZMmwvufGhD5gfu2FvsygwKBgQCB2O/jxm2KPQmlOppBhbPX/kOM0qPq33CRddCrwQ+1BPSKt/VxbI3i7mSbO+PRjw+nfk7n6rvZv8Z7Q3SSehpU4Prv7G5u7HS6poOxjGTfsRHTtlxhEm5kHGELIn++AKTGRCkBaoE8Qd9bL1movV/3L7HOmUt7OpLoXFjHKN97MwKBgHNDzpDjed7K1s/D//qkxHuKHi8zg03YBCQSpN4eg+bvV6y20k8gb777Mrp+vpVufJRhRLOdQ6jYb6ozl0+HHSL7mqIqUugrJ8Ef8ov/60y9QmQUXYt9UbT4ckdANCD462kFOtOASxdpQRNSlVUo40YAbeJ7z8CC40QIY1U3ujXZAoGAD6qm393+d+o+0lOqaDdppigapW1Wu62c7dg/nTc180g8aYPXMhXSL+uBj6I1iq2icSUelRJgLKUtR09fGIgn/heqFd8xhrQiNIcv3YcXOB5xtlXnc3nbYRG8BwFQDXtPgFk/pGC51GtcQWW6rP6w1y5UjSZ9foLhdoNZPzVay0A=
-----END RSA PRIVATE KEY-----';

        $context['public_key'] = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAr50XGgVgM+8NnK3fDoMkqy0E+KcnnA6lQflB0Oet1zemVIzzn+76tPS0vV02OcpVu9dPt5iq83pMKBLY9isUuyRUWz8fn8Z7o3KvBoCRK4edtui/ihUt5vysJ920s8aGCbBRAdRmdIa44ha6W61KEJqrhw5iI2QkDK6OgVxs7imXgYiMc5lxLQL+9bRRGbKqzCAidolds633dQC58GZCtKIGvnwuDo8GGVTtjci7OU4c+54vtss2aDnE4QfLY4OY1y+YXqy0D8Pax9T8ZnX7op8rCcO7FyH+0xgYA6gGnFlE3puiqxCFXCD7QI0np/bAXuZ6tIoBrqKGvsUobVO3swIDAQAB
-----END PUBLIC KEY-----';

        return $context;
    }


    /**
     * {
     * "code": "000000",
     * "message": "请求成功",
     * "data": {
     * "app_id":"wxedkjilkj45jkej4545kij",
     * "mch_id": "1475050802",
     * "sub_mch_id": "123456",
     * "timestamp": 1597114649,
     * "nonce_str": "ZPC8U3YZgsgOn7vykwjLslSCFZ72Yy6e",
     * "serial_no": "223D565F5C46178A8702D2773AA88C0A6FCDD871",
     * "mch_sign": "M0KD6C+7+nJId5oddYbWgMihsbOsvtBpkqBCF97tfw43zldfkmG7hlOnnmilbD0JC6KinRwB444YTvrlRGKy+yXVSwQwBEcoX5d5tJFXBqx9dsDgqrZZSiNf1rD7HZBbBKqFJ90G10j083MqdszkUqPmQaALWRR55LHp8u+nq+JLWTPWe6fyWti9mSt3D+Jjf0VfVyxSiabZvCbV964PD1iemnbtUIxG+qHOYccRDJc8AWU/yM9rL/SJL0bVSa5kMkIaDyQhpr71qUCnXjoTzqBbv7hC0okX1DgeTs2ntNUkzBtIOvjkgpxvCHFS+0iEsV9Fetjl536hd8H6nrGBqQ==",
     * "sign": "9249ac90980de00920176493fbad9ff2"
     * }
     * }
     * @return void
     * @throws Exception
     */
    public function testWxInitSign()
    {

         $context = $this->union_match_context();
//        $context = $this->union_php_sdk_context();

        $randStr    = "ZPC8U3YZgsgOn7vykwjLslSCFZ72Yy6e";
        $time       = 1597114649;
        $package    = "mch_id=1475050802&sub_mch_id=123456";
        $strForSign = "wxedkjilkj45jkej4545kij\n$time\n$randStr\n$package\n";

        print_r($strForSign);

        $rsa = new RSA($context);
        $localSign = $rsa->sign2($strForSign, "",OPENSSL_ALGO_SHA256);
        $localSign2 = $rsa->sign2($strForSign, "",OPENSSL_ALGO_SHA256);

        $this->assertEquals($localSign,$localSign2);

        print_r($localSign);

        $verify = $rsa->verify2($strForSign, $localSign, '', OPENSSL_ALGO_SHA256);

        $this->assertTrue($verify);
    }

    public function testWxPhpSDKign()
    {

        $context = $this->union_php_sdk_context();
        $strForSign = "source";

        $sdkSign = "BKyAfU4iMCuvXMXS0Wzam3V/cnxZ+JaqigPM5OhljS2iOT95OO6Fsuml2JkFANJU9K6q9bLlDhPXuoVz+pp4hAm6pHU4ld815U4jsKu1RkyaII+1CYBUYC8TK0XtJ8FwUXXz8vZHh58rrAVN1XwNyvD1vfpxrMT4SL536GLwvpUHlCqIMzoZUguLli/K8V29QiOhuH6IEqLNJn8e9b3nwNcQ7be3CzYGpDAKBfDGPCqCv8Rw5zndhlffk2FEA70G4hvMwe51qMN/RAJbknXG23bSlObuTCN7Ndj1aJGH6/L+hdwfLpUtJm4QYVazzW7DFD27EpSQEqA8bX9+8m1rLg==";

        $rsa = new RSA($context);
        $localSign = $rsa->sign2($strForSign, "",OPENSSL_ALGO_SHA256);
        print_r($localSign);
        print_r($sdkSign);

        $this->assertEquals($localSign,$sdkSign);
//
//        $verify = $rsa->verify2($strForSign, $localSign, '', OPENSSL_ALGO_SHA256);
//
//        $this->assertTrue($verify);
    }

    private function union_hx_context(): array
    {
        $context = [];
        $context['private_key'] = '-----BEGIN RSA PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCW+REUckRreQdCdNS1Ex/9QtlxcerAIJn3BUPvVyvQXQ0zCLvjwrfeWZ3nfGoXgaptOzG08wE8c49Y9nwbOLUcQAvK/323gxh5APgLbEg0R8oF5VFaQfbSjgM7uR+EUVJxMOh/yEDETVZ4LSLopc+cgRGku+P0qvuYdMvwBqv7C1nf4vrq7qN0+kPDjbcZxMobqml2aQcalMxFFPvBhm6ZB+UqgpNA37Y+etlli0ImwbEKxxDlybm7+ciFXoRe4mrBvzABlOiw7jub0KehG3SLA7uPx1e5zp6WlQSQXcm9F1jzJbPCluAWR+jjmgCb9iKcti5Lpq/MpqJW7HtBbuNVAgMBAAECggEAedpNjtMrphLpaRojFIN7Lk7mckofzzKBEn+NdYBGPMbeAHLsM8jV3wE2EcC5YH+nrsI4PHRmawRajtNjGBWNGGAZJJ9SOOv2tLOzgITFQm0vAdM09kSHkypMMcgZSBLbF8EB5yEaJVbGk/jaVCyAhTEnrG56buAScdrTP8gix1wEq1Ivzto48dqw681WERHDWWGNqqZDEZ8Sy+BRjieceFf1URqZcKdyxb1MKl4py/IsbcubOfFSWOXpBdKooSA/CPH8oia/P6LCg7v58AUQNCcm1ZLpWctMfhuQye0qD3ei5+5kj5sbAbfgE0cCONxWeXL8JvmJhUTezrw6RcUfgQKBgQDBvmrikAzfeaS6pkfdWxmISSHCLHOY52IsNGXdrlFjU0d4tus62WIJRM0lK6SqgjOSn9cBJWY9C1ZpbGOzLJkAMDYXt8Pe42jmW0ZC8f8yOQue2oelfW3xpLMFkD11Fq7JbDMcyJTrai9eGnRA4DvNblTLAkqAXVYkogMn9pLLRwKBgQDHfERkZCAj8VPRj+KR5JL/o5Wg4VM3GwcV3kJBoARdC0ROhIzDXWuKENTMqJUwJAhZHROjUNJQgKp8d1ECgRKXb7EGOdk9V/b/RJMTyKsz8zsKS1kZoKInthBijibksgP2DZnJ8ECgcDmFT7H1AlsDdZMmwvufGhD5gfu2FvsygwKBgQCB2O/jxm2KPQmlOppBhbPX/kOM0qPq33CRddCrwQ+1BPSKt/VxbI3i7mSbO+PRjw+nfk7n6rvZv8Z7Q3SSehpU4Prv7G5u7HS6poOxjGTfsRHTtlxhEm5kHGELIn++AKTGRCkBaoE8Qd9bL1movV/3L7HOmUt7OpLoXFjHKN97MwKBgHNDzpDjed7K1s/D//qkxHuKHi8zg03YBCQSpN4eg+bvV6y20k8gb777Mrp+vpVufJRhRLOdQ6jYb6ozl0+HHSL7mqIqUugrJ8Ef8ov/60y9QmQUXYt9UbT4ckdANCD462kFOtOASxdpQRNSlVUo40YAbeJ7z8CC40QIY1U3ujXZAoGAD6qm393+d+o+0lOqaDdppigapW1Wu62c7dg/nTc180g8aYPXMhXSL+uBj6I1iq2icSUelRJgLKUtR09fGIgn/heqFd8xhrQiNIcv3YcXOB5xtlXnc3nbYRG8BwFQDXtPgFk/pGC51GtcQWW6rP6w1y5UjSZ9foLhdoNZPzVay0A=
-----END RSA PRIVATE KEY-----';
        $context['public_key'] = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCm9OV6zH5DYH/ZnAVYHscEELdCNfNTHGuBv1nYYEY9FrOzE0/4kLl9f7Y9dkWHlc2ocDwbrFSm0Vqz0q2rJPxXUYBCQl5yW3jzuKSXif7q1yOwkFVtJXvuhf5WRy+1X5FOFoMvS7538No0RpnLzmNi3ktmiqmhpcY/1pmt20FHQQIDAQAB
-----END PUBLIC KEY-----';

        return $context;
    }


    public function testHxSign(){
        $context = $this->union_hx_context();
        $strForSign = "appid=00227282&cusid=56188105814XH2E&errmsg=商户已冻结或关闭&randomstr=411304175507&reqsn=32206232917375581977291657216&retcode=SUCCESS&trxstatus=3999";

        $sign = "iK+a1Q14ALvK+2JMlU6h16W5uYhqgXZMDJm3ym2J2+yDrdkk6ofdB7SZOQ8wliKXPnQ/FDw/Avzm3O+W79fAsq8DUk2XqRuZM5uoHOPhUz57deqRO/hZ8aFKz+jyb/xiiEBcnbn3HFv19xrjK4bmqrdQEGWYf4wjWCMydfVQEOY=";

        $rsa = new RSA($context);
        $verify = $rsa->verify2($strForSign, $sign, '', OPENSSL_ALGO_SHA1);

        $this->assertTrue($verify);
    }

    public function openapiWxInitSign(string $data, string $mchPrivateKey): string
    {
        openssl_sign($data, $rawSignature, $mchPrivateKey, OPENSSL_ALGO_SHA256);

        return base64_encode($rawSignature);
    }
}
