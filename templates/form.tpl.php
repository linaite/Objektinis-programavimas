<form <?php print html_attr($form['attr']); ?>>
    <!-- Field generation start-->
    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>
        <input <?php print input_attr($field_id, $field); ?> />
    <?php endforeach; ?>
    <!-- Field generation end -->

    <!-- Button generation start NEBAIGTA-->
    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php print button_attr($button_id, $button); ?> >
            <?php print $button['title']; ?>
        </button>
    <?php endforeach; ?>
    <!-- Button generation end -->
</form>