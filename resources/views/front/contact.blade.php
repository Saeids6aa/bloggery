@extends('front.layouts.app')

@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>contact us</h4>
                            <h2>let’s stay in touch!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-us">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="down-contact">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="sidebar-item contact-form">
                                        <div class="sidebar-heading">
                                            <h2>Send us a message</h2>
                                        </div>
                                        <div class="content">
                                            <form id="comment" action="{{ route('send_contact') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <fieldset>
                                                            @if (Auth::check())
                                                                <input type="text" name="name" class="form-control"
                                                                    placeholder="Your Name" value="{{ Auth::user()->name }}"
                                                                    disabled>
                                                                <input type="hidden" name="name"
                                                                    value="{{ Auth::user()->name }}">
                                                            @else
                                                                <input type="text" name="name"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    placeholder="Your Name" value="{{ old('name') }}">
                                                                @error('name')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            @endif
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <fieldset>
                                                            @if (Auth::check())
                                                                <input type="email" name="email" id="email"
                                                                    class="form-control" placeholder="Your email"
                                                                    value="{{ Auth::user()->email }}" disabled>
                                                                <input type="hidden" name="email"
                                                                    value="{{ Auth::user()->email }}">
                                                            @else
                                                                <input type="email" name="email" id="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="Your email" value="{{ old('email') }}">
                                                                @error('email')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            @endif
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12">
                                                        <fieldset>
                                                            <input name="subject" type="text" id="subject"
                                                                class="form-control @error('subject') is-invalid @enderror"
                                                                placeholder="Subject" value="{{ old('subject') }}">
                                                            @error('subject')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <textarea name="message" rows="6" id="message" placeholder="Type your comment"
                                                                class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                                            @error('message')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <button type="submit"
                                                                class="btn btn-custom w-100">Send</button>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="sidebar-item contact-information">
                                        <div class="sidebar-heading">
                                            <h2>contact information</h2>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                @if (!empty($setting->phone))
                                                    <li>
                                                        <h5>{{ $setting->phone }}</h5>
                                                        <span>PHONE NUMBER</span>
                                                    </li>
                                                @endif

                                                @if (!empty($setting->email))
                                                    <li>
                                                        <h5>{{ $setting->email }}</h5>
                                                        <span>EMAIL ADDRESS</span>
                                                    </li>
                                                @endif

                                                @if (!empty($setting->address))
                                                    <li>
                                                        <h5>{{ $setting->address }}</h5>
                                                        <span>STREET ADDRESS</span>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    @endsection
