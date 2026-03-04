<?php

namespace App\Http\Controllers;

use App\Models\{Campaign, Mail, Template};

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'mails'     => Mail::query()->count(),
            'templates' => Template::query()->count(),
            'campaigns' => Campaign::query()->count(),
        ]);
    }
}
