<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <?
                $headerMenu = new HeaderMenu();
                $headerMenu->generateItems();
                $items = $headerMenu->getMenuItems();
                ?>
                <? foreach ($items as $item): ?>
                    <li><a href="<?= $item->getLink() ?>"><?= $item->getTitle() ?></a></li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
</nav>