<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            {{-- <ul>
                <li> <a href="index.html"><i class='bx bx-radio-circle'></i>Default</a>
                </li>
                <li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Alternate</a>
                </li>
                <li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Graphical</a>
                </li>
            </ul> --}}
        </li>

        <li class="menu-label">Managerment</li>
        <li>
            <a href="{{ route('admin.category.index') }}">
                <div class="parent-icon"><i class='bx bx-folder-open'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-book-reader'></i>
                </div>
                <div class="menu-title">News</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.news.index') }}"><i class='bx bx-news'></i>All News</a>
                </li>
               

            </ul>
        </li>
        <li>
            <a href="{{ route('admin.display-settings') }}">
                <div class="parent-icon"><i class='bx bx-layout'></i>
                </div>
                <div class="menu-title">Display Setting</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.about.update') }}">
                <div class="parent-icon"><i class='bx bx-credit-card-front'></i>
                </div>
                <div class="menu-title">About</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.ad.index') }}">
                <div class="parent-icon"><i class='bx bx-film'></i>
                </div>
                <div class="menu-title">Advertisement</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.social.index') }}">
                <div class="parent-icon"><i class='bx bx-world'></i>
                </div>
                <div class="menu-title">Social</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.contact-info.index') }}">
                <div class="parent-icon"><i class='bx bx-phone-outgoing'></i>
                </div>
                <div class="menu-title">Contact Info</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.contact-message') }}">
                <div class="parent-icon"><i class='bx bx-message-detail'></i>
                </div>
                <div class="menu-title">Contact Message</div>
            </a>
        </li>
        {{-- <li>
            <a href="https://themeforest.net/user/codervent">
                <div class="parent-icon"><i class="bx bx-shield"></i>
                </div>
                <div class="menu-title">Authencation</div>
            </a>
        </li> --}}
        <li>
            <a href="{{ route('admin.general-setting.index') }}">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Garenal Setting</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-book-reader'></i>
                </div>
                <div class="menu-title">Footer</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.footer-info.index') }}"><i class='bx bx-news'></i>Footer Info</a>
                </li>
                {{-- <li> <a href=""><i class='bx bx-radio-circle'></i>Footer Grid</a>
                </li> --}}

            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>

