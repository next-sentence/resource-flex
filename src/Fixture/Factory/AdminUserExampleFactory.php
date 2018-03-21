<?php

declare(strict_types=1);

namespace App\Fixture\Factory;

use App\Entity\AdminUserInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminUserExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $userFactory;
    /**
     * @var \Faker\Generator
     */
    private $faker;
    /**
     * @var OptionsResolver
     */
    private $optionsResolver;
    /**
     * @var string
     */
    private $localeCode;

    /**
     * @param FactoryInterface $userFactory
     * @param string $localeCode
     */
    public function __construct(FactoryInterface $userFactory, string $localeCode)
    {
        $this->userFactory = $userFactory;
        $this->localeCode = $localeCode;
        $this->faker = \Faker\Factory::create();
        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = []): AdminUserInterface
    {
        $options = $this->optionsResolver->resolve($options);
        /** @var AdminUserInterface $user */
        $user = $this->userFactory->createNew();
        $user->setEmail($options['email']);
        $user->setEmailCanonical($options['email']);
        $user->setUsername($options['username']);
        $user->setPlainPassword($options['password']);
        $user->setEnabled($options['enabled']);
        $user->addRole(AdminUserInterface::DEFAULT_ADMIN_ROLE);
        $user->setLocaleCode($options['locale_code']);

        if ($options['api']) {
            $user->addRole('ROLE_API_ACCESS');
        }
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('email', function (Options $options): string {
                return $this->faker->email;
            })
            ->setDefault('username', function (Options $options): string {
                return $this->faker->firstName . ' ' . $this->faker->lastName;
            })
            ->setDefault('enabled', true)
            ->setAllowedTypes('enabled', 'bool')
            ->setDefault('password', 'password123')
            ->setDefault('locale_code', $this->localeCode)
            ->setDefault('api', false)
        ;
    }
}