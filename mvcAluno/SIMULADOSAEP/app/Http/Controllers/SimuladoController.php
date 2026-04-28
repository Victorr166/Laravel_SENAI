<?php

class ProdutoController extends Controller{

    public function Cadastrar(){
        $departamentos = Departamento::with(['funcionario','detalhe'])->get();
        return view('cadastrar', compact('departamentos'));
    }

      public function CadastrarFuncionario(){
        $funcionarios = Funcionario::with(['funcionario','detalhe'])->get();
        return view('cadastrarFuncionario', compact('funcionarios'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'Cargo' => 'required|string|max:255',
            'Email' => 'required|string|max:255',
            'DataAdmissao' => 'required|string|max:255',
            'Salario' => 'required|string|max:255',
            'Sobrenome' => 'required|string|max:255',
            
        ]);

        Departamento::create([
            'nome' => $request->nome,
            'DataCriacao' => $request->DataCriacao,
            'Orcamento' => $request->Orcamento,
            'Sigla' => $request->Sigla,
        ]);

        return redirect()->back()->with('success','Produto cadastrado com sucesso!');
    }

    public function atualizar($id){
        $produto = Produto::with('detalhe')->findOrFail($id);
        $setores = Setor::all();
        return view('atualizar', compact('produto','setores'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'tamanho' => 'required|string|max:255',
            'peso' => 'required|numeric|max:255'
        ]);

        $produto = Produto::findOrFail($id);

        // atualiza produto
        $produto->update([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
        ]);

        // atualiza detalhe
        $produto->detalhe->update([
            'descricao' => $request->descricao,
            'tamanho' => $request->tamanho,
            'peso' => $request->peso,
        ]);

        return redirect()->back()->with('success','Produto atualizado com sucesso!');
    }

    public function deletar($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produto.listar')->with('success','Produto excluído com sucesso!');
    }
}