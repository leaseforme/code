<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Models\Lease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocuSignWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        // DocuSign Connect can send XML or JSON depending on settings.
        $envelopeId = $request->input('envelopeId');
        $status     = $request->input('status');

        Log::info('DocuSign webhook received', $request->all());

        if ($status === 'completed') {
            Lease::where('envelope_id', $envelopeId)->update(['status' => 'signed']);
        }

        return response('OK', 200);
    }
}
