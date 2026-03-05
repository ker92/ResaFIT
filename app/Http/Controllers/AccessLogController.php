<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;

class AccessLogController extends Controller
{
    public function index()
    {
        return AccessLog::with('user')->get();
    }
}

