<?php

namespace App\Services;

use DocuSign\eSign\Api\EnvelopesApi;
use DocuSign\eSign\Client\ApiClient;
use DocuSign\eSign\Model\EnvelopeDefinition;
use DocuSign\eSign\Model\RecipientViewRequest;

class DocuSignService
{
    protected ApiClient $client;

    public function __construct()
    {
        $this->client = new ApiClient([
            'basePath'      => config('services.docusign.base_uri'),
            'oAuthHostName' => config('services.docusign.base_uri'),
        ]);

        // TODO: Implement OAuth authorization code flow and persist token
        $this->client->setOAuthToken(
            accessToken: '', // Inject token via OAuth callback
            expiresIn: 3600
        );
    }

    /**
     * Create an envelope for a lease and return the signing URL.
     */
    public function createLeaseEnvelope(EnvelopeDefinition $envelopeDefinition, string $returnUrl): string
    {
        $accountId = config('services.docusign.account_id');

        $envelopeApi     = new EnvelopesApi($this->client);
        $envelopeSummary = $envelopeApi->createEnvelope($accountId, $envelopeDefinition);

        $viewRequest = new RecipientViewRequest([
            'authenticationMethod' => 'email',
            'clientUserId'         => $envelopeDefinition->getRecipients()->getSigners()[0]->getClientUserId() ?? '1',
            'userName'             => $envelopeDefinition->getRecipients()->getSigners()[0]->getName() ?? 'User',
            'email'                => $envelopeDefinition->getRecipients()->getSigners()[0]->getEmail() ?? 'user@example.com',
            'returnUrl'            => $returnUrl,
        ]);

        $view = $envelopeApi->createRecipientView($accountId, $envelopeSummary->getEnvelopeId(), $viewRequest);

        return $view->getUrl();
    }
}
