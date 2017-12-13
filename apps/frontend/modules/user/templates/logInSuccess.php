<? /** @var sfForm $logInform */ ?>
<form method="post" action="">
    <div>
        <?= $logInform['login']->render() ?>
        <?= $logInform['password']->render() ?>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<? include_partial('print_error_messages', ['form' => $logInform]) ?>