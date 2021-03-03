<?php

namespace App\Http\Controllers;

use App\Models\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    private $model;

    public function __construct(Contatos $contatos)
    {
        $this->model = $contatos;
    }

    /**
     * Listar todos os contatos método HTTP GET
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->model::all());
    }

    /**
     * Listar um usuário especifico pelo id método HTTP GET
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contatos = $this->model::find($id);

        if(!$contatos) {
            return response()->json([
                'message'   => "Contato id $id não foi encontrado",
            ], 404);
        }

        return response()->json($contatos);
    }

    /**
     * Salvar método HTTP POST
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model->fill($request->all());
        return response()->json($this->model->save(), 201);
    }

    /**
     * Atualizar método HTTP PUT
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contatos = $this->model::find($id);

        if(!$contatos) {
            return response()->json([
                'message'   => 'Registro não encontrato',
            ], 404);
        }

        $contatos->update($request->all());
        return response()->json($contatos);
    }

    /**
     * Excluir método HTTP DELETE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contatos = $this->model::find($id);

        if(!$contatos) {
            return response()->json([
                'message'   => 'Registro não encontrato',
            ], 404);
        }

        $contatos->delete();
    }
}
