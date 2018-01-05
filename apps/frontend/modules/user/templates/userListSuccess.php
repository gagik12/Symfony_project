<? /** @var array $users */ ?>
<h1>Users</h1>
<div class="boxer">
    <div class="box-row">
        <div class="box column_name">Login</div>
        <div class="box column_name">First name</div>
        <div class="box column_name">Last name</div>
        <div class="box column_name">User role</div>
    </div>
    <? include_partial('user_list', ['users' => $users]) ?>
</div>
<div class="btn-block">
    <input type="submit" id="submit" value="Дальше">
    <img src="../img/loading.gif" id="loading" alt="загрузка" style="display: none;">
</div>
<div class="popup-box" style="width: 400px; left: 474.5px; top: 290px;">
    <div class="close-x close-popup">X</div>
    <div class="top"><h2>Вы действительно хотите удалить пользователя?</h2></div>
    <div class="bottom">
        <a href="<?= url_for("@delete_user?login=" . $login) ?>">Да</a>
        <a class="close-popup">Нет</a>
    </div>
</div>
<div class="cover"></div>
