 @extends('layouts.app')
@section('content')
<hr>
<div id="sb-search" class="sb-search" style="display: none;">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                            </form>
                        </div>
<section id="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Office Location</h3>
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.3791544677033!2d74.3419679147596!3d31.513744781371823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391904599d38bda1%3A0x6c4aec982c1412cd!2sAl+Hafeez+View%2C+67%D8%8C+Sir+Syed+Rd%2C+Lahore+54660%2C+Pakistan!5e0!3m2!1sen!2s!4v1519045783433" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2>
                                        Leave Us A Message <small></small>
                                    </h2>
                                    <hr class="colorgraph">
                                    <div id="error">
                                        @if (session('success'))
                                            <div class="alert alert-info">{{ session('success') }}</div>
                                        @endif
                                        @foreach ($errors->all() as $element)
                                           <div class="alert alert-success alert-sm"><small>{{ $element }}</small></div>
                                        @endforeach
                                    </div>
                                    <form role="form"  action="{{ route('contact.form.submit') }}" id="contact_form" name="contact_form" class="contactForm" method="post" >
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" / value="{{ old('name') }}">
                                            <div class="validation"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" id="name" placeholder="Your Contact" data-rule="minlen:4" data-msg="Please enter your mobile number" value="{{ old('phone') }}">
                                            <div class="validation"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="{{ old('email') }}">
                                            <div class="validation"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                                            <div class="validation"></div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message">{{ old('message') }}</textarea>
                                            <div class="validation"></div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-theme btn-block btn-md">Send Message</button>
                                        </div>
                                    </form>
                                    <hr class="colorgraph">
                                </div>
                                <div class="col-md-4">
                                    <h2>Contact us  </h2>
                                    <p>@php
                                        echo $settings->address;
                                    @endphp</p>
                                    <p>Cell: {{ $settings->phone }} </p>
                                    <p>E-mail: {{ $settings->email }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
@endsection


 