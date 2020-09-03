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
 * generates error messages
 *
 * @param array $form
 * @param array $form_values
 * @return bool
 */
// pasako true ar false - jei forma uzpildyta teisingai
function validate_form(&$form, $form_values)
{
    $success = true;
    foreach ($form['fields'] as $field_key => &$field) {
        $field_value = $form_values[$field_key];
//        var_dump($field_value);
        foreach ($field['validators'] as $validator) {
//            var_dump($field['validators']);
//            var_dump($validator);
            if (is_callable($validator)) {
                if ($validator($field_value, $field)) {
                    $field['value'] = $field_value;
                } else {
                    $success = false;
                    break;
                }
            } else {
                throw new Exception('Tokio validatoriaus nera' . $validator);
            }
        }
    }
    return $success;
}


