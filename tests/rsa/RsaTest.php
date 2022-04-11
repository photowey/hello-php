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
}
