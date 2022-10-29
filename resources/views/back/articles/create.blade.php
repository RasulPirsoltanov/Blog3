@extends('back.layouts.master')
@section('title')
    All Blogs
@endsection
@section('css')
    <!-- Custom styles for this page -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
            <form action="{{ route('store_blog') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">
                        <h4>Blog title</h4>
                    </label>
                    <input type="text" name="title" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">
                        <h4>Blog Category</h4>
                    </label>
                    <select name="category" class="form-control" id=" " >
                        <option selected="true" class="text-danger" disabled="disabled">Choise category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">
                        <h4>Blog Image</h4>
                    </label>
                    <input type="file" class="form-control" name="image">
                </div>
                <textarea id="summernote" name="editordata"></textarea>
                <script>
                    $('#summernote').summernote({
                        placeholder: 'Hello Bootstrap 4',
                        tabsize: 2,
                        height: 100
                    });
                </script>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block float-right">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
