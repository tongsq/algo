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
