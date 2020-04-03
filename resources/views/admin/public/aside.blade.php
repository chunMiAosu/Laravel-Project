<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="/admin/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">
           welcome
        </span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/admin/img/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">name</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/admin/statistic/totalArticle" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            情况统计
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            我
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    编辑员
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="/admin/me/editor" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/me/draft" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>草稿箱</p>
                                        <span class="right badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../index2.html" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>已通过审核</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../index2.html" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>审核不通过</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/me/authorWorking" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>等待审核 编辑员</p>
                                        <span class="right badge badge-danger">2</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    审核员
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="/admin/me/auditorWorking" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>等待审核</p>
                                        <span class="right badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/me/auditorRes/success" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>审核通过</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/me/auditorRes/fail" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>审核不通过</p>
                                    </a>
                                </li>

                            </ul>
                        </li>







                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            文章管理
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/article?type=politics" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>时政</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/article?type=finance" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>财经</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/article?type=military" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>军事</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/article?type=education" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>教育</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/article?type=sports" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>体育</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            角色管理
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>管理员</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>编辑</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
