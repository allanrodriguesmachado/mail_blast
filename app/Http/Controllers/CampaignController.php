<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
//        session()->forget('campaigns::create');
        dump(session('campaigns::create'));

        // Pega qual tab deve ser exibido (vindo do redirect após salvar)
        $activeTab = session('campaigns::active_tab', 'groups');

        return view('campaigns.index', [
            'campaignsSession' => session('campaigns::create'),
            'activeTab' => $activeTab
        ]);
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function createTwo()
    {
        return view('campaigns.create-two');
    }

    public function store(Request $request)
    {
        $oldData = session('campaigns::create', []);

        $data = $request->validate([
            'name' => ['nullable'],
            'body' => ['nullable']
        ]);

        $newData = array_merge($oldData, $data);


        session()->put('campaigns::create', $newData);

        // Verifica se tem um próximo tab para ir
        $nextTab = $request->input('next_tab');

        if ($nextTab) {
            // Tem próximo tab: salva qual deve ser exibido
            session()->put('campaigns::active_tab', $nextTab);

            return to_route('campaigns.index');
        } else {
            // NÃO tem próximo tab: é o FINALIZAR!
            // Aqui você pode salvar no banco de dados, enviar email, etc.
            $finalData = session('campaigns::create');

            // TODO: Salvar $finalData no banco de dados
            // Campaign::create($finalData);

            // Limpa TUDO da sessão
            session()->forget('campaigns::create');
            session()->forget('campaigns::active_tab');

            // Redireciona com mensagem de sucesso
            return to_route('campaigns.index')
                ->with('success', 'Campanha cadastrada com sucesso!');
        }
    }

    public function cancel()
    {
        // Limpa toda a sessão de cadastro
        session()->forget('campaigns::create');
        session()->forget('campaigns::active_tab');

        return to_route('campaigns.index')
            ->with('success', 'Cadastro cancelado. Você pode começar um novo!');
    }
}
