@extends('default.layouts.layout')

@section('header')
    @endsection

@section('sidebar-block')
    @endsection

@section('content')
<div class="" style="padding-top: 85px">
    <div class="text-center clearfix">
        <h2>Оставьте свою заметку</h2>
        @if(count($errors) > 0)
            <div class="alert alert-danger center-block col-md-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="content">
        @if(session('message'))
            <div class="alert alert-success center-block col-md-6 text-center">
                {{ session('message') }}
            </div>
        @endif
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Введите название записи</label>
            <input class="form-control" id="title" placeholder="Заголовок заметки" name="title" style="width: 500px;" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="text">Ваша заметка</label>
            <textarea name="text" id="text">{{old('text')}}</textarea>
        </div>
        <div class="form-group">
            <label for="img">Загрузить фото</label>
            <input id="img" type="file" multiple name="file[]" class="btn btn-primary" value="{{old('file[]')}}">
        </div>
        <button type="submit" class="btn btn-primary">Добавить <i class="glyphicon glyphicon-send"></i></button>
    </form>
    </div>
</div>
    @endsection

@section('footer')
    @parent
@endsection

