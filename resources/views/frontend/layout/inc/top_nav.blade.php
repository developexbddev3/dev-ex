<nav class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 top_bar_left">
                <a href="mailto:developexbd@gmail.com"><i class="far fa-envelope"></i> developexbd@gmail.com</a>
            </div>
            <div class="col-md-6 top_bar_right">
                <a href="tel:+8801317108364"><i class="fas fa-phone"></i> +8801317108364</a>
            </div>
        </div>
    </div>
</nav>
<style>
    .top_bar {
        background: var(--fave);
        padding: 10px;
        color: #fff;
    }

    .top_bar a {
        color: #fff;
        text-decoration: none;
    }

    .top_bar_right {
        text-align: right;
    }

    @media (max-width: 768px) {
        .top_bar_right {
            text-align: center;
        }

        .top_bar_left {
            text-align: center;
        }
    }

</style>
<nav class="top_nav">
    <a href="{{ route('home') }}" class="nav_logo">
        <img src="{{ asset('frontend/img/logo_developex1.png') }}" alt="">
        <div class="logo_txt">
            <div class="name">
                Develop<span>ex</span>&nbsp;pvt.
            </div>
            <div class="text">
                All Technology is Here
            </div>
        </div>
    </a>
    @php
        $menus = menu('main-menu');
    @endphp
    <ul class="nav_links">
        @if (count($menus))
            @foreach ($menus as $menu)
                <li class="link_item">
                    <a class="links" href="{{ $menu->url }}">{{ $menu->title }}</a>
                    @if (count($menu->childs))
                        <ul class="sub_menu">
                            @foreach ($menu->childs as $child_item)
                            <li><a class="links" href="{{ $child_item->url }}">{{ $child_item->title }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        @endif

        {{-- <li class="link_item"><a class="links" href="{{ route('services') }}">Our Services</a></li>
        <li class="link_item"><a class="links" href="{{ route('about') }}">About</a></li>
        <li class="link_item"><a class="links" href="https://blancebd.com/" target="_blank">Blancebd</a></li>
        <li class="link_item"><a class="links" href="https://dexmartbd.com/" target="_blank">Dexmart</a></li>
        <li class="link_item"><a class="links" href="{{ route('contact') }}">Contact</a></li> --}}
    </ul>

    <button class="nav_toggle"><i class="fa fa-bars"></i></button>
</nav>

<aside class="aside_nav with_top">
    <ul class="nav_links">
        <li class="link_item"><a class="links" href="{{ route('home') }}">Home</a></li>
        <li class="link_item"><a class="links" href="{{ route('services') }}">Our Services</a></li>
        <li class="link_item"><a class="links" href="{{ route('about') }}">About</a></li>
        <li class="link_item"><a class="links" href="https://blancebd.com/" target="_blank">Blancebd</a>
        </li>
        <li class="link_item"><a class="links" href="https://dexmartbd.com/" target="_blank">Dexmart</a>
        </li>
        <li class="link_item"><a class="links" href="{{ route('contact') }}">Contact</a></li>
    </ul>
</aside>

<script>
    $('.nav_toggle').click(function() {
        $('.aside_nav').toggleClass('active');
    });
    // let nav_toggle = document.querySelector('.nav_toggle');
    // let aside_nav = document.querySelector('.aside_nav');
    // nav_toggle.addEventListener('click', function() {
    //     aside_nav.classList.toggle('active');
    // });


    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 68) {
            $('.aside_nav').removeClass('with_top');
        } else {
            $('.aside_nav').addClass('with_top');
        }
    });
</script>

{{-- with_top --}}
