<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use QrCode;

class ShareController extends Controller
{
    public function generateQRCode(): View
    {
        $share_url = url(route('frontend.menu', Auth::id()));
        $qr =  QrCode::style('round')->size(300)->generate($share_url);
        return view('share.index', compact('qr', 'share_url'));
    }
}
