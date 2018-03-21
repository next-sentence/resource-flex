<?php

namespace App\Locale;

interface LocaleStorageInterface
{
    public function set(string $localeCode): void;

    public function get(): string ;
}