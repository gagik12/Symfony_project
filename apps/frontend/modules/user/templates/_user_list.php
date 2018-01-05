<? /** @var User[] $users */ ?>

<?php foreach ($users as $user): ?>
    <div class="box-row" id="box_hover">
        <div class="box"><a href="<?= url_for("@edit_user?login=" . $user->getLogin()) ?>"><?= $user->getLogin() ?></a></div>
        <div class="box"><?= $user->getFirstName() ?></div>
        <div class="box"><?= $user->getLastName() ?></div>
        <div class="box"><?= $user->getRole() ?></div>
        <div class="delete-block-size">
            <div class="delete-block-size delete"></div>
        </div>
    </div>
<?php endforeach; ?>

