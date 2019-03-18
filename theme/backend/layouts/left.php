<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?=
                Html::img('uploads/employee/Chaiwat.jpg', ['class' => 'img-circle', 'alt' => 'User Image'])
                ?>
            </div>
            <div class="pull-left info">
                <p><?= $identity = Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> ออนไลน์</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="ค้นหา..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        ['label' => 'เมนู', 'options' => ['class' => 'header']],
                        ['label' => 'การแจ้งงาน', 'icon' => 'sticky-note', 'url' => ['/tasks/tasks'],],
                        ['label' => 'ประเภทการแจ้ง', 'icon' => 'sitemap', 'url' => ['/tasktype/tasktype'],],
                        ['label' => 'แผนก', 'icon' => 'users', 'url' => ['/department/department'],],
                        ['label' => 'พนักงาน', 'icon' => 'user', 'url' => ['/employee/employee'],],
                        ['label' => 'อุปกรณ์', 'icon' => 'tablet', 'url' => ['/assets/assets'],],
                        ['label' => 'ซอร์ฟแวร์/Licenses', 'icon' => 'trello', 'url' => ['/licenses/licenses'],],
                        ['label' => 'อุปกรณ์เสริม', 'icon' => 'keyboard-o', 'url' => ['/accessories/accessories'],],
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ],
                ]
        )
        ?>

    </section>

</aside>
