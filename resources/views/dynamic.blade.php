@extends('layouts.app')
@section('content')
<hr>
 <section id="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3>{{ $page->name }}</h3>
                                    <img src="{{ asset('images/'.$page->image) }}" alt="" class="img-responsive"/>
                                    <p>@php
                                        echo $page->details;
                                    @endphp</p>
                                </div>
                                <div class="col-lg-4">
                                    <aside class="right-sidebar">
                                       
                                         
                                        <div class="widget">
                                            <h5 class="widgetheading">Latest Blogs/News</h5>
                                            <ul class="recent">
                                                @foreach ($blogs as $element)
                                                    <li>
                                                    <a href="{{ url('blog/'.$element->id) }}">
                                                        <img src="{{ asset('images/'.$element->image) }}" class="pull-left" alt="" style="height:70px; width:70px;"/>
                                                    </a>
                                                    <h6>
                                                        <a href="{{ url('blog/'.$element->id) }}">{{ $element->title }}</a>
                                                    </h6>
                                                    <h6>Date: {{ date('d-m-Y',strtotime($element->created_at)) }}</h6>
                                                
                                                    
                                                   
                                                </li>
                                                
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </section>
@endsection

