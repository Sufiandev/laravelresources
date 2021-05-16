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

                                    @foreach ($blogs as $element)
                                      <a href="{{ url('blog/'.$element->id) }}">
                                        <h3>{{ $element->title }}</h3>
                                    </a>
                                    <h6>Date: {{ date('d-m-Y',strtotime($element->created_at)) }}</h6>
                                    <a href="{{  url('blog/'.$element->id)  }}">
                                        <img src="{{ asset('images/'.$element->image) }}" alt="" class="img-responsive"/>
                                    </a>
                                    <p>
                                    <p style="text-align: justify;">{{ $element->description }}</p>
                                    <h4>
                                        <a href="{{ url('blog/'.$element->id) }}">Read More...</a>
                                    </h4>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="solidline"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                     {{ $blogs->links() }}
                                </div>
                               
                            </div>
                        </div>
                    </section>
@endsection

