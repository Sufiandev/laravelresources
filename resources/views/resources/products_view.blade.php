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
                                <div class="col-lg-8">
                                    <img src="{{ asset('images/'.$page->image) }}" width="100%">
                                </div>
                                <div class="col-lg-4">
                                    <aside class="right-sidebar">
                                        <div class="widget">
                                            <h5 class="widgetheading">{{ $page->name }}</h5>
                                            <h5>
                                                @if ($page->file != "")
                                                    <a href="{{ route('download.product',$page->id) }}">Click To Download</a>
                                                    <span id="res"></span>
                                                @endif
                                            </h5>
                                            <ul class="recent">
                                                <p>@php
                                                    echo $page->details;
                                                @endphp</p>
                                            </ul>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </section>

@endsection

