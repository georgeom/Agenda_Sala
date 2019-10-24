<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Agenda;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AgendaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $model;

    public function __construct(Agenda $agenda)
    {
        $this->model = $agenda;
    }

    public function getAll(){
        $agenda = $this->model->all();

        if (count($agenda) > 0 ){
            return response() ->json($agenda, Response::HTTP_OK);
        }else{
            return response() ->json([], Response::HTTP_OK);
        }
    }

    public function get($id){
        $agenda = $this->model->find($id);
        
        if (count($agenda) > 0 ){
            return response() ->json($agenda, Response::HTTP_OK);
        }else{
            return response() ->json(null, Response::HTTP_OK);   
        }
    }

    public function store(Request $request){
        
        $agenda = $this->model->create($request->all());
        return response() ->json($agenda, Response::HTTP_CREATED);

        /*$validator = Validator::make(
            $request ->all(),
            [
                'id_sala' => 'required',
                'email_solicitante' => 'required',
                'dt_inicio' => 'required',
                'dt_termino' => 'required',
                'situacao' => 'required',
                'descricao' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response() ->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }else{
            try {

                $agenda = $this->model->create($request->all());
                return response() ->json($agenda, Response::HTTP_CREATED);
                
            } catch (QueryException $exception) {
                return response() ->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_ERROR);
            }
        }*/

        
    }

    public function update($id, Request $request){
        $agenda = $this->model->find($id)->update($request->all());

        return response() ->json($agenda, Response::HTTP_OK);  
    }

    public function destroy($id){
        $agenda = $this->model->find($id)->delete();

        return response() ->json(null, Response::HTTP_OK);
    }

}
