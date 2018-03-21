<?php

namespace App\Entity;

use Sylius\Component\User\Model\User as BaseUser;

class AdminUser extends BaseUser implements AdminUserInterface
{
    protected $localeCode;

    /**
     * @return string
     */
    public function getLocaleCode(): ?string
    {
        return $this->localeCode;
    }

    /**
     * @param string $localeCode
     */
    public function setLocaleCode($localeCode): void
    {
        $this->localeCode = $localeCode;
    }
}
