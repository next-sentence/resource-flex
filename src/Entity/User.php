<?php

namespace App\Entity;

use Sylius\Component\User\Model\User as BaseUser;

class User extends BaseUser implements UserInterface
{
    protected $name;
    protected $title;
    protected $info;

}
