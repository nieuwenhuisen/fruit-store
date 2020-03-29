<?php

namespace App\DataFixtures;

use App\FruitStore\Domain\Common\Currency;
use App\FruitStore\Domain\Common\Price;
use App\FruitStore\Domain\Product\Product;
use App\FruitStore\Domain\Product\ProductId;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    private const FRUITS = ['Alfalfa Sprouts', 'Apple', 'Apricot', 'Artichoke', 'Asian Pear', 'Asparagus', 'Atemoya', 'Avocado', 'Bamboo Shoots', 'Banana', 'Bean Sprouts', 'Beans', 'Beets', 'Belgian Endive', 'Bell Peppers', 'Bitter Melon', 'Blackberries', 'Blueberries', 'Bok Choy', 'Boniato', 'Boysenberries', 'Broccoflower', 'Broccoli', 'Brussels Sprouts', 'Cabbage', 'Cactus Pear', 'Cantaloupe', 'Carambola', 'Carrots', 'Casaba Melon', 'Cauliflower', 'Celery', 'Chayote', 'Cherimoya', 'Cherries', 'Coconuts', 'Collard Greens', 'Corn', 'Cranberries', 'Cucumber', 'Dates', 'Dried Plums', 'Eggplant', 'Endive', 'Escarole', 'Feijoa', 'Fennel', 'Figs', 'Garlic', 'Gooseberries', 'Grapefruit', 'Grapes', 'Green Beans', 'Green Onions', 'Greens', 'Guava', 'Hominy', 'Honeydew Melon', 'Horned Melon', 'Iceberg Lettuce', 'Jerusalem Artichoke', 'Jicama', 'Kale', 'Kiwifruit', 'Kohlrabi', 'Kumquat', 'Leeks', 'Lemons', 'Lettuce', 'Lima Beans', 'Limes', 'Longan', 'Loquat', 'Lychee', 'Madarins', 'Malanga', 'Mandarin Oranges', 'Mangos', 'Mulberries', 'Mushrooms', 'Napa', 'Nectarines', 'Okra', 'Onion', 'Oranges', 'Papayas', 'Parsnip', 'Passion Fruit', 'Peaches', 'Pears', 'Peas', 'Peppers', 'Persimmons', 'Pineapple', 'Plantains', 'Plums', 'Pomegranate', 'Potatoes', 'Prickly Pear', 'Prunes', 'Pummelo', 'Pumpkin', 'Quince', 'Radicchio', 'Radishes', 'Raisins', 'Raspberries', 'Red Cabbage', 'Rhubarb', 'Romaine Lettuce', 'Rutabaga', 'Shallots', 'Snow Peas', 'Spinach', 'Sprouts', 'Squash', 'Strawberries', 'String Beans', 'Sweet Potato', 'Tangelo', 'Tangerines', 'Tomatillo', 'Tomato', 'Turnip', 'Ugli Fruit', 'Water Chestnuts', 'Watercress', 'Watermelon', 'Waxed Beans', 'Yams', 'Yellow Squash', 'Yuca/Cassava', 'Zucchini Squash',];

    public function load(ObjectManager $manager): void
    {
        foreach (self::FRUITS as $fruitName) {
            $product = Product::fromNameAndPrice(
                ProductId::create(),
                $fruitName,
                Price::fromCents(1000, Currency::EUR())
            );

            $manager->persist($product);
        }

        $manager->flush();
    }
}
