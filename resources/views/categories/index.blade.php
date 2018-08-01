@extends('layout.main_layout')
@section('title', trans('messages.category'))

@section('content')
<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2> {{ trans('messages.categories') }} </h2>
        </div>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        @if ($categories->isEmpty())
        <p> {{ trans('messages.categories_empty') }} </p>
        @else
        <table class="table">
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{!! $category->name !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
