<? /** @var sfForm $form */ ?>
<form method="post" action="">
    <div>
        <?= $logInform['login']->render() ?>
        <?= $logInform['password']->render() ?>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<ul class="error_list">
    <? $errors = $logInform->getErrorSchema()->getErrors() ?>
    <? if (count($errors) > 0) : ?>
        <? foreach ($errors as $name => $error) : ?>
            <li><?= $error ?></li>
        <? endforeach ?>
    <? endif ?>
</ul>
