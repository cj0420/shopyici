<?php
function buildRandomString( $type = 1,$length = 4)
{
    if ($type == 1) {
        $char = join("", range(0, 9));
    } elseif ($type == 2) {
        $char = join("", array_merge(range("a", "z"), range("A", "Z")));
    } elseif ($type == 3) {
        $char = join("", array_merge(range("a", "z"), range("A", "Z"), range(0, 9)));
    }
    if ($length > strlen($char)) {
        exit("字符串长度不够");
    }
    $chars = str_shuffle($char);
    return substr($chars, 0, $length);
}

?>