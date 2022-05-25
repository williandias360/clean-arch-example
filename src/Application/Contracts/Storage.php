<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Application\Contracts;

/**
 *
 * @author Willian
 */
interface Storage {

    public function store(string $fileName, string $path, string $content);
}
