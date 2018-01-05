<?
/**
 * @var sfForm $editUserForm
 * @var string $currentFirstName
 * @var string $currentLastName
 */
?>
<h1>Редактирование профиля: <?= $login ?></h1>
<form method="post" action="">
    <div>
        <?= $editUserForm['first_name']->render(['value' => $currentFirstName], '') ?>
        <?= $editUserForm['last_name']->render(['value' => $currentLastName], '') ?>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<div class="delete-button">
    <a class="popup-link">Удалить</a>
</div>
<? include_partial('print_error_messages', ['form' => $editUserForm]) ?>
<div class="popup-box" style="width: 400px; left: 474.5px; top: 290px;">
    <div class="close-x close-popup">X</div>
    <div class="top"><h2>Вы действительно хотите удалить пользователя?</h2></div>
    <div class="bottom">
        <a href="<?= url_for("@delete_user?login=" . $login) ?>">Да</a>
        <a class="close-popup">Нет</a>
    </div>
</div>
<div class="cover"></div>
