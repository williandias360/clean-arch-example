<?php

use App\Application\UsesCases\ExportRegistration\ExportRegistration;
use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Infra\Adapters\DomPdfAdapter;
use App\Infra\Adapters\LocalStorageAdapter;
use App\Infra\Http\Controllers\ExportRegistrationController;
use App\Infra\Presentation\ExportRegistrationPresenter;
use App\Infra\Repositories\MySQL\PdoRegistrationRepository;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

require_once __DIR__ . "/../vendor/autoload.php";
$appConfig = require_once __DIR__ . "/../config/app.php";

//entities
$registration = new Registration();
$registration->setNome("Willian Dias Brito")
        ->setBirthDate(new DateTimeImmutable("1991-03-26"))
        ->setEmail(new Email("willian.dias360@gmail.com"))
        ->setRegistrationAt(new DateTimeImmutable())
        ->setRegistrationNumber(new Cpf("01234567890"));

//Use cases
$dsn = sprintf("mysql:host=%s;port=%s;dbname=%s;charset=%s",
        $appConfig["db"]["host"],
        $appConfig["db"]["port"],
        $appConfig["db"]["dbname"],
        $appConfig["db"]["charset"]
);

$pdo = new PDO($dsn, $appConfig["db"]["username"], $appConfig["db"]["password"], [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_PERSISTENT         => TRUE,
        ]);

$loadRegistrationRepository = new PdoRegistrationRepository($pdo);
$pdfExport                  = new DomPdfAdapter();
$storage                    = new LocalStorageAdapter();

$exportRegistrationUseCase = new ExportRegistration($loadRegistrationRepository, $pdfExport, $storage);
$request                   = new Request("GET", "http://localhost:8080");
$response                  = new Response();

$exportRegistrationController = new ExportRegistrationController(
        $request,
        $response,
        $exportRegistrationUseCase
);


$exportRegistrationPresenter = new ExportRegistrationPresenter();
echo $exportRegistrationController
        ->handle($exportRegistrationPresenter)
        ->getBody();


