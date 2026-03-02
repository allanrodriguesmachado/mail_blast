<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CampaignCreateSessionControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isInCampaigns = str($request->route()->getName() ?? '')->startsWith('campaigns.');

        if (!$isInCampaigns && !str($request->header('referer'))->contains($request->route()->compiled->getStaticPrefix())) {
            session()->forget('campaigns::create');
            session()->forget('campaigns::active_tab');
        }

        return $next($request);
    }
}
