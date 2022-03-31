@extends('frontend.layout.master')


@section('content')
    <div class="section_wrap">
        <div class="container">
            <div class="details_wrap">
                <div class="details">
                    <h2>{{ $training->title }}</h2>
                    <p>{{ $training->short_description }}</p>

                    {{-- <h4>ইনস্ট্রাক্টর</h4>
                    <div class="card">
                        <div class="card-body instractor">
                            <div class="profile">
                                <img src="{{ asset('frontend/images/development.png') }}" alt="">
                            </div>
                            <div class="info">
                                <h4>Munzereen Shahid</h4>
                                <p>MS (English), University of Oxford (UK); BA, MA (English), University of Dhaka; IELTS: 8.5</p>
                            </div>
                        </div>
                    </div> --}}

                    <br>
                    <p><strong>এই কোর্সটি থেকে যা শিখবেন</strong></p>
                    <div class="card">
                        <div class="card-body">
                            {!! $training->description !!}
                        </div>
                    </div>
                </div>
                <div class="overview">
                    <div class="overview_card">
                        <div class="thumbmail">
                            <img src="{{ asset($training->thumbmail) }}" alt="">
                        </div>
                        <div class="info">
                            <h4>{{ $training->price }} TK</h4>
                            <button class="get_in">Get IN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section_wrap">
        <div class="container">
            <div class="training_grid">
                {{-- 
                <a href="{{ route('training.details') }}" class="training">
                    <div class="thumbnail">
                        <img src="{{ asset('frontend/images/banner1.jpg') }}" alt="">
                    </div>
                    <h4 class="name">
                        ঘরে বসে Spoken English 
                    </h4>
                    <div class="footer" style="border-top: 1px solid #ECECEC;">
                        <span> ৳ 950 </span>
                        <span class="details">More Information</span>
                    </div>
                </a>
                --}}
            </div>
        </div>
    </div>

    {{-- <script>
        $('.show_modal').click(() => {
            let d = NL.open({
                title: 'Create Menue',
                body: `<form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>`,
                save: function(body) {
                    console.log(body);
                }
            });
            console.log(d);
        });

        (function(global, mainFunc) {
            "use strict";
            mainFunc(global);
        })(window || this, function(window) {
            'use strict';
            let my_event = (state, data) => {
                var evt = $.Event(state);
                evt.state = state;
                evt.myModal = (data) ? data : {}; 
                $(window).trigger(evt);
            }
            function Modal() {
                this.open = function(arg = {}) {
                    this.myModal = {}
                    let modal_html = `<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    if (!$('#myModal').length) {
                        $('body').append(modal_html);
                    };

                    var id = document.getElementById('myModal');
                    var myModal = new bootstrap.Modal(id);
                    this.myModal = myModal;

                    let dialog = $(myModal._dialog);

                    dialog.find('.modal-header')
                        .html((arg.title) ? arg.title : 'Modal Header');

                    dialog.find('.modal-body')
                        .html((arg.body) ? arg.body : 'Modal Body');

                    dialog.find('.modal-footer')
                        .html((arg.footer) ? arg.footer : `<button type="button" class="btn btn-secondary" onclick="NL.close()">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="NL.save(${arg.save})">Save changes</button>`);
                    
                    // some
                    myModal.show();
                    my_event('modal_open', myModal);
                    return myModal;
                }

                this.close = function() {
                    my_event('modal_close', this.myModal);
                    this.myModal.hide();
                }

                this.save = function(sv) {
                    // console.log(sv);
                    let body = $(this.myModal._dialog).find('.modal-body');
                    sv(body);
                }
            }
            return window.NL = new Modal();
        });

        // $(window).on('modal_close', function(e) {
        //     console.log(e.myModal);
        // });

    </script> --}}



    <style>
        .details_wrap {
            display: flex;
            gap: 15px;
        }

        .details {
            flex: 1;
        }

        .overview {
            width: 300px;
        }

        .overview_card {
            background: #fff;
            position: sticky;
            top: 110px;
            margin-top: 150px;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .details_wrap {
                flex-direction: column;
            }
            .overview {
                width: 100%;
            }
            .overview_card {
                margin-top: 10px;
            }
        }


        .instractor {
            display: flex;
            gap: 15px;
        }

        .profile {
            display: flex;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden
        }

        .profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info {
            padding: 20px 10px;
        }
        .get_in {
            width: 100%;
            padding: 10px;
            background: var(--fave);
            color: #fff;
            border: none;
            outline: none;
            border-radius: 50px;
            margin-top: 20px;
        }
    </style>
@endsection
