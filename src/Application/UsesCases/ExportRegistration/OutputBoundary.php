<?php

namespace App\Application\UsesCases\ExportRegistration;

final class OutputBoundary {

    private string $fullFileName;

    public function __construct(string $fullFileName) {
        $this->fullFileName = $fullFileName;
    }

    public function getFullFileName(): string {
        return $this->fullFileName;
    }

}
