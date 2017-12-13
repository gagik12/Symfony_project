<? /** @var sfForm $registrationForm */ ?>
<form method="post" action="">
    <div>
        <?= $registrationForm['login']->render() ?>
        <?= $registrationForm['password']->render() ?>
        <?= $registrationForm['first_name']->render() ?>
        <?= $registrationForm['last_name']->render() ?>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<? include_partial('print_error_messages', ['form' => $registrationForm]) ?>