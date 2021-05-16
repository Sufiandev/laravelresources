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
                                    <img src="{{ asset('images/'.$project->image) }}" width="100%">
                                </div>
                                <div class="col-lg-4">
                                    <aside class="right-sidebar">
                                        <div class="widget">
                                            <h5 class="widgetheading">{{ $project->name }}</h5>
                                           
                                            <ul class="recent">
                                                <p>@php
                                                    echo $project->details;
                                                @endphp</p>
                                            </ul>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </section>

@endsection

