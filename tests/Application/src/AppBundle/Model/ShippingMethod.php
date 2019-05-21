<?php

declare(strict_types=1);

namespace AppBundle\Model;

use Setono\SyliusPickupPointPlugin\Model\PickupPointProviderAwareInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPointProviderAwareTrait;
use Sylius\Component\Core\Model\ShippingMethod as BaseShippingMethod;

class ShippingMethod extends BaseShippingMethod implements PickupPointProviderAwareInterface
{
    use PickupPointProviderAwareTrait;
}
