<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span>
                    <span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-action="sidebar_close" data-toggle="layout" type="button">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="/">
                        {{-- <i class="si si-fire text-primary"></i> --}}
                        {{-- <span class="font-size-xl text-dual-primary-dark">Holy</span> --}}
                        <span class="font-size-xl text-primary">Dua</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="active" href="/category">
                        {{-- <i class="si si-cup"></i> --}}
                        <span class="sidebar-mini-hide">Category</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="/subcategory">
                        {{-- <i class="si si-cup"></i> --}}
                        <span class="sidebar-mini-hide">Subcategory</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="/dua">
                        {{-- <i class="si si-cup"></i> --}}
                        <span class="sidebar-mini-hide">Dua</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
