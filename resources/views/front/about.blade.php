@extends('front.layouts.app')

@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>about us</h4>
                            <h2>more about us!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="about-us">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    @if (!empty($about) && !empty($about->image))
                        <img src="{{ asset('images/about/' . $about->image) }}" alt="" width="900"
                            height="550">
                    @endif

                    @if (!empty($about) && !empty($about->descrption))
                        <li>
                            <p>{{ $about->descrption }}</p>
                        </li>
                    @endif

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="social-icons">
                        @if (!empty($setting->url_facebook))
                            <li>
                                <a href="{{ $setting->url_facebook }}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        @endif

                        @if (!empty($setting->url_twitter))
                            <li>
                                <a href="{{ $setting->url_twitter }}">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        @endif

                        @if (!empty($setting->url_whatsapp))
                            <li>
                                <a href="{{ $setting->url_whatsapp }}">
                                    <i class="fa fa-whatsapp"></i> </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>


        </div>
    </section>
@endsection
