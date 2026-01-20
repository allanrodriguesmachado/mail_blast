<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateMailRequest;
use App\Http\Requests\UpdateTemplateMailRequest;
use App\Models\TemplateMail;
use JetBrains\PhpStorm\NoReturn;

class TemplateMailController extends Controller
{
    public function index()
    {
        return view('template.index', [
            'template' => TemplateMail::query()->get(),
        ]);
    }

    public function create()
    {
        return view('template.create');
    }

    #[NoReturn]
    public function store(StoreTemplateMailRequest $request)
    {
        TemplateMail::query()->create($request->validated());

        return redirect()->route('template.index');
    }

    public function show(TemplateMail $template)
    {
        return redirect()->route('template.index',[
            'template' => $template]);
    }

    public function edit(TemplateMail $template)
    {
        return view('template.edit', [
            'templateMail' => $template,
        ]);
    }

    public function update(UpdateTemplateMailRequest $request, TemplateMail $template)
    {
        $template->update($request->validated());

        return redirect()->route('template.index');
    }

    public function destroy(TemplateMail $template)
    {
        $template->delete();

        return redirect()->route('template.index');
    }
}
