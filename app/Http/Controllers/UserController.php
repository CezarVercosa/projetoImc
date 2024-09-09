<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        return view('index');
    }

    public function list()
    {
        $users = User::paginate(10);
        return view('list', compact('users'));
    }
    
    public function create() {
        return view('create');
    }
    
    public function store(Request $request) {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mensagem' => 'required|string|max:255',
            'telefone' => 'required|string',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
        ]);

        $validatedData['telefone'] = preg_replace('/\D/', '', $validatedData['telefone']);

        try {
            User::create($validatedData);
            return redirect('/')->with('success', 'Usuário criado com sucesso!');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()->withErrors(['email' => 'O e-mail fornecido já está em uso.']);
            }
            
            return back()->withErrors(['error' => 'Ocorreu um erro ao criar o usuário.']);
        }
    }
    
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }
    
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => [
            'required',
            'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'telefone' => 'required|string|min:11',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
        ]);

        $validatedData['telefone'] = preg_replace('/\D/', '', $validatedData['telefone']);

        

        try {
            
            $user->update($validatedData);
            return redirect('/')->with('success', 'Usuário atualizado com sucesso!');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()->withErrors(['email' => 'O e-mail fornecido já está em uso.']);
            }
            
            return back()->withErrors(['error' => 'Ocorreu um erro ao salvar o usuário.']);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id); 
            $user->delete(); 
            return redirect()->back()->with('success', 'Usuário deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao deletar o usuário.']);
        }
    }
    
}
