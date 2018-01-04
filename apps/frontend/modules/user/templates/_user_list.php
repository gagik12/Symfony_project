<? /** @var User[] $users */ ?>

<?php foreach ($users as $user): ?>
    <div class="box-row">
        <div class="box"><a href="<?= url_for("@edit_user?login=" . $user->getLogin()) ?>"><?= $user->getLogin() ?></a></div>
        <div class="box"><?= $user->getFirstName() ?></div>
        <div class="box"><?= $user->getLastName() ?></div>
        <div class="box"><?= $user->getRole() ?></div>
    </div>
<?php endforeach; ?>