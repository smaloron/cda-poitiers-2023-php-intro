<?php if(count($errors) > 0): ?>
<ul>
    <?php foreach($errors as $message): ?>
    <li><?= $message ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>