<?php

namespace App\Services;

use DocuSign\eSign\Model\Document;
use DocuSign\eSign\Model\EnvelopeDefinition;
use DocuSign\eSign\Model\Recipients;
use DocuSign\eSign\Model\Signer;
use DocuSign\eSign\Model\Tabs;
use DocuSign\eSign\Model\SignHere;

class EnvelopeBuilderService
{
    /**
     * Build a simple lease envelope with a single signer.
     */
    public function buildLeaseEnvelope(string $pdfBase64, string $tenantEmail, string $tenantName): EnvelopeDefinition
    {
        $document = new Document([
            'documentBase64' => $pdfBase64,
            'name'           => 'Lease Agreement',
            'fileExtension'  => 'pdf',
            'documentId'     => '1',
        ]);

        $signHere = new SignHere([
            'xPosition'    => '100',
            'yPosition'    => '600',
            'documentId'   => '1',
            'pageNumber'   => '1',
            'recipientId'  => '1',
        ]);

        $tabs = new Tabs(['signHereTabs' => [$signHere]]);

        $signer = new Signer([
            'email'        => $tenantEmail,
            'name'         => $tenantName,
            'recipientId'  => '1',
            'clientUserId' => '1',
            'tabs'         => $tabs,
        ]);

        $recipients = new Recipients(['signers' => [$signer]]);

        return new EnvelopeDefinition([
            'emailSubject' => 'Lease Agreement',
            'documents'    => [$document],
            'recipients'   => $recipients,
            'status'       => 'sent',
        ]);
    }
}
