<?php

namespace App\Http\Controllers;

use App\Models\QrToken;
use App\Models\AccessLog;
use App\Models\Gym;
use App\Models\Reservation;

class AdminQrController extends Controller
{
    public function validateQr($token)
    {
        $qrToken = QrToken::with('user')->where('token', $token)->first();

        if (!$qrToken) {
            return view('admin.qr-result', [
                'success' => false,
                'message' => 'QR Code invalide.',
            ]);
        }

        if ($qrToken->used_at) {
            return view('admin.qr-result', [
                'success' => false,
                'message' => 'QR Code déjà utilisé.',
            ]);
        }

        if (now()->greaterThan($qrToken->expires_at)) {
            return view('admin.qr-result', [
                'success' => false,
                'message' => 'QR Code expiré.',
            ]);
        }

        $qrToken->update(['used_at' => now()]);
        $reservation = Reservation::where('user_id', $qrToken->user_id)
            ->where('status', 'approved')
            ->latest()
            ->first();

        if ($reservation) {
            $reservation->update(['status' => 'completed']);
        }

        $gym = Gym::first();
        if ($gym) {
            AccessLog::create([
                'user_id'    => $qrToken->user_id,
                'gym_id'     => $gym->id,
                'date_acces' => now(),
            ]);
        }

        return view('admin.qr-result', [
            'success' => true,
            'message' => 'Accès autorisé pour ' . $qrToken->user->name,
            'user'    => $qrToken->user,
        ]);
    }
}
