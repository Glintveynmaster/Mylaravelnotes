@extends('default.layouts.layout')

@section('header')
@endsection

@section('sidebar-block')
@show

@section('content')
    <div class="" style="padding-top: 75px">
        <div class=" text-center clearfix">
            <h2>Редактирование материала</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="content clearfix">
            @if(session('message'))
                <div class="alert alert-success center-block col-md-6 text-center">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ route('update_post_p') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $article->id }}">
                <div class="form-group">
                    <label for="title">Введите название записи</label>
                    <input class="form-control" id="title" placeholder="Заголовок заметки" name="title" style="width: 500px;"
                           value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label for="text">Ваша заметка</label>
                    <textarea name="text" id="text" >{{$article->text}}</textarea>
                </div>
                <div>
                    <div class="form-group">
                    <p>Прикрпленные фото</p>


                    @foreach($walls as $wall)
                            <div class="photo-del">
                                <div class="photo-shadow">
                                    <a href="{{URL::to('/admin/images/delete/one_image/'.$wall->id)}}">
                                    <p title="Удалить">X</p>
                                    </a>
                                </div>
                        <img src="{{ asset('upload/'.$wall->img) }}" class="img-responsive img-thumbnail img-circle">
                            </div>
                    @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="img">Загрузить фото</label>
                    <input id="img" type="file" multiple name="file[]" class="btn btn-primary">
                </div>
                <button type="submit" class="btn btn-primary">Сохранить <i class="glyphicon
                glyphicon-edit"></i></button>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
