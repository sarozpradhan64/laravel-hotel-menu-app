<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use QrCode;

class ShareController extends Controller
{
    private function shareURL()
    {
        $share_url = url(route('frontend.menu', Auth::id()));
        return $share_url;
    }
    private function QRCode()
    {
        $share_url = $this->shareURL();
        if (!is_dir(public_path('images/qrcodes'))) {
            File::makeDirectory(public_path('images/qrcodes'));
        }

        $qr =  QrCode::format('png')->style('round')->size(300)->generate($share_url);
        return $qr;
    }
    public function generateQRCode(): View
    {
        $share_url = $this->shareURL();
        $qr = $this->QRCode();
        return view('share.index', compact('qr', 'share_url'));
    }

    public function downloadQRcode()
    {
        $qr = $this->QRCode();
        $filename = 'qrcodes/qrcode_' . Auth::id() . '.png';
        Storage::disk('public')->put($filename, $qr);
        return Storage::download('public/' . $filename);
    }
}
