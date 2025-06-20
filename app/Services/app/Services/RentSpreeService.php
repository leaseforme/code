<?php

namespace App\Services;

class RentSpreeService
{
    /**
     * Generate the RentSpree application URL for a given property.
     */
    public function applicationUrl(int $propertyId): string
    {
        $partnerCode = config('services.rentspree.partner_code');

        return "https://apply.rentspree.com/{$partnerCode}/{$propertyId}";
    }
}
