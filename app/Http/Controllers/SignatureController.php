
<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Services\DocuSignService;
use DocuSign\eSign\Model\EnvelopeDefinition;

class SignatureController extends Controller
{
    /**
     * Create a DocuSign envelope for the given lease and redirect the signer.
     */
    public function create(Lease $lease, DocuSignService $service)
    {
        // TODO: Build a full EnvelopeDefinition with documents and tabs.
        $envelopeDefinition = new EnvelopeDefinition([
            'emailSubject' => 'Lease Agreement',
        ]);

        $signUrl = $service->createLeaseEnvelope($envelopeDefinition, route('leases.show', $lease));

        return redirect($signUrl);
    }
}
