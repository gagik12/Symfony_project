<? /** @var User[] $users */ ?>

<?php foreach ($users as $user): ?>
    <div class="box-row">
        <div class="box login"><a href="<?= url_for("@edit_user?login=" . $user->getLogin()) ?>"><?= $user->getLogin() ?></a></div>
        <div class="box"><?= $user->getFirstName() ?></div>
        <div class="box"><?= $user->getLastName() ?></div>
        <div class="box"><?= $user->getRole() ?></div>
        <div class="icon-bar-size">
            <div class="icon-bar" style="display: none">
                <a class="deleteIcon popup-link"></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

