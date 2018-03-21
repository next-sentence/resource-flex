<?php

declare(strict_types=1);

namespace App\Entity;

use Sylius\Component\User\Model\UserInterface as BaseUserInterface;

interface AdminUserInterface extends BaseUserInterface
{
    public const DEFAULT_ADMIN_ROLE = 'ROLE_ADMINISTRATION_ACCESS';

    public function setLocaleCode($localeCode): void;
    public function getLocaleCode(): ?string;
}