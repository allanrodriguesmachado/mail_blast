<?php

namespace App\Http\Controllers;

use App\Models\ListMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailListController extends Controller
{
    public function index()
    {
        return view('email-list.index', [
            'emptyList' => ListMail::query()->withCount('subscript')->where('title', 'like', '%'.request()->search.'%')->paginate(2)
        ]);
    }

    public function create()
    {
        return view('email-list.create');
    }

    /**
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:155'],
        ]);

        $file = $request->file('file');

        if (empty($file)) {
            return to_route('list.create');
        }

        $fileHandle = fopen($file->getRealPath(), 'r');

        $dataFile = [];

        while (($rows = fgetcsv($fileHandle, 0, ',')) !== false) {
            $dataFile[] = [
                'name' => $rows[0],
                'email' => $rows[1],
            ];
        }

        fclose($fileHandle);

        DB::Transaction(function () use ($data, $dataFile) {
            $listMail = ListMail::query()->create($data);

            $listMail->subscript()->createMany($dataFile);
        });

        return to_route('list');
    }

    public function show(ListMail $listMail) {}

    public function edit(ListMail $listMail) {}

    public function update(Request $request, ListMail $listMail) {}

    public function destroy(ListMail $listMail)
    {
        //
    }
}
