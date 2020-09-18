<nav class="navbar">
    <?php foreach ($nav as $link): ?>
        <a href="<?php print $link['url'] ?>"><?php print $link['title']; ?></a>
    <?php endforeach; ?>
</nav>