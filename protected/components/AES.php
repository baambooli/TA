<?

/**
 * usage : $a = AES::aes256Encrypt("1123", 'kamran');   //encrypt
 *         $b = AES::aes256Decrypt("1123",$a);          //decrypt
 */
class AES
{

    public static function aes128Encrypt($key, $data)
    {
        if (16 !== strlen($key))
            $key = hash('MD5', $key, true);
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16)));
    }

    public static function aes256Encrypt($key, $data)
    {
        if (32 !== strlen($key))
            $key = hash('SHA256', $key, true);
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16)));
    }

    public static function aes128Decrypt($key, $data)
    {
        $data = base64_decode($data);
        if (16 !== strlen($key))
            $key = hash('MD5', $key, true);
        $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
        $padding = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$padding);
    }

    public static function aes256Decrypt($key, $data)
    {
        $data = base64_decode($data);
        if (32 !== strlen($key))
            $key = hash('SHA256', $key, true);
        $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
        $padding = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$padding);
    }

}
