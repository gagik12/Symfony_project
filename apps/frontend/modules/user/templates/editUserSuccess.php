<?
/**
 * @var sfForm $editUserForm
 * @var User $user
 * @var boolean $isDeleteButtonVisible
 */
?>
<h1>Редактирование профиля: <?= $user->getLogin() ?></h1>
<form method="post" action="">
    <div>
        <?= $editUserForm['first_name']->render(['value' => $user->getFirstName()], '') ?>
        <?= $editUserForm['last_name']->render(['value' => $user->getLastName()], '') ?>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<? if ($isDeleteButtonVisible): ?>
    <div class="delete-button">
        <a class="popup-link">Удалить</a>
    </div>
<? endif ?>
<? include_partial('print_error_messages', ['form' => $editUserForm]) ?>
<? include_partial('pop_up', ['login' => $user->getLogin()]) ?>

