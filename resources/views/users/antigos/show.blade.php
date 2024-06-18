@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')


<ul>
@foreach($roles as $role)
<li>{{$role->name}} 

<ul>
    @foreach($role->permissions as $permission)
    <li>{{$permission->name}}</li>
    @endforeach
</ul>
</li>

@endforeach
</ul>
    
<ul>
    <li>Usuario logado: {{Auth::user()->name}}</li>
    <li>
        <ul>
            <li>Funções</li>
            <li></li>
            @foreach(Auth::user()->roles as $role)
                <li>
                    {{$role->name}}
                </li>
            @endforeach
        </ul>
    </li>
</ul>
@stop
