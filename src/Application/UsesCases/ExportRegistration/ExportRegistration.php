<?php

namespace App\Application\UsesCases\ExportRegistration;

use App\Application\Contracts\ExportRegistrationPdfExport;
use App\Application\Contracts\Storage;
use App\Domain\Repositories\LoadRegistrationRepository;
use App\Domain\ValueObjects\Cpf;

final class ExportRegistration {

    private LoadRegistrationRepository $repository;
    private ExportRegistrationPdfExport $pdfExport;
    private Storage $storage;

    public function __construct(
            LoadRegistrationRepository $repository,
            ExportRegistrationPdfExport $pdfExport,
            Storage $storage
    ) {
        $this->repository = $repository;
        $this->pdfExport  = $pdfExport;
        $this->storage    = $storage;
    }

    public function handle(InputBoundary $input): OutputBoundary {
        $cpf          = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadByRegistrationNumber($cpf);
        $fileContent  = $this->pdfExport->generate($registration);

        $this->storage->store($input->getPdfFileName(), $input->getPath(), $fileContent);
        return new OutputBoundary($input->getPath() . DIRECTORY_SEPARATOR . $input->getPdfFileName());
    }

}
