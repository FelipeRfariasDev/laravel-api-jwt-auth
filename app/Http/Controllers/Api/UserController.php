<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Listar todos os registros método HTTP GET
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
        $model = $this->model::find($id);

        if(!$model) {
            return response()->json([
                'message'   => "id $id não foi encontrado",
            ], 404);
        }

        return response()->json($model);
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
        $model = $this->model::find($id);

        if(!$model) {
            return response()->json([
                'message'   => 'Registro não encontrato',
            ], 404);
        }

        $model->update($request->all());
        return response()->json($model);
    }

    /**
     * Excluir método HTTP DELETE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model::find($id);

        if(!$model) {
            return response()->json([
                'message'   => 'Registro não encontrato',
            ], 404);
        }

        $model->delete();
    }
}
