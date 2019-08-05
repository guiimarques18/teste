<?php

namespace FederalSt\Http\Controllers\Veiculos;

use FederalSt\Http\Controllers\Controller;
use App\Http\Requests;
use FederalSt\Veiculos\CadastroVeiculo;
use FederalSt\User;
use FederalSt\Notifications\TemplateEmail;
use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;


class CadastroVeiculosController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, CadastroVeiculo $cadastroVeiculo) {
        /**
         * Verifica se o usuario tem permissao para acessar
         */
        $this->authorize('view', $cadastroVeiculo);

        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword) && Auth::user()->role == 2) {
            $cadastroveiculos = CadastroVeiculo::where('placa', 'ILIKE', "%$keyword%")
                    // ->orWhere('renavam', '=', "$keyword")
                    ->orWhere('modelo', 'ILIKE', "%$keyword%")
                    ->orWhere('marca', 'ILIKE', "%$keyword%")
                    // ->orWhere('ano', '=', "$keyword")
                    ->orWhere('proprietario', 'ILIKE', "%$keyword%")
                    ->orderby('marca', 'desc')
                    ->orderby('modelo', 'desc')
                    ->paginate($perPage);
        } else {
            if (Auth::user()->role == 2) {
                $cadastroveiculos = CadastroVeiculo::orderby('marca', 'desc')
                        ->orderby('modelo', 'desc')
                        ->paginate($perPage);
            } else {
                $cadastroveiculos = CadastroVeiculo::where('proprietario', '=', Auth::user()->cpf)
                        ->orderby('marca', 'desc')
                        ->orderby('modelo', 'desc')
                        ->paginate($perPage);
            }
        }

        

        if (!isset($cadastroveiculos))
            $cadastroveiculos = array();
            
        return view('veiculos.cadastro-veiculo.index', compact('cadastroveiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(CadastroVeiculo $cadastroVeiculo) {
        /**
         * Verifica se o usuario tem permissao para acessar
         */
        $this->authorize('create', $cadastroVeiculo);

        return view('veiculos.cadastro-veiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
    
        $cadastro = new CadastroVeiculo;

        $requestData = $request->all();
        $validator = Validator::make($requestData,$cadastro->rules);
        if ($validator->fails()) {
            return redirect('veiculo/create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            CadastroVeiculo::create($requestData);

            Session::flash('message', 'Veículo cadastrado com sucesso!');
            Session::flash('alert-class', 'alert-success');

            // $email = CadastroVeiculo::join('users', 'users.cpf', '=', 'cadastro_veiculos.proprietario')
            //     ->select('email')
            //     ->where('cadastro_veiculos.id', '=', $id)
            //     ->value('email');

            // $user = new User();
            // $user->email = $email;
            // $user->notify(new TemplateEmail());

            return redirect('veiculo');
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message', 'Erro ao cadastrar veículo: ' . $e);
            Session::flash('alert-class', 'alert-danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $cadastroveiculo = CadastroVeiculo::findOrFail($id);

        return view('veiculos.cadastro-veiculo.show', compact('cadastroveiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, CadastroVeiculo $cadastroVeiculo) {
        /**
         * Verifica se o usuario tem permissao para acessar
         */
        $this->authorize('edit', $cadastroVeiculo);

        $cadastroveiculo = CadastroVeiculo::select('*')
                ->findOrFail($id);

        return view('veiculos.cadastro-veiculo.edit', compact('cadastroveiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request) {

        $this->validate($request, [
            'placa' => 'required|string',
            'renavam' => 'required|numeric',
            'modelo' => 'required|string',
            'marca' => 'required|string',
            'ano' => 'required|numeric',
            'proprietario' => 'required|string',
        ]);
        
        $requestData = $request->all();

        if (!validar_cpf($requestData['proprietario'])) {
            return redirect('veiculo/'.$id.'/edit')
                ->withErrors("CPF inválido")
                ->withInput();
        }

    
        try {
            $cadastroveiculo = CadastroVeiculo::findOrFail($id);
            $cadastroveiculo->update($requestData);

            Session::flash('message', 'Veículo atualizado com sucesso!');
            Session::flash('alert-class', 'alert-success');

            // $email = CadastroVeiculo::join('users', 'users.cpf', '=', 'cadastro_veiculos.proprietario')
            //     ->select('email')
            //     ->where('cadastro_veiculos.id', '=', $id)
            //     ->value('email');

            // $user = new User();
            // $user->email = $email;
            // $user->notify(new TemplateEmail());

            return redirect('veiculo');
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message', 'Erro ao atualizar veículo: ' . $e);
            Session::flash('alert-class', 'alert-danger');

            return redirect('veiculo')->with('status', 'Falha ao atualizar o Veículo #' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, CadastroVeiculo $cadastroVeiculo) {
        /**
         * Verifica se o usuario tem permissao para acessar
         */
        $this->authorize('delete', $cadastroVeiculo);
        
        if(CadastroVeiculo::destroy($id)) {
            Session::flash('message', 'Veículo excluído com sucesso!');
            Session::flash('alert-class', 'alert-success');

            return redirect('veiculo')->with('status', 'Processo #'.$id.' excluído.');
        } else {
            Session::flash('message', 'Erro ao excluir veículo: ' . $e);
            Session::flash('alert-class', 'alert-danger');

            return redirect('veiculo')
                ->withErrors("Falha na exclus&atilde;o!");
        }
    }

}
