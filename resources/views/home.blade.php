@extends('layouts.app')


@section('content')
  <section id="featured" class="bg">
                        <!-- start slider -->
                        <!-- start slider -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Slider -->
                                    <div id="main-slider" class="main-slider flexslider">
                                        <ul class="slides">
                                            @foreach ($slider as $element)
                                                <li>
                                                    <img src="{{ asset('images/'.$element->image) }}" alt=""/>
                                                </li>
                                            @endforeach
                                            
                                         
                                        </ul>
                                    </div>
                                    <!-- end slider -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="content" style="background-color:#ebebeb !important">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <h2>{{ $page->heading }}</h2>
                                        <p>
                                        <p style="text-align: justify;"> @php
                                            echo $page->details;
                                        @endphp </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="col-md-6">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                            </form>
                        </div>
                    </div>
                    <section id="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="heading">Our Projects</h4>
                                    <div id="grid-container" class="cbp-l-grid-projects">
                                        <ul>
                                            @foreach ($projects as $element)
                                                 <li class="cbp-item graphic">
                                                <div class="cbp-caption">
                                                    <div class="cbp-caption-defaultWrap">
                                                        <img src="{{ asset('images/'.$element->image) }}" alt="" style="height:250px; height:200px;"/>
                                                    </div>
                                                    <div class="cbp-caption-activeWrap">
                                                        <div class="cbp-l-caption-alignCenter">
                                                            <div class="cbp-l-caption-body">
                                                                <a href="{{ asset('images/'.$element->image) }}" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Dashboard<br>">view larger</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cbp-l-grid-projects-title">
                                                    <a href="{{ url('projects/'.$element->slug) }}">{{ $element->name }}</a>
                                                </div>
                                            </li>
                                            @endforeach
                                           
                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- divider -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="solidline"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end divider -->
                        <!-- clients -->
                        <div class="container">
                            <div class="row">
                                @foreach ($patners as $element)
                                     <div class="col-xs-5 col-md-3 aligncenter client">
                                    <a href="{{ $element->link }}" target="_blank">
                                        <img alt="logo" src="{{ asset('images/'.$element->image) }}" class="img-responsive" style="max-width:320px; max-height:120px"/>
                                    </a>
                                </div>
                                @endforeach
                               
                               
                            </div>
                        </div>
                    </section>
@endsection

