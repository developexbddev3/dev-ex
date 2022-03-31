<!-- big_footer start -->
<footer class="big_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="footer_about">
                    <img class="footer_logo" src="{{ asset('public/frontend/images/logo.png') }}" alt="">
                    <br>
                    <p>Developex Private Ltd is the most creative software company in Bangladesh. It is one of the best software development company for custom mobile, web and desktop software development.</p>
                    <ul class="social_link_list">
                        <li>
                            <a href="#" class="social_btn facebook"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn skype"><i class="fab fa-skype"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn gmail"><i class="far fa-envelope"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn"><i class="fas fa-phone"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <h4 class="footer_title">Important links</h4>
                        @php
                            $importact_links = menu('important-links');
                        @endphp
                        @if (count($importact_links))
                        <ul class="footer_list">
                            @foreach ($importact_links as $item)
                            <li><a href="{{ $item->url }}">{{ $item->title }}</a></li>
                            @endforeach
                            {{-- <li><a href="{{ route('about') }}">About us</a></li>
                            <li><a href="{{ route('contact') }}">Contact with us</a></li> --}}
                        </ul>
                        @endif
                    </div>
                    <div class="col-lg-4 text-center">
                        <h4 class="footer_title">Our Services</h4>
                        <ul class="footer_list">
                            <li><a href="#">Digital marketing</a></li>
                            <li><a href="#">Software development</a></li>
                            <li><a href="#">Apps Development</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 text-center">
                        <h4 class="footer_title">Contact Info</h4>
                        <ul class="footer_list">
                            <li><a href="tel:+8801317108364">+8801317108364</a></li>
                            <li><a href="tel:+8801755386111">+8801755386111</a></li>
                            <li><a href="mailto:developexbd@gmail.com">developexbd@gmail.com</a></li>
                        </ul>
                        <br>
                        <b>OUR ADDRESS</b>
                        <p>Home No. 118, Road No, 05, P.C Culture Society,Shyamoli.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- Terms and Condition --}}
<footer class="footer_copy">
    Developex Private Ltd  &copy;<a class="copy_link" href="{{ route('terms_condition') }}" target="_blank">Terms of Service</a> </span>
</footer>