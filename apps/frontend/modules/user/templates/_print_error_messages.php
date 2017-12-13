<ul class="error_list">
    <? $errors = $form->getErrorSchema()->getErrors() ?>
    <? if (count($errors) > 0) : ?>
        <? foreach ($errors as $name => $error) : ?>
            <li><?= $error ?></li>
        <? endforeach ?>
    <? endif ?>
</ul>
