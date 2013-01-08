<?

/**
 * usage :  $key = 'my key for encryption.....';
 *          $a = AES::aes256Encrypt($key, 'my string....kamran');   //encrypt
 *          $b = AES::aes256Decrypt($key, $a);          //decrypt
 * 
 * I have implemented encryt/decript using base64_encode/decode 
 * to make binary data to ASCII so we can save them in DB safely.
 * 
 *  Kamran
 * 
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
