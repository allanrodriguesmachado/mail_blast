<?php

namespace App\Http\Controllers;

use App\Models\ListMail;
use App\Models\Subscript;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class SubscriberController extends Controller
{
    public function index(ListMail $listMail)
    {
        return view('subscribers.index', [
            'listMail' => $listMail,
            'subscript' => $listMail->subscript()->get()
        ]);
    }

    public function create(ListMail $listMail)
    {
        return view('subscribers.create', [
            'listMail' => $listMail,
        ]);
    }

    public function store(ListMail $listMail, Request $request)
    {
        $listItems = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $listItems['list_mail_id'] = $listMail->id;

        Subscript::query()->create($listItems);

        return view('dashboard');
    }

    public function destroy(ListMail $listMail, Subscript $subscript)
    {
        dd($subscript);
    }
}
