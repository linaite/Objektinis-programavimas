<?php
/**
 * validating if input value is not empty
 *
 * @param $field_value
 * @param array $field
 * @return bool
 */
function validate_field_not_empty($field_value, &$field)
{
    if ($field_value === '') {
        $field['error'] = 'Prašome užpildyti laukelį';
    } else {
        return true;
    }
}

/**
 * validating if input value is number
 *
 * @param   $field_value
 * @param array $field
 * @return bool
 */

function validate_field_is_number($field_value, &$field)
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Laukelio vertė privalo būti skaičius';
    } else {
        return true;
    }
}


function validate_field_is_correct_number($field_value, &$field)
{
    if ($field_value < 18 || $field_value > 100) {
        $field['error'] = 'Amžius netinkamas';
    } else {
        return true;
    }
}

function validate_field_has_space($field_value, &$field)
{

    if ($field_value == trim($field_value) && strpos($field_value, " ") == false) {
        $field['error'] = 'Tarp žodžių privalo buti tarpas';
    } else if ($field_value !== trim($field_value)) {
        $field['error'] = 'Prašome ištrinti tarpus pradžioje ir pabaigoje laukelio';
    } else {
        return true;
    }
}

function validate_field_is_num_from100to200($field_value, &$field)
{
    if ($field_value < 100 || $field_value > 200) {
        $field['error'] = 'Skaičius neatitinka sąlygos';
    } else {
        return true;
    }
}

function validate_field_is_num_from50to100($field_value, &$field)
{
    if ($field_value < 50 || $field_value > 100) {
        $field['error'] = 'Skaičius neatitinka sąlygos';
    } else {
        return true;
    }
}







