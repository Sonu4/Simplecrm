<?php

//   Created at : 27th Nov 2017 
//   Author     : Akash D.
//   Description: DB_COnfig_encryption
//   Organization : Simpleworks Business pvt. Ltd.
   

class Blowfish
{
    public static function getKey()
    {
        global $sugar_config;

        $key = 'crm568encrypt123';
        
        if(strlen($key) == 16 || strlen($key) == 24 || strlen($key) == 32)
            { 

                if($sugar_config['dbconfig']['filesystem_encryption_only'])
                    {
                        $result = Blowfish::strToHex($key);
                    }else{
                        $result = '';
                    }
            
                return $result;
            }else{

                echo "The key should be of length 16,24 or 32 bit only.";
                $GLOBALS['log']->security("The key should be of length 16,24 or 32 bit only.");
                exit;
            }    
    }


    public static function strToHex($string)
    {
        $hex='';
            for ($i=0; $i < strlen($string); $i++)
            {
                $hex .= dechex(ord($string[$i]));
            }
        return $hex;
    }
}    