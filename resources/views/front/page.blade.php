@extends('front.layouts.master')
@section('title')
    {{ $page->title }}
@endsection
@section('bg',$page->image)
@section('content')
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-9 col-lg-8 col-xl-7">
                    {!! $page->content !!}
                    <br>
                    <a href="http://spaceipsum.com/">Space Ipsum</a>
                    &middot; Images by
                    <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                    </p>
                </div>
                @include('front.widgets.category')
            </div>
            <hr>
        </div>
    </article>
@endsection
