<?php

return [
    'alipay' => [
        'app_id'         => '2016101000649875',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA30ZN+5ZDxnXvpOoASqBMTqjYWhd6xQYI2stgbF8RxU2Wk8EYM8D6FClndZ48h7rN7n9f5Ir1CanZxZ5rPkWc0IR0vI2ZDWw10rUEMG5w0SHDE/Gpy8N4HieLh0i+y+uKwo/kvovZBRAstlc56MfNp+ZlOI1QpTX8zWQsCj+vIEyfs+rka759DA78BQThjVRuG0pFEbqiGLq6rGgMWTotGM4Xg+ocTR9yQvZBjEUZZ58qtO1SAkYWm+p/FPN1rksv8O3pMdH7QXnBSsu7g8lUltiyenqZmTunb8uPseD0bB50WdHMGYq/wKRxMa0GlxaqGeMkGAL6RmbpjywgBNeDnwIDAQAB',
        'private_key'    => 'MIIEpQIBAAKCAQEA30ZN+5ZDxnXvpOoASqBMTqjYWhd6xQYI2stgbF8RxU2Wk8EYM8D6FClndZ48h7rN7n9f5Ir1CanZxZ5rPkWc0IR0vI2ZDWw10rUEMG5w0SHDE/Gpy8N4HieLh0i+y+uKwo/kvovZBRAstlc56MfNp+ZlOI1QpTX8zWQsCj+vIEyfs+rka759DA78BQThjVRuG0pFEbqiGLq6rGgMWTotGM4Xg+ocTR9yQvZBjEUZZ58qtO1SAkYWm+p/FPN1rksv8O3pMdH7QXnBSsu7g8lUltiyenqZmTunb8uPseD0bB50WdHMGYq/wKRxMa0GlxaqGeMkGAL6RmbpjywgBNeDnwIDAQABAoIBAQDDiFxvAi+ktFAEyvEqaauqD3A5pepcdWZ3xjhRcAiuE77U8vvxBwV7dq8mcEduToheX6ppCdCCf/85c/1Tcb9dVUKuhgsNmECioOhkSbP/UmP3KWKcEjk1n0gwV+LPzx2cOkwHG44ZQwsFPOp4E9LlQX5PwmJn7RnR/fIbn54M16sMeM/mkheH830/3sGro8wRrga7oV+vVAkkEfQ7FsmoqTdo2fIVHcoKXGO269IP3srrHbyVEQ68CeCo73VqB7QtHJlrKTFZmVtg59/nZlzQpSGt5e2fLPzLgAmfWuy3EfQ0SwhAuBvZCLLOVYVYY4o8JPsWZ2UIdr3BeEC33J7hAoGBAPNDB4IwW4JNqQOOZoXZ9K2u1iDEJjQ9cpm+j7WUvBhG71xs9LNHZmZUCY2kEM9o+bkm3L9/IBLNUxz2siO7nWoczWearvhvE17tAnJMkR3x1Zy4A5c4PRuFQD7fbmcElX0k/TZwDI5+IIuPEcQQEwRms4DxQhOogieJ/QbstbYpAoGBAOr3V9D1qWie9z/OSH9kGOm2HwSL6vbAfm1qXZQcdv6wlSklLB4HiMn0Vm6BoEnoKXxSn2Cx6/xqasIjUlbkcfU65mTQHrxVzNE94ULwTphCpIg1dKW9jcLW3sF8R3Jf3DMrvA8Vh/MBZBhYZJg9INec+g/84I3otpnJWihpJ1SHAoGBAOp1Fz6OVxRuv1BzJjMqD956XV01UFEXTGYMObxcPzHy5G6jgPFuBq7nnlGK6LzPQ6kFYMucvhABH3MR/j3cbOrCGeMaPjup6vSZ4LrDOzauSCEFZkiQZq0or/QpKuJVk7MLPJYERsXroHiCCzB6AapDRg0n+nSx+8gaAepzqOuJAoGAF6mhJmIXFXos3DgiBPJHsAGvTf3pQ8BO+yXjFq9nLG8MFoCv2LZZiD0bFzXmtoqy4tpPQqWoZlsxNSvpdua6sz+jRDPRZJYfclMRBHS+9YaAm1cG0EoupJiPBl1FtLcCrgSRg9NfRZG2St1cBBjj3dLpPALzelcdTI+CjN9KHrECgYEAinAP973KrGpLR0zHCP2d9W0BsL26xypS+kwqnxOko4XciGLmxUFZp12S9PG6JWTHjB9jOSHyptYNRTMe7RSt5fWfSE9CApAdRKCqVORJem0s0ki2tXecZmKDMb2pw9qT9Pr/rNHBWKajrtUJdLEgrCQBZox85ldUMS9onPwl78E=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
