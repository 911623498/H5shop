<?php
/**
 * Created by PhpStorm.
 * User: 远方
 * Date: 2016/7/13
 * Time: 20:00
 */

function html_encode($array){
    if (empty($array))
        return $array;
    return is_array($array) ? array_map('html_encode', $array) : addslashes(stripslashes(str_replace(array(
        '\&quot',
        '\&#039;',
        '\\'
    ), array(
        '&quot',
        '&#039;',
        ''
    ), trim(htmlspecialchars($array, ENT_QUOTES)))));
}

/**
 * 判断变量是否存在
 */
function is_set( $param , $key , $default = '' ){

    return empty( $param[$key] ) ? $default : $param[$key];

}
?>