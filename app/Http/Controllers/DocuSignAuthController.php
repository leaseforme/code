<?php

namespace App\Http\Controllers;

use App\Models\OauthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DocuSignAuthController extends Controller
{
    /**
     * Redirect the user to DocuSign's consent screen.
     */
    public function redirect()
    {
        $query = http_build_query([
            'response_type' => 'code',
            'scope'         => 'signature',
            'client_id'     => config('services.docusign.client_id'),
            'redirect_uri'  => config('services.docusign.redirect_uri'),
        ]);

        return redirect(config('services.docusign.base_uri') . '/oauth/auth?' . $query);
    }

    /**
     * Handle the OAuth callback from DocuSign.
     */
    public function callback(Request $request)
    {
        $code = $request->get('code');

        $response = Http::asForm()->post(config('services.docusign.base_uri') . '/oauth/token', [
            'grant_type'    => 'authorization_code',
            'code'          => $code,
            'client_id'     => config('services.docusign.client_id'),
            'client_secret' => config('services.docusign.client_secret'),
            'redirect_uri'  => config('services.docusign.redirect_uri'),
        ]);

        if ($response->failed()) {
            return redirect()->route('dashboard')->withErrors('DocuSign authorization failed.');
        }

        $data = $response->json();

        OauthToken::updateOrCreate(
            ['provider' => 'docusign', 'user_id' => $request->user()->id],
            [
                'access_token'  => $data['access_token'] ?? '',
                'refresh_token' => $data['refresh_token'] ?? null,
                'expires_at'    => now()->addSeconds($data['expires_in'] ?? 3600),
                'account_id'    => $data['account_id'] ?? null,
            ]
        );

        return redirect()->route('dashboard')->with('status', 'DocuSign connected.');
    }
}
