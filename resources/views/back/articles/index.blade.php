@extends('back.layouts.master')
@section('title')
    All Blogs
@endsection
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('back') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="card-body">
        <div class="table-responsive">

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>Title</th>
                        <th>category_id</th>
                        <th>slug</th>
                        <th>content</th>
                        <th>status</th>
                        <th>hit</th>
                        <th>cretated_at</th>
                        <th>updated_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $item)
                        <tr>
                            <td><img src="{{ asset($item->image) }}" width="70px" alt=""></td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->getcategory->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ Str::limit($item->content, 50) }}</td>
                            <td><input class="switch" data-status="{{$item->status}}" article-id="{{ $item->id }}" type="checkbox" data-toggle="toggle"
                                    data-on="Aktive" data-off="Passive" data-onstyle="primary" data-offstyle="danger"
                                    @if ($item->status === 1) checked @endif>
                            </td>
                            <td>{{ $item->hit }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td><a href="{{ route('blog.edit', $item->id) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-success">View</a>
                                <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-info">Edit</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>image</th>
                        <th>Title</th>
                        <th>category_id</th>
                        <th>slug</th>
                        <th>content</th>
                        <th>status</th>
                        <th>hit</th>
                        <th>cretated_at</th>
                        <th>updated_at</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('back') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('back') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('back') }}/js/demo/datatables-demo.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('.switch').change(function() {
                id=$(this)[0].getAttribute('article-id');
                $.get('{{route('blog.switch')}}',{id:id} ,function(data) {
                    console.log(data);
                });
            })
        })
    </script>
@endsection
