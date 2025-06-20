<?php

namespace App\Jobs;

use App\Models\OauthToken;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class RefreshDocuSignToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $token = OauthToken::where('provider', 'docusign')
            ->where('expires_at', '<', now()->addMinutes(10))
            ->first();

        if (!$token) {
            return;
        }

        $response = Http::asForm()->post(config('services.docusign.base_uri') . '/oauth/token', [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $token->refresh_token,
            'client_id'     => config('services.docusign.client_id'),
            'client_secret' => config('services.docusign.client_secret'),
        ]);

        if ($response->failed()) {
            return;
        }

        $data = $response->json();

        $token->update([
            'access_token'  => $data['access_token'],
            'expires_at'    => now()->addSeconds($data['expires_in'] ?? 3600),
            'refresh_token' => $data['refresh_token'] ?? $token->refresh_token,
        ]);
    }
}
