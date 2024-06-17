<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
       // $this->authorize('users.index');
     
     
        $users = User::paginate(15);

        $user = User::find(1);
     

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $dados = $request->all();

             

            User::create( $dados);
            return redirect()->back();





        } catch (\Throwable $th) {

            $message    =   env('APP_DEBUG') ? $th->getMessage() : 'Erro ao processar sau requisicao!';
          dd( $message);
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::all();

        return view('users.show',compact('roles'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::find($id);
            $dados = $request->all();

            if(!$dados['password']){
                $dados['password'] = $user->password;
            }

            $user->update($dados);

            return redirect()->back();



            
        } catch (\Throwable $th) {
            $message    =   env('APP_DEBUG') ? $th->getMessage() : 'Erro ao processar sau requisicao!';
            dd( $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
