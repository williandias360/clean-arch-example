<?php

namespace App\Application\Contracts;

use App\Domain\Entities\Registration;

interface ExportRegistrationPdfExport {

    public function generate(Registration $registration): string;
}
