<?php

namespace App\Infra\Cli\Commands;

use App\Application\UsesCases\ExportRegistration\ExportRegistration;
use App\Application\UsesCases\ExportRegistration\InputBoundary;
use App\Infra\Http\Controllers\Presentation;

final class ExportRegistrationCommand {

    private ExportRegistration $useCase;

    public function __construct(ExportRegistration $useCase) {
        $this->useCase = $useCase;
    }

    public function handle(Presentation $presentation): string {
        $inputBoudary = new InputBoundary(
                "01234567890",
                "xpto-cli.pdf",
                __DIR__ . "/../../../../storage/registrations"
        );

        $output = $this->useCase->handle($inputBoudary);

        return $presentation->output([
                    "fullFileName" => $output->getFullFileName()
        ]);
    }

}
