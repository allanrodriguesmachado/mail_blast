<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreSubscribeRequest, Subscriber\StoreRequest, UpdateSubscribeRequest};
use App\Models\{Mail, Subscribe};
use Illuminate\Contracts\View\{View};
use Illuminate\Database\Eloquent\Builder;

class SubscribeController extends Controller
{
    public function index($mail_id)
    {
        $name = mb_strtoupper(request()->search);
        $subscribers = Subscribe::query()->where('mail_id', $mail_id)->get();

        if ($subscribers->isEmpty()) {
            Mail::query()->find($mail_id)->delete();

            return to_route('mail.index');
        }

        return view('subscribes.index', [
            'mail' => $mail_id,
            'subscribes' => Subscribe::query()->where('mail_id', $mail_id)->when($name, fn(Builder $query) => $query->where('name', 'ILIKE', "%{$name}%"))->paginate(),
        ]);
    }

    public function create(Mail $mail_id): View
    {
        return view('subscribes.create', compact('mail_id'));
    }

    public function store(StoreRequest $subscribeRequest, mixed $mail_id)
    {
        $sub = $subscribeRequest->validated([]);

        Subscribe::query()->create(array_merge($sub, ['mail_id' => (int)$mail_id]));

        return to_route('subscribes.index', ['mail_id' => $mail_id])
            ->with('success', __('Subscribes created successfully.'));
    }

    public function edit(Subscribe $subscribe)
    {
        return view('subscribes.edit', compact('subscribe'));
    }

    public function update(UpdateSubscribeRequest $request, Subscribe $subscribe)
    {
        $subscribe->update($request->validated());

        return to_route('subscribes.index', ['mail_id' => $subscribe->mail_id])
            ->with('success', __('Subscribes updated successfully.'));

    }

    public function destroy(mixed $mail_id, Subscribe $sub)
    {
        $sub->delete();

        return back()->with('success', __('Subscribes deleted successfully.'));
    }
}
