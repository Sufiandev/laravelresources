@extends('layouts.app')
@section('content')
<hr>
<div id="sb-search" class="sb-search" style="display: none;">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                            </form>
                        </div>
@if ($bladeType == 'career')
   <section id="content">
                        <div class="container">
                          @foreach ($career as $element)
                              <div class="row" >
                                    <div class="col-md-8">
                                        <h2>{{ $element->title }}</h2>
                                        
                                            @php
                                                echo $element->details
                                            @endphp
                                       
                                    </div>
                                    <div class="col-md-4" style=";margin-top:70px; border-left:solid 1px #333">
                                        <strong>Posted On:</strong>
                                        {{ date('d-m-y',strtotime($element->created_at)) }}<br>
                                        <strong>Experience:</strong>
                                        {{ $element->exp }}<br>
                                        <strong>Type:</strong>
                                        {{ $element->type }}<br>
                                        <br>
                                        <a href="{{ route('career.apply') }}" class="btn btn-theme btn-block btn-md">Apply Now</a>
                                    </div>
                            </div>
                          @endforeach
                                
                        </div>
    </section> 
@elseif($bladeType == 'career_apply')
     <section id="content">
    
   <div class="container">
        <div class="row">
        <div class="col-lg-12">
                <h3>Apply Now</h3> 
                </div>
                </div>
                </div>
    

    <div class="container">
        <div class="row">
            <div class="col-md-8">
        
                <hr class="colorgraph">
               
                     <div id="form_errors">
                          @if (session('success'))
                            <div class="alert alert-info">{{ session('success') }}</div>
                          @endif
                          @foreach ($errors->all() as $element)
                             <p style="color:red">*{{ $element }}</p>
                        @endforeach
                     </div>
                                <!-- Appointment Form -->
                        <form role="form" enctype="multipart/form-data" id="apply_form" action="{{ route('apply.submit') }}" name="apply_form"  class="appoinment-form"  method="post"  >
                            @csrf
                            
                            <div class="form-group col-md-12 no-padding">                           
                                <input type="text" value="{{ old('name') }}" id="cname" name="name" class="form-control" placeholder="Your Name">
                            </div>                  
                            <div class="form-group col-md-12 no-padding">                           
                                <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-12 no-padding">                           
                              <select class='form-control' style='width: 50%;' name='job' id='post'>
                                @foreach ($career as $element)
                                    <option>{{ $element->title }}</option>
                                @endforeach
                            </select>                            
                            </div>
                            <div class="form-group input-group col-md-12 no-padding">
                                <div class="col-md-7 no-padding">
                                    <div class="col-md-6 col-sm-4 col-xs-4 no-left-padding">
                                <input type="text" id="qualification" value="{{ old('qualification') }}" name="qualification" class="form-control" placeholder="Qualification">
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-4 no-left-padding">
                                 <input type="text" id="phone" value="{{ old('phone') }}" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-4 col-xs-4 no-padding">
                             <input type="text" min="0" value="{{ old('exp') }}" class="form-control"  placeholder="Experience" name="exp">
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 no-padding">                           
                                <input type="file" name="files" class="form-control" >
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 no-padding">             
                                <button type="submit" name="submit" class="btn btn-theme btn-block btn-md">
                            Submit</button>
                                <hr class="colorgraph">
                            </div>
                        </form><!-- Appointment Form /- -->
                <hr class="colorgraph">

            </div>
            <div class="col-md-4">
                <h2>Contact us  </h2>
                                    <p>@php
                                        echo $settings->address;
                                    @endphp</p>
                                    <p>Cell: {{ $settings->phone }} </p>
                                    <p>E-mail: {{ $settings->email }}</p
            </div>
        </div>
    </div>
    </section>
@endif


@endsection

