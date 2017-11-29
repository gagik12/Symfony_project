<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <div class="menu">
        <ul>
            <li><a href="<?= url_for('hello_world/index') ?>">Hello World</a></li>
            <li><a href="<?= url_for('user/user_list') ?>">User List</a></li>
            <li><a href="<?= url_for('user/sign_in') ?>">Sign In</a></li>
            <li><a href="<?= url_for('user/logOut') ?>">Log Out</a></li>
        </ul>
      </div>
    <?php echo $sf_content ?>
  </body>
</html>
