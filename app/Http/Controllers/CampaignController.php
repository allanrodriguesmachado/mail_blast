<?php

namespace App\Http\Controllers;

use App\Http\Requests\Campaign\StoreRequest;
use App\Models\Campaign;
use App\Models\Mail;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
       $mail = Mail::query()->get()->map(fn ($mail) => [
            'id' => $mail->id,
            'title' => $mail->title,
        ])->toArray();


        $tab = session('campaigns::active_tab', 'groups');

        return view('campaigns.index', [
            'campaignsSession' => session('campaigns::create'),
            'activeTab' => $tab,
            'mail' => $mail
        ]);
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(StoreRequest $request, $tab)
    {
        $oldData = session('campaigns::create', []);
        $data = $request->validated();

        $newData = array_merge($oldData, $data);
        session()->put('campaigns::create', $newData);

        if ($tab === 'groups') {
            session()->put('campaigns::active_tab', 'likes');
            return to_route('campaigns.index');
        }

        if ($tab === 'likes') {
            $finalData = session('campaigns::create');
            dump($finalData);
            Campaign::create($finalData);

            session()->forget('campaigns::create');
            session()->forget('campaigns::active_tab');

            return to_route('campaigns.index')
                ->with('success', 'Campanha cadastrada com sucesso!');
        }

        return to_route('campaigns.index');
    }

    public function cancel()
    {
        session()->forget('campaigns::create');
        session()->forget('campaigns::active_tab');

        return to_route('campaigns.index')
            ->with('success', 'Cadastro cancelado. Você pode começar um novo!');
    }
}
