<?php

namespace App\Http\Controllers;

use App\Models\TemplateMail;
use App\Http\Requests\StoreTemplateMailRequest;
use App\Http\Requests\UpdateTemplateMailRequest;

class TemplateMailController extends Controller
{
    public function index()
    {
        return view('template.index');
    }

    public function create()
    {
        return view('template.create');
    }

    public function store(StoreTemplateMailRequest $request)
    {
        dd($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(TemplateMail $templateMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemplateMail $templateMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemplateMailRequest $request, TemplateMail $templateMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemplateMail $templateMail)
    {
        //
    }
}
