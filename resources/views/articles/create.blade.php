@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Write new</h1>

    <hr />
    <form action="{{ route('articles.store')}}" method="post">
      {!! csrf_field() !!}
      <div class="form-group {{$errors->has('title')?'has-error':''}}">
        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control" />
        {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
      </div>

      <div class="form-group {{$errors->has('content')?'has-error':''}}">
        <label for="content">content</label>
        <textarea name="content" rows="10" id="content" class="form-control">{{ old('content')}}</textarea>
        {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">
          save
        </button>
      </div>
    </form>
  </div>
@endsection
