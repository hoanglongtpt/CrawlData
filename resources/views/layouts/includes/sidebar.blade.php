<ul class="navbar-nav sidebar-position sidebar-bg sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class=" mx-3">LOGO</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @foreach ($categories as $item)
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home',['type' => $item->type]) }}">
                <div class="nav-link-layout">
                    <div>
                        <img class="logo-item" src="{{ asset($item->image) }}" />
                        <span>{{$item->name}}</span>
                    </div>
                    <span class="price-tag">{{ $item->amount }}k</span>
                </div>
            </a>
        </li>
    @endforeach
    {{-- <li class="nav-item">
        <a class="nav-link" href="index.html">
            <div class="nav-link-layout">
                <div>
                    <img class="logo-item" src="{{asset('assets-theme/img/logo/MotionArray.png')}}" />
                    <span>Motion Array</span>
                </div>
                <span class="price-tag">1k</span>
            </div>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="index.html">
            <div class="nav-link-layout">
                <div>
                    <img class="logo-item" src="{{asset('assets-theme/img/logo/evanto.ico')}}" />
                    <span>Envato</span>
                </div>
                <span class="price-tag">1k</span>
            </div>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="index.html">
            <div class="nav-link-layout">
                <div>
                    <img class="logo-item" src="{{asset('assets-theme/img/logo/pikbest.png')}}" />
                    <span>Pikbest</span>
                </div>
                <span class="price-tag">1k</span>
            </div>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="index.html">
            <div class="nav-link-layout">
                <div>
                    <img class="logo-item" src="{{asset('assets-theme/img/logo/artlist.png')}}" />
                    <span>Artlist</span>
                </div>
                <span class="price-tag">1k</span>
            </div>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="index.html">
            <div class="nav-link-layout">
                <div>
                    <img class="logo-item" src="{{asset('assets-theme/img/logo/tiktok.png')}}" />
                    <span>Tiktok</span>
                </div>
                <span class="price-tag">Free</span>
            </div>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="index.html">
            <div class="nav-link-layout">
                <div>
                    <img class="logo-item" src="{{asset('assets-theme/img/logo/youtube.png')}}" />
                    <span>Youtube</span>
                </div>
                <span class="price-tag">Free</span>
            </div>
        </a>
    </li> --}}
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="contact-group">
        <div class="contact-item contact-header">Liên hệ:</div>
        <div class="contact-item">
            <img class="contact-logo" src="{{asset('assets-theme/img/fb-full.svg')}}" />
            <span class="contact-label">FB: EditorVN</span>
        </div>
        <div class="contact-item">
            <img class="contact-logo" src="{{asset('assets-theme/img/phone.svg')}}" />
            <span class="contact-label">SĐT: 0772.013.013</span>
            
        </div>
    </div>

    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>