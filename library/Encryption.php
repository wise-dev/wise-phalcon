<?php
namespace Wise\Library;
use Phalcon\Di\Injectable;

class Encryption extends Injectable
{
    private $KEY;
    public function __construct($encryption_key)
    {
        $this->KEY = $encryption_key;
    }
    public function encrypt($Data)
    {
        $original_data = ($Data);
        $length        = strlen($original_data);
        $Data          = $length . '#' . $original_data;
        $plain_text    = $Data;
        $td            = mcrypt_module_open('des', '', 'ecb', '');
        $key           = substr($this->KEY, 0, mcrypt_enc_get_key_size($td));
        $iv_size       = mcrypt_enc_get_iv_size($td);
        $iv            = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        if (mcrypt_generic_init($td, $key, $iv) != -1) {
            $c_t = mcrypt_generic($td, $plain_text);
            mcrypt_generic_deinit($td);
        }
        mcrypt_module_close($td);
        $Buf = "";
        for ($i = 1; $i <= strlen($c_t); $i++) {
            $Tmp = ord(substr($c_t, $i - 1, 1));
            for ($j = strlen($Tmp) + 1; $j <= 3; $j++) {
                $Tmp = '0' . $Tmp;
            }
            $Buf .= $Tmp;
        }
        return $Buf;
    }
    public function decrypt($Data)
    {
        $NbCar = strlen($Data) / 3;
        $P     = 1;
        $Buf   = "";
        for ($i = 1; $i <= $NbCar; $i++) {
            $deb = $P;
            $Tmp = chr(substr($Data, $P - 1, 3));
            $Buf .= $Tmp;
            $P = $P + 3;
        }
        $td      = mcrypt_module_open('des', '', 'ecb', '');
        $key     = substr($this->KEY, 0, mcrypt_enc_get_key_size($td));
        $iv_size = mcrypt_enc_get_iv_size($td);
        $iv      = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $DecryptData = mdecrypt_generic($td, $Buf);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $dec = explode('#', $DecryptData, 2);
        if (count($dec) > 1) {
            $CH = substr($dec[1], 0, $dec[0]);
        } else
            $CH = 'ERROR';
        return $CH;
    }
}
?>