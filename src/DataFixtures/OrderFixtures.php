<?php

namespace App\DataFixtures;

use App\FruitStore\Domain\Common\Currency;
use App\FruitStore\Domain\Common\Price;
use App\FruitStore\Domain\Sales\Order;
use App\FruitStore\Domain\Product\Product;
use App\FruitStore\Domain\Product\ProductId;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    public const COUNT = 10;

    /**
     * @var Generator
     */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < self::COUNT; $i++) {
            $order = Order::create();

            foreach ($this->getRandomProducts() as $product) {
                $quantity = $this->faker->numberBetween(1, 10);
                $orderItem = $order->addItem($product, $quantity);
                $manager->persist($orderItem);
            }

            $manager->persist($order);
        }

        $manager->flush();
    }

    /**
     * @return Product[]
     */
    private function getRandomProducts(): iterable
    {
        $products = [];

        $maxIndex = count(ProductFixtures::FRUITS) - 1;
        $count = $this->faker->numberBetween(1, 5);

        foreach ($this->faker->randomElements(range(0, $maxIndex), $count) as $index) {
            $product = $this->getReference('product_'.$index);
            $products[] = $product;
        }

        return $products;
    }

    public function getDependencies(): iterable
    {
        return [
            ProductFixtures::class
        ];
    }
}
