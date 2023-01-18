<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">Solicode</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/img/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">User</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                <div class="mt-3 pb-3 mb-3 d-flex">
                    <a href="{{ route('apprenant.index') }}" class="nav-link active m">
                        <i class="fa-solid fa-users"></i> &nbsp;
                        <p>
                            {{ __('message.btn_apprenant') }}
                        </p>
                    </a>
                </div>

                <div class="mt-3 pb-3 mb-3 d-flex">
                    <a href="{{ route('brief.index') }}" class="nav-link active m">
                        <i class="fa-regular fa-clipboard"></i> &nbsp;
                        <p>
                            {{ __('message.titleBrief') }}
                        </p>
                    </a>
                </div>

                <div class="mt-3 pb-3 mb-3 d-flex">
                    <a href="/" class="nav-link active m">
                        <i class="fa-solid fa-list-check"></i> &nbsp;
                        <p>
                            {{ __('message.btn_taskManag') }}
                        </p>
                    </a>
                </div>
                <div class="mt-3 pb-3 mb-3 d-flex">
                    <a href="{{ route('assign.index') }}" class="nav-link active m">
                        <i class="nav-icon fas fa-table"></i> &nbsp;
                        <p>
                            {{ __('message.btn_assign') }}
                        </p>
                    </a>
                </div>


            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
