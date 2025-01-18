<?php

namespace App\Utils;

class SignatureUtil {

    private function __construct() {
        // Private constructor to prevent instantiation
    }

    /**
     * SHA-256 Cryptographic operations
     * @param string $signature_string The string needs to be encrypted
     * @param string $signature_key Dedicated signature key provided by QUICK
     * @return string $sign
     */
    public static function newEncodeSHA($signature_string, $signature_key) {
        $sign = '';
        try {
            $hash = hash_hmac('sha256', $signature_string, $signature_key, true);
            $sign = base64_encode($hash);
        } catch (\Exception $e) {
            // Handle exception if necessary
        }
        return $sign;
    }
}
