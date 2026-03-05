<?php

namespace App\Http\Controllers;

use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        return Subscription::create([
            'user_id'=>auth()->id(),
            'type'=>$request->type,
            'date_debut'=>now(),
            'date_fin'=>$request->date_fin
        ]);
    }
}
