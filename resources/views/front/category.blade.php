@extends('front.layouts.master')
@section('title')
    {{ $category->name }}
@endsection
@section('content')
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <div class="col-md-9 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @if (count($articles )> 0)
                    @foreach ($articles as $item)
                        <div class="post-preview">
                            <a href="{{ route('single', [$item->getcategory->slug, $item->slug]) }}">
                                <h2 class="post-title">{{ $item->title }}</h2>
                                <img src="{{ asset($item->image) }}" width="350px" alt="">
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="{{ asset('front') }}/#!">{{ $item->getcategory->name }}</a>
                                <span class="float-end"> {{ $item->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                        <span class="text-red">
                            Visits: {{ $item->hit }}
                        </span>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @endforeach
                    @else
                    <div class="alert alert-danger">
                        No Blogs
                    </div>
                @endif
                <!-- Pager-->
                {{ $articles->links() }}
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase"
                        href="{{ asset('front') }}/#!">Older Posts →</a></div>
            </div>
            @include('front.widgets.category')
        </div>
    </div>
    </div>
@endsection
