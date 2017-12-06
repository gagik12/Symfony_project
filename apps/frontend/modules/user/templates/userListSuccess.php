<? /** @var array $users */ ?>
<h1>Users</h1>

<div class="boxer">
    <div class="box-row">
        <div class="box column_name">Id</div>
        <div class="box column_name">First name</div>
        <div class="box column_name">Last name</div>
        <div class="box column_name">User role</div>
    </div>
    <?php foreach ($users as $user): ?>
        <div class="box-row">
            <div class="box"><?= $user->getId() ?></div>
            <div class="box"><?= $user->getFirstName() ?></div>
            <div class="box"><?= $user->getLastName() ?></div>
            <div class="box"><?= $user->getRole() ?></div>
        </div>
    <?php endforeach; ?>
</div>
