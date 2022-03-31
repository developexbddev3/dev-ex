@extends('frontend.layout.master')


@section('content')

<div class="section_wrap">
    <div class="container">
        <div class="section_header">
            <div class="side_dash">
                <h2 class="title">Contact Us</h2>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-4">
                <div class="contact_icon_box">
                    <div class="icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="title">Call Us</h4>
                        <p class="txt">
							+ 8801317108364
							<br>
							+ 8801755386111
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_icon_box">
                    <div class="icon">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <div class="info">
                        <h4 class="title">Write Us</h4>
                        <p class="txt">
							developexbd@gmail.com
                        </p>
                    </div>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="contact_icon_box">
                    <div class="icon">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <div class="info">
                        <h4 class="title">Address</h4>
                        <address class="txt">
                            Home No. 118, Road No, 05,
                            <br>
                            P.C Culture Society,Shyamoli.
                        </address>
                    </div>
                </div>
            </div> 
        </div> --}}
        <div class="row justify-content-center contact_form">
            <div class="col-md-6">
                <form action="{{ route('contact.store') }}" class="py-4" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 class="text-center">Get in tuch</h2>
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name.." required>
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone.." required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                      <label for="body" class="form-label">Message</label>
                      <textarea name="message" id="body" rows="3" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="global_btn sml" style="border: none;">Send</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 py-4">
                    <h2 class="text-center">Contact Info</h2>
                </div>
                <div class="info_wrap">
                    <div class="contact_info">
                        <div class="icon" style="background: #2FB9B9;">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="inf">
                            <div class="name">Phone Number</div>
                            <a href="#">8801317108364</a>
                        </div>
                    </div>
                    
                    <div class="contact_info">
                        <div class="icon" style="background: #4285F4;">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="inf">
                            <div class="name">Email Address</div>
                            <a href="#">developexbd@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact_info">
                        <div class="icon" style="background: #664BCC;">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="inf">
                            <div class="name">Address</div>
                            <p>
                                Home No. 118, Road No, 05,
                                P.C Culture Society,Shyamoli.
                            </p>
                        </div>
                    </div>
                    <div class="contact_info">
                        <div class="icon" style="background: #5472C8;">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="inf">
                            <div class="name">Facebook page</div>
                            <a href="https://www.facebook.com/DevelopEx-Private-Ltd-104123368579448" target="_blank">https://www.facebook.com/DevelopEx-Private-Ltd-104123368579448</a>
                        </div>
                    </div>
                    <div class="contact_info">
                        <div class="icon" style="background: #128A7E;">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="inf">
                            <div class="name">Whatsapp</div>
                            <a href="#">8801317108364</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="location_map">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.2892896343556!2d90.36226841536299!3d23.772710693839723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c130c90f07a5%3A0x5dd9af691773816b!2sDevelopEx%20Private%20Limited!5e0!3m2!1sen!2sus!4v1641802422495!5m2!1sen!2sus" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

<style>

.contact_info {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}
.contact_info .name {
    font-weight: bold;
    font-size: 20px;
}
.contact_info a {
    text-decoration: none;
    color: #555;
}
.contact_info .inf {
    flex: 1;
}
.contact_info .icon {
    display: flex;
    border-radius: 4px;
    font-size: 20px;
    background: #3B98BA;
    color: #eee;
    margin-right: 20px;
    width: 50px;
    height: 50px;
    justify-content: center;
    align-items: center;
}
.contact_form {
    background: #fff;
    padding: 20px;
    margin-top: 50px;
    border-radius: 8px;
    box-shadow: 0 3px 20px 0 #0000001a;
}
.contact_form .form-control {
    /* border: 1px solid #E7E9FE; */
    border: 1px solid #DCE1FF;
    border-radius: 0;
    padding: 10px;
}
.contact_form .form-control:focus {
    outline: none;
    box-shadow: none;
    border-color: #A5B1FD;
}
@media (min-width: 994px) {
    .info_wrap {
        padding-left: 30px;
    }
    .contact_info {
        margin-bottom: 25px;
    }
}
@media (max-width: 500px) {
    .contact_form {
        padding: 0;
        flex-direction: column-reverse;
        word-break: break-all;
    }
}
body {
    background: #f6f7ff;
}
</style>

@endsection