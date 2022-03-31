@extends('backend.layout.master')
@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
    <style>
        //menu builder
.menu-builder .dd {
    position: relative;
    display: block;
    margin:0;
    padding: 0;
    max-width: inherit;
    list-style: none;
    font-size: 13px;
    line-height: 20px;
}
.menu-builder .dd .item_actions{
    z-index: 9;
    position: relative;
    top: 10px;
    right: 10px;
}
.menu-builder .dd .item_actions .edit{
    margin-right: 5px;
}
.menu-builder .dd-handle{
    display: block;
    height: 50px;
    margin: 5px 0;
    padding: 14px 25px;
    color: #333;
    text-decoration: none;
    font-weight: 700;
}
    </style>
@endpush
@section('content')
    <!-- Main content -->
    <div class="content" style="margin-top: 15px!importent">
        <div class="container-fluid">
            <div class="card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">How To Use:</h5><br>
                    <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
                </div>
            </div>
            <!-- .card -->
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title">Menu item list for <code>{{$menu->name}}</code></h3>
                    <div class="ml-auto">
                        <a href="{{route('admin.menus.index')}}" class="btn btn-primary ml-auto"><i class="fa fa-angle-left"></i>&nbsp; Back</a>
                        <a href="{{route('admin.menus.item.create',$menu->id)}}" class="btn btn-info ml-auto"><i class="fas fa-plus"></i>&nbsp; Create</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                    <div class="menu-builder">
                        <div class="dd">
                            <ol class="dd-list">
                                @forelse($menu->menuItems as $item)
                                    <li class="dd-item" data-id="{{$item->id}}">
                                        <div class="item_actions float-right">
                                            <a href="{{route('admin.menus.item.edit',['id'=>$menu->id,'itemId'=>$item->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <a id="delete" href="{{route('admin.menus.item.delete',['id'=>$menu->id,'itemId'=>$item->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                        </div>
                                        <div class="dd-handle">
                                                <span>{{$item->title}}</span>
                                                <small class="url">{{$item->url}}</small>
                                        </div>
                                        @if(!$item->childs->isEmpty())
                                            <ol class="dd-list">
                                                @foreach($item->childs as $childItem)
                                                    <li class="dd-item" data-id="{{$childItem->id}}">
                                                        <div class="item_actions float-right">
                                                                <a href="{{route('admin.menus.item.edit',['id'=>$menu->id,'itemId'=>$childItem->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                                <a id="delete" href="{{route('admin.menus.item.delete',['id'=>$menu->id,'itemId'=>$childItem->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                                        </div>
                                                        <div class="dd-handle">
                                                                <span>{{$childItem->title}}</span>
                                                                <small class="url">{{$childItem->url}}</small>
                                                        </div>
                                                        @if(!$childItem->childs->isEmpty())
                                                            <ol class="dd-list">
                                                                @foreach($childItem->childs as $child2Item)
                                                                    <li class="dd-item" data-id="{{$child2Item->id}}">
                                                                        <div class="item_actions float-right">
                                                                                <a href="{{route('admin.menus.item.edit',['id'=>$menu->id,'itemId'=>$child2Item->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                                                <a id="delete" href="{{route('admin.menus.item.delete',['id'=>$menu->id,'itemId'=>$child2Item->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                                                        </div>
                                                                        <div class="dd-handle">
                                                                                <span>{{$child2Item->title}}</span>
                                                                                <small class="url">{{$child2Item->url}}</small>
                                                                        </div>
                                                                        @if(!$child2Item->childs->isEmpty())
                                                                            {'Ok'}
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    </li>
                                @empty
                                    <p>No Item Found</p>           
                                @endforelse
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <script>
        $('.dd').nestable({maxDepth:2 });
        $('.dd').on('change',function (e){

           console.log(JSON.stringify($('.dd').nestable('serialize')));

           $.post('{{route('admin.menus.order',$menu->id)}}',{
               order: JSON.stringify($('.dd').nestable('serialize')),
               _token : '{{csrf_token()}}'
           },function (data){
               toastr.success('Menus Order Updated :)');
           });
        });
    </script>
@endpush