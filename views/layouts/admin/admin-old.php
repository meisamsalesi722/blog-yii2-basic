<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use app\assets\AppAsset;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="rtl" id="html-theme">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ========================================
           VARIABLES - دارک و لایت مود
           ======================================== */
        :root {
            /* لایت مود (پیش‌فرض) */
            --sidebar-bg: #1a1a2e;
            --sidebar-hover: #16213e;
            --sidebar-active: #0f3460;
            --sidebar-text: rgba(255,255,255,0.7);
            --sidebar-text-active: #ffffff;
            
            --header-bg: #ffffff;
            --header-text: #333333;
            --header-shadow: 0 2px 10px rgba(0,0,0,0.1);
            
            --body-bg: #f0f2f5;
            --body-text: #333333;
            
            --card-bg: #ffffff;
            --card-border: #e9ecef;
            --card-shadow: 0 2px 10px rgba(0,0,0,0.05);
            
            --table-bg: #ffffff;
            --table-stripe: #f8f9fa;
            --table-border: #dee2e6;
            --table-hover: #f1f3f5;
            
            --input-bg: #ffffff;
            --input-border: #ced4da;
            --input-text: #495057;
            --input-focus: #80bdff;
            
            --primary-color: #e94560;
            --primary-hover: #c73e54;
            
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            
            --border-color: #e9ecef;
            --shadow-color: rgba(0,0,0,0.1);
            
            --transition-speed: 0.3s;
        }

        /* ========================================
           دارک مود
           ======================================== */
        [data-theme="dark"] {
            --sidebar-bg: #0d0d1a;
            --sidebar-hover: #1a1a2e;
            --sidebar-active: #16213e;
            --sidebar-text: rgba(255,255,255,0.6);
            --sidebar-text-active: #ffffff;
            
            --header-bg: #1a1a2e;
            --header-text: #e0e0e0;
            --header-shadow: 0 2px 10px rgba(0,0,0,0.5);
            
            --body-bg: #0d0d1a;
            --body-text: #e0e0e0;
            
            --card-bg: #1a1a2e;
            --card-border: #2d2d44;
            --card-shadow: 0 2px 10px rgba(0,0,0,0.3);
            
            --table-bg: #1a1a2e;
            --table-stripe: #22223a;
            --table-border: #2d2d44;
            --table-hover: #2a2a42;
            
            --input-bg: #2d2d44;
            --input-border: #3d3d5a;
            --input-text: #e0e0e0;
            --input-focus: #e94560;
            
            --border-color: #2d2d44;
            --shadow-color: rgba(0,0,0,0.5);
            
            --primary-color: #e94560;
            --primary-hover: #ff6b81;
        }

        /* ========================================
           استایل‌های عمومی
           ======================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'IRANSans', 'Tahoma', sans-serif;
            background: var(--body-bg);
            color: var(--body-text);
            overflow-x: hidden;
            transition: background var(--transition-speed), color var(--transition-speed);
        }

        /* ========================================
           سایدبار
           ======================================== */
        .admin-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: 260px;
            height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            z-index: 1050;
            transition: all var(--transition-speed) ease;
            overflow-y: auto;
            box-shadow: 2px 0 15px var(--shadow-color);
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: var(--sidebar-bg);
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }

        /* لوگو */
        .sidebar-brand {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 10px;
        }

        .sidebar-brand a {
            color: #fff;
            text-decoration: none;
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .sidebar-brand i {
            color: var(--primary-color);
            font-size: 28px;
        }

        .sidebar-brand small {
            display: block;
            font-size: 12px;
            color: rgba(255,255,255,0.5);
            margin-top: 5px;
            font-weight: 300;
        }

        /* منو */
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin: 5px 10px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            color: var(--sidebar-text);
            text-decoration: none;
            border-radius: 10px;
            transition: all var(--transition-speed) ease;
            font-size: 14px;
            font-weight: 500;
            position: relative;
        }

        .sidebar-menu li a i {
            width: 22px;
            font-size: 18px;
            text-align: center;
        }

        .sidebar-menu li a:hover {
            background: var(--sidebar-hover);
            color: var(--sidebar-text-active);
            transform: translateX(-5px);
        }

        .sidebar-menu li a.active {
            background: var(--sidebar-active);
            color: var(--sidebar-text-active);
            box-shadow: 0 4px 15px rgba(233, 69, 96, 0.3);
        }

        .sidebar-menu li a.active::before {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 30px;
            background: var(--primary-color);
            border-radius: 0 5px 5px 0;
        }

        .sidebar-menu .menu-label {
            padding: 15px 18px 8px;
            font-size: 11px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            font-weight: 600;
            letter-spacing: 1px;
        }

        .sidebar-menu .badge-count {
            background: var(--primary-color);
            color: #fff;
            font-size: 11px;
            padding: 2px 10px;
            border-radius: 20px;
            margin-right: auto;
        }

        /* دکمه دارک/لایت در سایدبار */
        .theme-toggle-sidebar {
            margin: 20px 15px;
            padding: 12px;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            color: var(--sidebar-text);
        }

        .theme-toggle-sidebar:hover {
            background: var(--sidebar-hover);
            border-color: var(--primary-color);
        }

        .theme-toggle-sidebar .toggle-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }

        .theme-toggle-sidebar .toggle-switch {
            width: 44px;
            height: 24px;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
            position: relative;
            transition: all var(--transition-speed) ease;
        }

        .theme-toggle-sidebar .toggle-switch::after {
            content: '';
            position: absolute;
            top: 2px;
            right: 2px;
            width: 20px;
            height: 20px;
            background: #fff;
            border-radius: 50%;
            transition: all var(--transition-speed) ease;
        }

        [data-theme="dark"] .theme-toggle-sidebar .toggle-switch {
            background: var(--primary-color);
        }

        [data-theme="dark"] .theme-toggle-sidebar .toggle-switch::after {
            right: 22px;
        }

        /* ========================================
           محتوای اصلی
           ======================================== */
        .admin-content {
            margin-right: 260px;
            min-height: 100vh;
            transition: all var(--transition-speed) ease;
        }

        /* هدر */
        .admin-header {
            background: var(--header-bg);
            padding: 18px 30px;
            box-shadow: var(--header-shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1040;
            transition: all var(--transition-speed) ease;
        }

        .admin-header .page-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--header-text);
            margin: 0;
            transition: color var(--transition-speed);
        }

        .admin-header .page-title i {
            color: var(--primary-color);
            margin-left: 10px;
        }

        .admin-header .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-header .header-actions .theme-toggle-header {
            background: none;
            border: 1px solid var(--border-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--header-text);
            cursor: pointer;
            font-size: 18px;
            transition: all var(--transition-speed) ease;
        }

        .admin-header .header-actions .theme-toggle-header:hover {
            background: var(--primary-color);
            color: #fff;
            border-color: var(--primary-color);
        }

        .admin-header .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-header .user-info .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }

        .admin-header .user-info .username {
            font-weight: 500;
            color: var(--header-text);
            transition: color var(--transition-speed);
        }

        .admin-header .user-info .logout {
            color: var(--danger-color);
            text-decoration: none;
            font-size: 20px;
            transition: all var(--transition-speed) ease;
        }

        .admin-header .user-info .logout:hover {
            transform: scale(1.1);
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--header-text);
            cursor: pointer;
            padding: 5px 10px;
            transition: color var(--transition-speed);
        }

        /* بدنه */
        .admin-body {
            padding: 25px 30px;
        }

        /* بریدکرامب */
        .admin-breadcrumb {
            background: transparent;
            padding: 0 0 15px 0;
            margin: 0;
            font-size: 14px;
        }

        .admin-breadcrumb li a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .admin-breadcrumb .breadcrumb-item.active {
            color: var(--body-text);
        }

        /* کارت‌ها */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: all var(--transition-speed) ease;
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-color);
            padding: 15px 20px;
        }

        /* جدول */
        .table {
            color: var(--body-text);
        }

        .table thead th {
            background: var(--table-stripe);
            border-bottom: 2px solid var(--table-border);
            color: var(--body-text);
        }

        .table tbody td {
            border-bottom: 1px solid var(--table-border);
        }

        .table tbody tr:hover {
            background: var(--table-hover);
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background: var(--table-stripe);
        }

        /* فرم‌ها */
        .form-control, .form-select {
            background: var(--input-bg);
            border: 1px solid var(--input-border);
            color: var(--input-text);
            transition: all var(--transition-speed) ease;
        }

        .form-control:focus, .form-select:focus {
            background: var(--input-bg);
            border-color: var(--input-focus);
            color: var(--input-text);
            box-shadow: 0 0 0 0.2rem rgba(233, 69, 96, 0.25);
        }

        .form-control::placeholder {
            color: var(--input-text);
            opacity: 0.6;
        }

        .form-label {
            color: var(--body-text);
        }

        /* دکمه‌ها */
        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        /* ========================================
           واکنش‌گرا
           ======================================== */
        @media (max-width: 768px) {
            .admin-sidebar {
                right: -280px;
                width: 280px;
            }

            .admin-sidebar.open {
                right: 0;
            }

            .admin-content {
                margin-right: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .admin-header .page-title {
                font-size: 16px;
            }

            .admin-header .user-info .username {
                display: none;
            }

            .admin-body {
                padding: 15px;
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1045;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        @media (min-width: 769px) {
            .sidebar-overlay {
                display: none !important;
            }
        }

        /* ========================================
           انیمیشن‌ها
           ======================================== */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========================================
           استایل اسکرول
           ======================================== */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--body-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-hover);
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<!-- سایدبار -->
<aside class="admin-sidebar" id="sidebar">
    <div class="sidebar-brand">
        <a href="<?= Yii::$app->homeUrl ?>">
            <i class="fas fa-crown"></i>
            <span>Admin Panel</span>
        </a>
        <small>مدیریت سیستم</small>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-label">داشبورد</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-chart-pie"></i> داشبورد',
                Url::to(['/site/index']),
                ['class' => Yii::$app->controller->id === 'site' ? 'active' : '']
            ) ?>
        </li>

        <li class="menu-label">مدیریت محتوا</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-newspaper"></i> مقالات',
                Url::to(['/article/index']),
                ['class' => Yii::$app->controller->id === 'article' ? 'active' : '']
            ) ?>
        </li>
        <li>
            <?= Html::a(
                '<i class="fas fa-tags"></i> دسته‌بندی‌ها',
                Url::to(['/category/index']),
                ['class' => Yii::$app->controller->id === 'category' ? 'active' : '']
            ) ?>
        </li>
        <li>
            <?= Html::a(
                '<i class="fas fa-comments"></i> نظرات',
                Url::to(['/comment/index']),
                ['class' => Yii::$app->controller->id === 'comment' ? 'active' : '']
            ) ?>
        </li>

        <li class="menu-label">کاربران</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-users"></i> مدیریت کاربران',
                Url::to( ['/user/index']),
                ['class' => Yii::$app->controller->id === 'user' ? 'active' : '']
            ) ?>
        </li>

        <li class="menu-label">تنظیمات</li>
        <li>
            <?= Html::a(
                '<i class="fas fa-cog"></i> تنظیمات',
                Url::to(['/settings/index']),
                ['class' => Yii::$app->controller->id === 'settings' ? 'active' : '']
            ) ?>
        </li>
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

