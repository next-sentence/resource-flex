<?php

declare(strict_types=1);

namespace App\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class CurrencyFixture extends AbstractFixture
{
    /**
     * @var FactoryInterface
     */
    private $currencyFactory;
    /**
     * @var ObjectManager
     */
    private $currencyManager;

    /**
     * @param FactoryInterface $localeFactory
     * @param ObjectManager $localeManager
     */
    public function __construct(FactoryInterface $localeFactory, ObjectManager $localeManager)
    {
        $this->currencyFactory = $localeFactory;
        $this->currencyManager = $localeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $options): void
    {
        foreach ($options['currencies'] as $currencyCode) {
            /** @var LocaleInterface $currency */
            $currency = $this->currencyFactory->createNew();
            $currency->setCode($currencyCode);
            $this->currencyManager->persist($currency);
        }

        $this->currencyManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
            ->arrayNode('currencies')
            ->prototype('scalar')
        ;
    }
}