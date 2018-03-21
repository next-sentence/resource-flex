<?php

namespace App\Locale\Context;

use App\Locale\LocaleStorage;
use App\Locale\LocaleStorageInterface;
use Sylius\Component\Locale\Context\LocaleContextInterface;
use Sylius\Component\Locale\Context\LocaleNotFoundException;
use Sylius\Component\Locale\Provider\LocaleProviderInterface;

final class StorageBasedLocaleContext implements LocaleContextInterface
{

    /**
     * @var LocaleStorage
     */
    private $localeStorage;

    /**
     * @var LocaleProviderInterface
     */
    private $localeProvider;

    /**
     * @param LocaleStorageInterface $localeStorage
     * @param LocaleProviderInterface $localeProvider
     */
    public function __construct(
        LocaleStorageInterface $localeStorage,
        LocaleProviderInterface $localeProvider
    ) {
        $this->localeStorage = $localeStorage;
        $this->localeProvider = $localeProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocaleCode(): string
    {
        $availableLocalesCodes = $this->localeProvider->getAvailableLocalesCodes();
        try {
            $localeCode = $this->localeStorage->get();
        } catch (\Exception $exception) {
            $localeCode = $this->localeProvider->getDefaultLocaleCode();
        }

        if (!in_array($localeCode, $availableLocalesCodes, true)) {
            throw LocaleNotFoundException::notAvailable($localeCode, $availableLocalesCodes);
        }

        return $localeCode;
    }
}
