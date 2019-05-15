<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class ProviderPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container): void
    {
        /** @var bool $hasService */
        $hasService = $container->has('setono_sylius_pickup_point.manager.provider_manager');

        if (!$hasService) {
            return;
        }

        $definition = $container->getDefinition('setono_sylius_pickup_point.manager.provider_manager');

        $taggedServices = $container->findTaggedServiceIds('setono_sylius_pickup_point.provider');

        foreach ($taggedServices as $id => $tags) {
            $definition->addArgument(new Reference($id));
        }
    }
}
