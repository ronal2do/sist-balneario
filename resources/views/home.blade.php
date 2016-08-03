@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <h1>{{ $cadastrosct->count() }}</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                    
              <table class="table table-hover">
                    <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Logradouro</th>
                      <th>Bairro</th>
                      <th>Número</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($cadastros as $c)
                    
                        <tr>
                          <td>{{$c->nome}}</td>
                          <td>{{$c->tipo}} {{$c->logradouro}}</td>
                          <td>{{$c->bairro}}</td>
                          <td>{{$c->numero}}</td>
                        </tr>
                   
                    @endforeach
                    </tbody>
                   
                </table>
                 
            </div> {!! $cadastros->render() !!}
        </div>
    </div>
</div>
@endsection
