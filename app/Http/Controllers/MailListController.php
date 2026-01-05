<?php

namespace App\Http\Controllers;

use App\Models\ListMail;
use Illuminate\Http\Request;

class MailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('email-list.index', [
            'emptyList' => ListMail::query()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('email-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:155'],
        ]);

        $listMail = ListMail::query()->create($data);

        $items = [
            [
                'name' => 'Allan',
                'email' => 'allan@php.com.br'
            ],
        ];

        $listMail->subscript()->createMany($items);

        return to_route('list');
    }

    /**
     * Display the specified resource.
     */
    public function show(ListMail $listMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListMail $listMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ListMail $listMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListMail $listMail)
    {
        //
    }
}
