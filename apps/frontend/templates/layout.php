<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <? include_partial('global/head') ?>
    <body>
        <?
        include_partial('global/header');
        include_partial('global/main_container', ['content' => $sf_content])
        ?>
    </body>
</html>