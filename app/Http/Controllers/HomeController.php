<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use Excel;
use Illuminate\Http\Request;
use App\Cadastro;
use DB;
use Geocoder;
use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( 
            Request $request,
            Cadastro $user)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadastros = Cadastro::orderBy('nome')->paginate(15);
        $cadastrosct = Cadastro::get();

        return view('home',compact('cadastros', 'cadastrosct'));
    }

     public function mapa()
    {
        return view('maps.home');
    }

    public function mais()
    {
        return view('maps.mais');
    }

    public function show($id)
    {
        $cadastro = Cadastro::find($id);        
        return view('maps.cadastro', compact('cadastro'));
    }

    public function store(Request $request)
    {
       $dadosForm = $this->request->all();
       //dd($dadosForm);
       $this->user->create($dadosForm)->save();
       
       return redirect('/mapa');
    }


     public function edit($id)
    {
        $cadastro = Cadastro::find($id);
        return view('maps.editar', compact('cadastro'));
    }


    public function update(Request $request, $id)
    {
        Cadastro::find($id)->update($request->all());
        return redirect()->route('maps.home');
    }

    public function destroy($id)
    {
        Cadastro::find($id)->delete();
        return redirect()->route('maps.home');
    }
    public function sentaopau()
    {
        Cadastro::getQuery()->delete();
        return redirect()->route('maps.home');
    }

    public function importar()
    {
        return view('maps.importar');
    }


    public function downloadExcel($type)
    {
        $data = Cadastro::get()->toArray();
        return Excel::create('atores', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }


    public function importExcel(Request $request)
    {
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {
                    // dd($data);
                    $query = $value->tipo . ' ' . $value->logradouro . ' ' . $value->numero . ' ' . ", São Bernardo - São Paulo ";

                    // dd($query);
                    $latlng = Geocoder::getCoordinatesForQuery($query);
                    //dd($latlng);
                    $insert[] = [
                        'nome'              => $value->nome, 
                        'segmento'          => $value->segmento,
                        'contato_interno'   => $value->contato_interno,
                        'grau_apoio'        => $value->grau_apoio,
                        'area_atuacao'      => $value->area_atuacao,
                        'tipo'              => $value->tipo, 
                        'logradouro'        => $value->logradouro, 
                        'lng'               => $latlng['lng'],
                        'lat'               => $latlng['lat'] ,
                        'bairro'            => $value->bairro,
                        'numero'            => $value->numero,
                        'telefone'          => $value->telefone,
                        'email'             => $value->email,
                        'facebook'          => $value->facebook,
                        'sexo'              => $value->sexo,
                        'nascimento'        => $value->nascimento,
                        'tiporesidencia'    => $value->tiporesidencia
                    ];
                  
                }

                if(!empty($insert)){
                    DB::table('cadastros')->insert($insert);
                    Alert::success('Sucesso')->persistent('Fechar');
                    return back();

                }
            }
        }
        Alert::danger('Opá, deu algo errado!')->persistent('Fechar');
        return back();
    }

}
