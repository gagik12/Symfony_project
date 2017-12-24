<?php foreach ($users as $user): ?>
    <div class="box-row">
        <div class="box"><?= $user->getId() ?></div>
        <div class="box"><?= $user->getFirstName() ?></div>
        <div class="box"><?= $user->getLastName() ?></div>
        <div class="box"><?= $user->getRole() ?></div>
    </div>
<?php endforeach; ?>