<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Mail;
use App\Models\Template;
use Mockery\Generator\Method;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $this->getItems(Mail::class);
        return view('dashboard', [
            'mails' => Mail::query()->count(),
            'templates' => Template::query()->count(),
            'campaigns' => Campaign::query()->count()
        ]);
    }

    private function getItems(Method $method) {
        return $method->getParameters();
    }
}
