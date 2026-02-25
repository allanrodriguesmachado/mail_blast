<?php

namespace App\Http\Controllers;

use App\Http\Requests\Template\{StoreRequest, UpdateRequest};
use App\Models\Template;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::query()->paginate(2);

        return view('template.index', compact('templates'));
    }

    public function create()
    {
        return view('template.create');
    }

    public function store(StoreRequest $request)
    {
        Template::query()->create($request->validated());

        return to_route('templates.index');
    }

    public function show(Template $template)
    {
        return view('template.show', compact('template'));
    }

    public function edit(Template $template)
    {
        return view('template.edit', compact('template'));
    }

    public function update(UpdateRequest $request, Template $template)
    {
        $template->update($request->validated());

        return to_route('templates.index');
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return to_route('templates.index');
    }
}
