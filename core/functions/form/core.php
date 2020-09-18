<!--1 uzduotis - ivesk ka nors i inputa, kad sulauzytum forma -->
<?php
//$input = filter_input_array(INPUT_POST, [
//    'vardas' => FILTER_SANITIZE_SPECIAL_CHARS
//]);
//?>
<!--<h1>Hack it!</h1>-->
<!--<h2>--><?php //print $input['vardas'] ?? ''; ?><!--</h2>-->
<!--<form method="POST">-->
<!--    <input type="text" name="vardas">-->
<!--    <input type="submit">-->
<!--</form>-->
<!---->
<!--<hr/>-->
<!--    2 uzduotis - Returninti saugiu duomenu masyva-->
<?php
//$fields = ['vardas', 'pavarde'];
//
///**
// * Sanitizing $_POST request
// *
// * @param array $field_keys
// * @return array
// */
//function sanitize_post(array $field_keys): array
//{
//    $filter_params = [];
//
//    foreach ($field_keys as $field_key) {
//        $filter_params[$field_key] = FILTER_SANITIZE_SPECIAL_CHARS;
//    }
//
//    return filter_input_array(INPUT_POST, $filter_params);
//}
//
//if (!empty($_POST)) $input = sanitize_post($fields);
//
//
//?>
<!--<form method="post">-->
<!--    <input name="vardas" type="text">-->
<!--    <input name="pavarde" type="text">-->
<!--    <button>Submit</button>-->
<!--</form>-->
<!--<p>--><?php //print $input['vardas'] ?? 'Neivesta'; ?><!--</p>-->
<!--<p>--><?php //print $input['pavarde'] ?? 'Neivesta'; ?><!--</p>-->
<!--<hr/>-->

<!--Isfiltruoti $_POST masyva pagal tai kokie formoje aprasyti laukeliai-->
<?php
/**
 * * Sanitizing array keys
 *
 * @param array $form
 * @return array
 */

//perkoduoja inputo reiksme
function sanitize_form_input_values(array $form): ?array
{
    $filter_parameters = [];

    foreach ($form['fields'] as $field_key => $field) {
        $filter_parameters[$field_key] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
    }
    return filter_input_array(INPUT_POST, $filter_parameters);
}

?>
<?php

/**
 * Validates form
 *
 * @param array $form
 * @param array $form_values
 * @return bool
 */
function validate_form(array &$form, array $form_values): bool
{
    $success = true;
    foreach ($form['fields'] as $key => &$field) {
        // go through validators array

        foreach ($field['validators'] as $validator_key => $validator) {
            //check if validator is array
            if (is_array($validator)) {
                $function = $validator_key;
                $params = $validator;
            } else {
                $function = $validator;
            }

            if ($function($form_values[$key], $field, $params ?? null)) {
                $field['value'] = $form_values[$key];
            } else {
                $success = false;
                break;
            }
        }
    }

    foreach ($form['validators'] ?? [] as $validator_key => $validator) {
        if (is_array($validator)) {
            $function = $validator_key;
            $params = $validator;
        } else {
            $function = $validator;
        }

        if (!$function($form_values, $form, $params ?? null)) {
            $success = false;
            break;
        }
    }
    return $success;
}




