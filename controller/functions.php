<?php

function changeGenderValueToFullValue($value)
{
    $fullValue = '';

    switch($value) {

    case 'H':
            $fullValue = 'Hombre';
            break;
    case 'M':
            $fullValue = 'Mujer';
            break;
    case 'N':
            $fullValue = 'No definido';
            break;

    default:
            echo 'Not found full value name for the value: ', $value;
    }

    return $fullValue;

}


?>