<!-- اوورلی برای موبایل -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- محتوای اصلی -->
<div class="admin-content">
    <!-- هدر -->
    <header class="admin-header">
        <div class="d-flex align-items-center gap-3">
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">
                <i class="fas fa-<?= Yii::$app->controller->id ?>"></i>
                <?= Html::encode($this->title) ?>
            </h1>
        </div>

        <div class="header-actions">
            <!-- دکمه تغییر تم در هدر -->
            <button class="theme-toggle-header" id="themeToggleHeader" title="تغییر تم">
                <i class="fas fa-moon" id="themeIconHeader"></i>
            </button>

            <div class="user-info">
                <span class="username">
                    <?= Yii::$app->user->isGuest ? 'میهمان' : Yii::$app->user->identity->username ?? 'کاربر' ?>
                </span>
                <div class="avatar">
                    <?= Yii::$app->user->isGuest ? 'G' : strtoupper(substr(Yii::$app->user->identity->username ?? 'U', 0, 1)) ?>
                </div>
                <?= Html::a(
                    '<i class="fas fa-sign-out-alt"></i>',
                    ['/site/logout'],
                    [
                        'class' => 'logout',
                        'title' => 'خروج',
                        'data-method' => 'post'
                    ]
                ) ?>
            </div>
        </div>
    </header>

    <!-- بدنه -->
    <div class="admin-body">
        <!-- بریدکرامب -->
        <?php if (isset($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'],
                'options' => ['class' => 'admin-breadcrumb breadcrumb'],
                'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>",
                'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>",
            ]) ?>
        <?php endif; ?>

        <!-- فلش‌ها -->
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?= Yii::$app->session->getFlash('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> <?= Yii::$app->session->getFlash('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> <?= Yii::$app->session->getFlash('warning') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- محتوای اصلی -->
        <div class="fade-in">
            <?= $content ?>
        </div>
    </div>
</div>

<!-- ========================================
   جاوااسکریپت دارک/لایت مود
   ======================================== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ========================================
        // ۱. مدیریت تم
        // ========================================
        const htmlElement = document.getElementById('html-theme');
        const themeToggleSidebar = document.getElementById('themeToggleSidebar');
        const themeToggleHeader = document.getElementById('themeToggleHeader');
        const themeIconSidebar = document.getElementById('themeIconSidebar');
        const themeIconHeader = document.getElementById('themeIconHeader');
        const themeTextSidebar = document.getElementById('themeTextSidebar');

        // دریافت تم ذخیره شده
        let currentTheme = localStorage.getItem('adminTheme') || 'light';
        
        // اعمال تم
        function setTheme(theme) {
            currentTheme = theme;
            htmlElement.setAttribute('data-theme', theme);
            localStorage.setItem('adminTheme', theme);
            
            // به‌روزرسانی آیکون‌ها و متن
            if (theme === 'dark') {
                themeIconSidebar.className = 'fas fa-sun';
                themeIconHeader.className = 'fas fa-sun';
                themeTextSidebar.textContent = 'دارک مود';
            } else {
                themeIconSidebar.className = 'fas fa-moon';
                themeIconHeader.className = 'fas fa-moon';
                themeTextSidebar.textContent = 'لایت مود';
            }
        }

        // تغییر تم
        function toggleTheme() {
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            setTheme(newTheme);
        }

        // رویدادها
        themeToggleSidebar.addEventListener('click', toggleTheme);
        themeToggleHeader.addEventListener('click', toggleTheme);

        // اعمال تم ذخیره شده در ابتدا
        setTheme(currentTheme);

        // ========================================
        // ۲. منوی موبایل
        // ========================================
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('mobileToggle');

        function toggleSidebar() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // بستن با ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                toggleSidebar();
            }
        });

        // بستن در موبایل هنگام کلیک روی لینک
        document.querySelectorAll('.sidebar-menu a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                }
            });
        });

        // ========================================
        // ۳. ذخیره تم در مرورگر (قبلاً انجام شد)
        // ========================================
    });
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>