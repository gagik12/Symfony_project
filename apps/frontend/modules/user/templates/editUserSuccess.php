<? /** @var sfForm $editUserForm */ ?>
    <h1>Редактирование профиля</h1>
    <form method="post" action="">
        <div>
            <?= $editUserForm['first_name']->render(['value' => $currentFirstName], '') ?>
            <?= $editUserForm['last_name']->render(['value' => $currentLastName], '') ?>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

<? include_partial('print_error_messages', ['form' => $editUserForm]) ?>