<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $counter =1;

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {

        $this->createCategory(name: 'Wrap', image: 'wrap_cat.jpg', active: 1, manager: $manager);
        $this->createCategory(name: 'Veggie', image: 'veggie_cat.jpg', active: 1, manager: $manager);
        $this->createCategory(name: 'Sandwich', image: 'sandwich_cat.jpg', active: 1, manager: $manager);
        $this->createCategory(name: 'Salade', image: 'salade_cat.jpg', active: 1, manager: $manager);
        $this->createCategory(name: 'Pizza', image: 'pizza_cat.jpg', active: 1, manager: $manager);
        $this->createCategory(name: 'Pasta', image: 'pasta_cat.jpg', active: 1, manager: $manager);
        $this->createCategory(name: 'Burger', image: 'burger_cat.jpg', active: 1, manager: $manager);
        $this->createCategory(name: 'Asian food', image: 'asian_food_cat.jpg', active: 1, manager: $manager);
        
        // PLAT
        $manager->flush();

    }


    public function createCategory(string $name, $image, $active, ObjectManager $manager)
    {
        $category = new Categorie();
        $category->setLibelle($name);
        $category->setSlug($this->slugger->slug($category->getLibelle())->lower());
        $category->setImage($image);
        $category->setActive($active);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;


        return $category;
    }

}
