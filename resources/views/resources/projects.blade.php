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
                                    <h4 class="heading">{{ $page->heading }}</h4>
                                    <div id="filters-container" class="cbp-l-filters-button">
                                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                                            All<div class="cbp-filter-counter"></div>
                                        </div>
                                        
                                            <div data-filter=".current" class="cbp-filter-item">
                                                Current
                                                <div class="cbp-filter-counter"></div>
                                            </div>
                                             <div data-filter=".completed" class="cbp-filter-item">
                                                Completed
                                                <div class="cbp-filter-counter"></div>
                                            </div>
                                        
                                        
                                        
                                    </div>
                                    <div id="grid-container" class="cbp-l-grid-projects">
                                        <ul>
                                            @foreach ($projects as $element)
                                                 <li class="cbp-item {{ strtolower($element->type) }}">
                                                <div class="cbp-caption">
                                                    <div class="cbp-caption-defaultWrap">
                                                        <img src="{{ asset('images/'.$element->image) }}" alt="" height="100%" width="100%"/>
                                                    </div>
                                                    <div class="cbp-caption-activeWrap">
                                                        <div class="cbp-l-caption-alignCenter">
                                                            <div class="cbp-l-caption-body">
                                                                <a href="{{ asset('images/'.$element->image) }}" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="{{ $element->name }}<br>">view larger</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cbp-l-grid-projects-title">
                                                    <a href="{{ url('projects/'.$element->slug) }} ">{{ $element->name }}</a>
                                                </div>
                                            </li>
                                            @endforeach
                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
@endsection

