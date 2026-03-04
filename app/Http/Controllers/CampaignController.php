<?php

namespace App\Http\Controllers;

use App\Http\Requests\Campaign\StoreRequest;
use App\Models\Campaign;
use App\Models\{Mail, Template};

class CampaignController extends Controller
{
    public function index()
    {
        $mail = Mail::query()->get()->map(fn ($mail) => [
            'id'    => $mail->id,
            'title' => $mail->title,
        ])->toArray();

        $template = Template::query()->get()->map(fn ($template) => [
            'id'   => $template->id,
            'name' => $template->name,
        ]);

        $tab = session('campaigns::active_tab', 'groups');

        return view('campaigns.index', [
            'campaignsSession' => session('campaigns::create'),
            'activeTab'        => $tab,
            'mail'             => $mail,
            'template'         => $template
        ]);
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(StoreRequest $request, $tab)
    {
        $oldData = session('campaigns::create', []);
        $data    = $request->validated();

        $newData = array_merge($oldData, $data);

        if ($request->has('step_with_checkbox')) {
            $newData['track_click'] = $request->boolean('track_click');
            $newData['track_open']  = $request->boolean('track_open');
        }

        session()->put('campaigns::create', $newData);

        if ($tab === 'groups') {
            session()->put('campaigns::active_tab', 'body');

            return to_route('campaigns.index');
        }

        if ($tab === 'body') {
            session()->put('campaigns::active_tab', 'send_at');

            return to_route('campaigns.index');
        }

        if ($tab === 'send_at') {
            $finalData = session('campaigns::create');
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
            ->with('cancel', 'Você pode começar um novo!');
    }
}
