<?php
namespace Kepler;

class Security extends \Phalcon\Security {
    public function hash($password, $workFactor = 0) {
        return sodium_crypto_pwhash_str($password, SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);
    }

    public function checkHash($password, $passwordHash, $maxPassLength = 0) {
        return sodium_crypto_pwhash_str_verify($passwordHash, $password);
    }

    public function needsRehash($hashedPassword) {
        return sodium_crypto_pwhash_str_needs_rehash($hashedPassword , SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);
    }

    public function memZeroPassword($password) {
        sodium_memzero($password);
    }
}
