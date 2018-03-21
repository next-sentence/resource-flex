<?php

namespace App\Locale;

use Sylius\Component\Locale\Context\LocaleNotFoundException;
use Sylius\Component\Resource\Storage\StorageInterface;

final class LocaleStorage implements LocaleStorageInterface
{
    /**
     * @var StorageInterface
     */
    private $storage;

    /**
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * {@inheritdoc}
     */
    public function set(string $localeCode): void
    {
        $this->storage->set($this->provideKey(), $localeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function get(): string
    {
        $localeCode = $this->storage->get($this->provideKey());
        if (null === $localeCode) {
            throw new LocaleNotFoundException('No locale is set!');
        }

        return $localeCode;
    }

    /**
     * {@inheritdoc}
     */
    private function provideKey(): string
    {
        return '_locale';
    }
}
