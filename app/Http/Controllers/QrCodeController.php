<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\QrToken;

class QrCodeController extends Controller
{
    public function generate()
    {
        $user = Auth::user();

        QrToken::where('user_id', $user->id)
            ->whereNull('used_at')
            ->delete();

        $token = hash('sha256', Str::random(40));

        $qrToken = QrToken::create([
            'user_id'    => $user->id,
            'token'      => $token,
            'expires_at' => now()->addMinutes(5),
        ]);

        $qrUrl = route('admin.qr.validate', $qrToken->token);

        return view('user.qrcode', compact('qrUrl', 'qrToken'));
    }
}
