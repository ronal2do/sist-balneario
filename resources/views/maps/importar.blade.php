@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default text-center">
                <div class="panel-heading text-left"> <a href="{{ url('/mapa') }}"><i class="fa fa-arrow-left"></i> Voltar</a></div>
                  {{Form::open(array('url'=>'importExcel', 'files'=>true))}}
                <div style="padding:30px;">
                    <label for="import_file">
                      <input type="file" name="import_file" class="btn btn-sucess">
                    </label>
                     
                     <!-- submit buttons -->
                     <input type="submit" class="btn btn-primary" value="Enviar">
                     <input type="reset" class="btn btn-danger" value="Cancelar">
    
                  {{Form::close()}}
                  </div>
                </div>
                   <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                    <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                    <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
            <h3 style="padding:30px;">Instruções </h3>
            <ol>
                <li>Baixar uma planilha <strong><a href="{{ URL::to('downloadExcel/xls') }}">XLS</a></strong> no botão acima para verificar os campos. </li>
                <li>A planilha a enviar deve conter os mesmo campos da planilha de modelo.</li>
                <li>Longitude e latitude <i>(lng e lat)</i> serão gerados automaticamente ao envio da planilha.</li>
                <li>A conversão pode demorar de acordo com a quantidade de linhas, <strong>NÃO cancele o processo.</strong></li>
            </ol>
            </div>
       
        </div>
    </div>
</div>

@endsection

@section('post-script')

@endsection
