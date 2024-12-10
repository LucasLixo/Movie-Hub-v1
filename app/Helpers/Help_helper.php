<?php

// ============================================================
function aesEncrypt($string)
{

    // ENCRYPT STRING
    return bin2hex(openssl_encrypt($string, 'aes-256-cbc', $_ENV['AES_KEY'], OPENSSL_RAW_DATA, $_ENV['AES_IY']));
}

// ============================================================
function aesDecrypt($string)
{

    if (strlen($string) % 2 != 0) {
        return -1;
    }

    // DECRYPT STRING
    return openssl_decrypt(hex2bin($string), 'aes-256-cbc', $_ENV['AES_KEY'], OPENSSL_RAW_DATA, $_ENV['AES_IY']);
}

?>