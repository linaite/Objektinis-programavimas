<?php
/**
 * Generates tag attributes
 *
 * @param array $attrs
 * @return string
 */
function html_attr(array $attrs): string
{
    $attributes = [];

    foreach ($attrs as $key => $attr) {
        $attributes[] = "$key=\"$attr\"";
    }

    return implode(' ', $attributes);
}


/**
 * Generating new input field from given array
 *
 * @param string $field_id
 * @param array $field
 * @return string
 */
function input_attr(string $field_id, array $field): string
{
    $attributes = [
        'name' => $field_id,
        'type' => $field['type'],
        'value' => $field['value'] ?? ''
    ];
    $attributes += $field['extra']['attr'] ?? [];

    return html_attr($attributes);
}


/**
 * Generating button from given array
 *
 * @param string $button_id
 * @param array $button
 * @return string
 */
function button_attr(string $button_id, array $button): string
{
    $attributes = [
        'name' => $button_id,
        'value' => $button['value'] ?? ''
    ];
    $attributes += $button['extra']['attr'] ??[];

    return button_attr($attributes);
}