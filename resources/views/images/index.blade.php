@extends('default.layouts.layout')
@section('content')
    <div class="form-group col-md-9">

        <form action="{{route('importer')}}" method="post" enctype="multipart/form-data">
            <div class="col-md-5 btn">
                {{csrf_field()}}
                <input type="file" name="imported-file">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Импортировать <i class="glyphicon
                glyphicon-upload"></i></button>
            </div>
        </form>

        <div class="col-md-3">
            <form action="{{URL::to('/admin/images/export')}}" method="post" enctype="multipart/form-data">
                <button class="btn btn-success" type="submit">Экспортировать <i class="glyphicon
                glyphicon-download"></i></button>
            </form>
        </div>

    </div>
<div class="container col-md-9">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="content">
    <table class="table table-striped table-hover table-bordered" id="notes-list">
        <thead class="text-uppercase">
        <tr>
            <th>№</th>
            <th>Заголовок</th>
            <th>Содержание заметки</th>
            <th>Картинка</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notes as $note)
            <tr>
                <td>{{$number++ }} <a href="http://mylaravelnotes.ua/admin/images/update/{{$note->id}}" class="btn
                btn-info btn-change" style="margin-top: 20px">Редактировать <i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="{{URL::to('/admin/images/delete/'.$note->id)}}" class="btn
                    btn-danger btn-change">Удалить <span class="glyphicon glyphicon-trash"></span></a>
                </td>
                <td>{{ $note->title }}</td>
                <td>{!! mb_substr($note->text,0,200,'UTF-8').'...' !!}</td>
                <td>
                    @foreach($images as $image)
                        @if($image->article_id == $note->id)
                    <img src="{{ asset('upload/'.$image->img) }}" class="img-responsive img-thumbnail img-circle">
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
