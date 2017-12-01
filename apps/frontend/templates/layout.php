<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?
        include_http_metas();
        include_metas();
        include_title();
        include_stylesheets();
        include_javascripts();
        ?>
        <link rel="shortcut icon" href="/favicon.ico" />
    </head>
    <body>
        <div class="menu">
            <ul>
                <li><a href="<?= url_for('hello_world/index') ?>">Hello World</a></li>
                <li><a href="<?= url_for('user/user_list') ?>">User List</a></li>
                <li><a href="<?= url_for('user/logOut') ?>">Log Out</a></li>
            </ul>
        </div>
        <?php echo $sf_content ?>
    </body>
</html>
