<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- سایدبار -->
<aside class="admin-sidebar" id="sidebar">
    <div class="sidebar-brand">
        <a href="<?= Yii::$app->homeUrl ?>">
            <i class="fas fa-crown"></i>
            <span>Admin Panel</span>
        </a>
        <small>مدیریت سیستم</small>
    </div>

    <?php
$currentRoute = Yii::$app->controller->getRoute();
?>
    <ul class="sidebar-menu">
        <li class="menu-label">داشبورد</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-chart-pie"></i> داشبورد',
                Url::to(['/admin/dashboard']),
                ['class' => $currentRoute === 'admin/dashboard/index' ? 'active' : '']
            ) ?>
        </li>

        <li class="menu-label">مدیریت محتوا</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-newspaper"></i> مقالات',
                Url::to(['admin/article/index']),
                ['class' => $currentRoute === 'admin/article/index' ? 'active' : '']
            ) ?>
        </li>
         <?php if( Yii::$app->user->can('admin')){ ?>
        <li class="menu-label">علاقه‌مندی‌ها</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-newspaper"></i> علاقه مندی ها',
                Url::to(['admin/favorite/index']),
                ['class' => $currentRoute === 'admin/favorite/index' ? 'active' : '']
            ) ?>
        </li>
        <li>
            <?= Html::a(
                '<i class="fas fa-tags"></i> دسته‌بندی‌ها',
                Url::to(['admin/category/index']),
                ['class' => $currentRoute === 'admin/category/index' ? 'active' : '']
            ) ?>
        </li>
        <li>
            <?= Html::a(
                '<i class="fas fa-comments"></i> نظرات',
                Url::to(['admin/comment/index']),
                ['class' => $currentRoute === 'admin/comment/index' ? 'active' : '']
            ) ?>
        </li>
        <?php } ?>
        <!-- -------------------- -->
                <?php if( Yii::$app->user->can('admin')){ ?>
        <li class="menu-label">مدیریت دسترسی</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-user-tag"></i> نقش‌ها',
                Url::to( ['/admin/rbac/index']),
                ['class' =>$currentRoute === 'admin/rbac/index' ? 'active' : '']
                ) ?>
        </li>
        <li>
            <?= Html::a(
                '<i class="fas fa-user-cog"></i> تخصیص نقش',
                Url::to( ['/admin/rbac/assign']),
                ['class' => $currentRoute === 'admin/rbac/assign' ? 'active' : '']
            ) ?>
        </li>
        <?php } ?>
        <!-- -------------------- -->

    </ul>

    

    <!-- دکمه تغییر تم در سایدبار -->
    <div class="theme-toggle-sidebar" id="themeToggleSidebar">
        <span class="toggle-label">
            <i class="fas fa-moon" id="themeIconSidebar"></i>
            <span id="themeTextSidebar">لایت مود</span>
        </span>
        <span class="toggle-switch"></span>
    </div>
</aside>