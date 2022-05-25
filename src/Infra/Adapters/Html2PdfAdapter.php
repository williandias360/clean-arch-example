<?php

namespace App\Infra\Adapters;

use App\Application\Contracts\ExportRegistrationPdfExport;
use App\Domain\Entities\Registration;
use Exception;
use Spipu\Html2Pdf\Html2Pdf;

final class Html2PdfAdapter implements ExportRegistrationPdfExport {

    public function generate(Registration $registration): string {
        $html2pdf = new Html2Pdf("P", "A4");
        try {
            $html2pdf->setDefaultFont("Arial");
            $html2pdf->writeHTML("<p>Nome: {$registration->getNome()}</p><p>CPF: {$registration->getRegistrationNumber()}</p>");
            return $html2pdf->output("", "S");
        } catch (Exception $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
    }

}
