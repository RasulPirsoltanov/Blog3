@isset($categories)
<div class="col-md-3">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">Categories
        </a>
        @foreach ($categories as $item)
            <a href="{{route('categoryList',$item->slug)}}" class="list-group-item list-group-item-action @if( Request::segment(2)==$item->slug) bg-success @endif">{{ $item->name }} <span
                    class="badge bg-primary rounded-pill float-end">{{ $item->getCount->count() }}</span></a>
        @endforeach

    </div>
@endisset