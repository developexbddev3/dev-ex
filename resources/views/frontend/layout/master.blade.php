<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="theme-color" content="#56a58f">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DEVELOPEX | All Technology Is Here</title>
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6/css/all.min.css') }}">
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
    @php
        $check_if_exists = \App\Models\Visitor::where('ip', request()->ip())->whereDay('created_at', date('d'))->first();
        if(!$check_if_exists) {
            \App\Models\Visitor::create([
                'user_agent' => request()->userAgent(),
                'ip' => $_SERVER['REMOTE_ADDR'],
                'hits' => 1,
            ]);
        } else {
            $check_if_exists->increment('hits');
        }
    @endphp
    
    @include('frontend.layout.inc.top_nav')

    @yield('content')

    @include('frontend.layout.inc.footer')

    <button class="scroll_top"><i class="fas fa-angle-up"></i></button>
    <style>
        .scroll_top {
            border: none;
            outline: none;
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--fave_dark);
            color: #fff;
            box-shadow: 0 3px 7px 0 rgba(0,0,0,0.2);
            transform: scale(0);
            transition: all 0.3s ease-in-out;
            pointer-events: none;
        }
        .scroll_top.active {
            transform: scale(1);
            pointer-events: all;
        }
        .scroll_top:hover {
            background: var(--fave_dark);
        }
    </style>
    <script>
        // Back to top button
        let scroll_top = document.querySelector('.scroll_top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                scroll_top.classList.add('active');
            } else {
                scroll_top.classList.remove('active');
            }
        });
        scroll_top.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    @stack('script')
</body>
</html>