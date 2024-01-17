<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PushController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required',
        ]);

        $request->user()->updatePushSubscription(
            $request->input('endpoint'),
            $request->input('keys.p256dh'),
            $request->input('keys.auth')
        );

        return response()->json(['success' => true]);
    }

    public function unsubscribe(Request $request)
    {
        $request->validate([
            'endpoint'    => 'required',
            //'keys.auth'   => 'required',
            //'keys.p256dh' => 'required',
        ]);

        $request->user()->deletePushSubscription(
            $request->input('endpoint'),
        );

        return response()->json(['message' => 'Unsubscribed!']);
    }
}
