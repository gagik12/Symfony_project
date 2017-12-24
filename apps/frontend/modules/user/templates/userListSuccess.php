<? /** @var array $users */ ?>
<h1>Users</h1>
<div class="boxer">
    <div class="box-row">
        <div class="box column_name">Id</div>
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
