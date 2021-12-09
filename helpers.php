<?php
function array_get(array $array, string $string, $defult = null)
{
    $arrKeys = explode(".", $string);
    $result = '';
    while(is_array($array)) {
        $currentKey = array_shift($arrKeys);
        if(isset($array[$currentKey])) {
            $result = $array[$currentKey];
            $array = $array[$currentKey];
        } else {
            $result = $defult;
            break;
        }
    }
    return $result;
}

function dd(...$params)
{
    echo '<pre>';
    var_dump($params);
    echo '</pre>';
    die;
}

function dump(...$params)
{
    echo '<pre>';
    var_dump($params);
    echo '</pre>';
}
