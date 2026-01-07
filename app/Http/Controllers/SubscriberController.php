<?php

namespace App\Http\Controllers;

use App\Models\ListMail;
use App\Models\Subscript;

class SubscriberController extends Controller
{
    public function index(ListMail $listMail)
    {
        return view('subscribers.index', [
            'listMail' => $listMail,
            'subscript' => $listMail->subscript()->get()
        ]);
    }

    public function destroy(ListMail $listMail, Subscript $subscript) {
        dd($subscript);
    }
}
