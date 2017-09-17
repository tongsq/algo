<?php
/**
 * @author tongsq
 * @since 2017/9/16
 * @desc 简化json协议，编码与解码实现
 */
namespace algo\tools;

class SimpleJson{

    const SPECIAL_CHAR = array('{', '}', '[', ']', ',', ':');

    public static function encode($obj)
    {
        $str = '';
        if (is_object($obj)){
            $str .= self::encodeObj($obj);
        }
        elseif (is_array($obj)){
            $str .= self::encodeArr($obj);
        }
        else{
            $str .= $obj;
        }
        return $str;
    }

    public static function decode(string $str)
    {
        $tokens = self::createToken($str);
        $result = self::decodeToken($tokens);
        return $result;
    }

    private static function decodeToken(array &$tokens)
    {
        $token = array_shift($tokens);
        if ($token == '{'){ //parse object
            $obj = new \stdClass();
            while(!empty($tokens)){
                $token2 = array_shift($tokens);
                if ($token2 == '}'){
                    break;
                }
                if ($token2 == ','){
                    continue;
                }
                if (!in_array($token2, self::SPECIAL_CHAR)){
                    if (array_shift($tokens) !== ':'){
                        throw new Exception("SimpleJson Parse Error,Unexpected:{$tokens}");
                    }
                    $obj->$token2 = self::decodeToken($tokens);
                }
            }
            return $obj;
        }
        if ($token == '['){ //parse array
            $arr = array();
            while(!empty($tokens)){
                if ($tokens[0] == ']'){
                    array_shift($tokens);
                    break;
                }
                if ($tokens[0] == ','){
                    array_shift($tokens);
                    continue;
                }
                $arr[] = self::decodeToken($tokens);
            }
            return $arr;
        }
        return $token; //parse string
    }

    private static function createToken($str){
        $tokens = array();
        $len = strlen($str);
        $tmp = '';
        for ($i=0; $i<$len; $i++){
            $char = $str[$i];
            if (in_array($char, self::SPECIAL_CHAR)){
                if ($tmp){
                    $tokens[] = $tmp;
                    $tmp = '';
                }
                $tokens[] = $char;
            }
            else{
                $tmp .= $char;
            }
        }
        return $tokens;
    }

    private static function encodeObj($obj)
    {
        $str = '{';
        foreach ($obj as $key=>$value){
            if ($str != '{') {
                $str .= ',';
            }
            $str .= "{$key}:" . self::encode($value);
        }
        $str .= '}';
        return $str;
    }
    
    private static function encodeArr(array $arr)
    {
        $str = '[';
        foreach ($arr as $key=>$value){
            if ($str != '['){
                $str .= ',';
            }
            $str .= self::encode($value);
        }
        $str = ltrim($str, ',');
        $str .= ']';
        return $str;
    }
}

