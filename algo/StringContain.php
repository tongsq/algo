function StringContain(string $strA, string $strB){
    $hash = 0;
    for($i = 0; $i<strlen($strA); $i++){
        $hash |= 1<<(ord($strA[$i]) - ord('A'));
    }
    for($i = 0; $i<strlen($strB); $i++){
        if (($hash & (1<<(ord($strB[$i]) - ord('A')))) == 0){
            return false;
        }
    }
    return true;
}
var_dump(StringContain('ABCDAA', 'BDACCCC'));

//回文判断
function IsPalindrome(string $str){
    $len = strlen($str);
    for($i=0,$j=$len-1; $i<$j; $i++,$j--){
        if ($str[$i] !== $str[$j]){
            return false;
        }
    }
    return true;
}
$str = 'abccba';
var_dump(IsPalindrome($str));
