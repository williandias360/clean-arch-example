<?php

namespace App\Infra\Adapters;

use App\Application\Contracts\ExportRegistrationPdfExport;
use App\Domain\Entities\Registration;
use Dompdf\Dompdf;

final class DomPdfAdapter implements ExportRegistrationPdfExport {

    public function generate(Registration $registration): string {
        $domPdf = new Dompdf();
        $domPdf->loadHtml("<p>Nome: {$registration->getNome()}</p><p>CPF: {$registration->getRegistrationNumber()}</p>");
        $domPdf->setPaper("A4", "landscape");
        $domPdf->render();
        return $domPdf->output();
    }

}
