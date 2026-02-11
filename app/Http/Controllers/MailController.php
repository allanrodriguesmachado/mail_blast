<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mail\{StoreRequest, UpdateRequest};
use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MailController extends Controller
{
    public function index(): View
    {
        $search = request()->search;

        $mailList = Mail::query()->withCount('subscribes')
            ->when($search, fn (Builder $query) => $query
                ->where('title', 'like', "%{$search}%"))->paginate();

        return view('mail.index', [
            'mail'      => $mailList,
            'countMail' => Mail::query()->count(),
        ]);
    }

    public function create()
    {
        return view('mail.create');
    }

    public function store(StoreRequest $request)
    {
        $res = $request->validated();

        $attachment = $res['attachment'];

        $fileHandle = fopen($attachment->getRealPath(), 'r');

        $lineText = [];
        while ($csvRow = fgetcsv($fileHandle, null, ',')) {
            $lineText[] = [
                'name'  => $csvRow[0],
                'email' => $csvRow[1],
            ];
        }

        $emailLIst = Mail::query()->create([
            'title' => $res['title'],
        ]);

        $emailLIst->subscribes()->createMany($lineText);

        return to_route('mail.index');
    }

    public function show(Mail $mail_id)
    {
        return view('mail.edit', compact('mail_id'));
    }

    public function update(UpdateRequest $request, Mail $mail_id)
    {
        $updateTitle = $request->validated();

        $mail_id->update($updateTitle);

        return to_route('mail.index');
    }

    public function destroy(Mail $mail_id): RedirectResponse
    {
        $mail_id->delete();

        return to_route('mail.index');
    }
}
