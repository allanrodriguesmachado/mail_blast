<?php

namespace App\Http\Controllers;

use App\Models\ListMail;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MailListController extends Controller
{
    public function index()
    {
        return view('email-list.index', [
            'emptyList' => ListMail::query()->get(),
        ]);
    }

    public function create()
    {
        return view('email-list.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:155'],
        ]);

        $file = $request->file('file');

        $fileHandle = fopen($file->getRealPath(), "r");

        $dataFile = [];

        while(($rows = fgetcsv($fileHandle, 0, ',')) !== false) {
            $dataFile[] = [
                'name' => $rows[0],
                'email' => $rows[1],
            ];
        }

        fclose($fileHandle);

        $listMail = ListMail::query()->create($data);

        $listMail->subscript()->createMany($dataFile);

        return to_route('list');
    }

    public function show(ListMail $listMail)
    {
    }

    public function edit(ListMail $listMail)
    {
    }

    public function update(Request $request, ListMail $listMail)
    {
    }

    public function destroy(ListMail $listMail)
    {
        //
    }
}
