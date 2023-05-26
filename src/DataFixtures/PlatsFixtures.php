<?php

namespace App\DataFixtures;

use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
// use Faker;

class PlatsFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        // WRAP Catégorie 1
        $this->createPlat(name: 'Wrap Poulet', image: 'Food-Name-3461.jpg', active: 1, 
        description:'Wrap Poulet Croustillant : Salade, poulet frit, tomate, sauce cheese, salade, mayonnaise.', prix: 8.99, cat: 1, manager: $manager);

        // VEGGIE Catégorie 2
        $this->createPlat(name: 'Courgettes_farcies', image: 'courgettes_farcies.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 2, manager: $manager);

        // SANDWICH Catégorie 3
        $this->createPlat(name: 'Croqu\'Fromage', image: 'Food-Name-3631.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 3, manager: $manager);

        // SALADE Catégorie 4
        $this->createPlat(name: 'Salade', image: 'salad1.png', active: 1, description:'Description 3', prix: 8.99, cat: 4, manager: $manager);
        $this->createPlat(name: 'Salade Cesar', image: 'cesar_salad.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 4, manager: $manager);


        // PIZZA Catégorie 5
        $this->createPlat(name: 'Pizza Salmon', image: 'pizza-salmon.png', active: 1, description:'Description 3', prix: 8.99, cat: 5, manager: $manager);
        $this->createPlat(name: 'Pizza Margherita', image: 'pizza-margherita.jng', active: 1, description:'Description 3', prix: 8.99, cat: 5, manager: $manager);
        $this->createPlat(name: 'Pizza Basilic', image: 'Food-Name-8298.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 5, manager: $manager);

        // PASTA Catégorie 6
        $this->createPlat(name: 'Tagliatelles Saumon', image: 'tagliatelles-saumon.webp', active: 1, description:'Description 1', prix: 27.30, cat: 6, manager: $manager);
        $this->createPlat(name: 'Spaghetti Legumes', image: 'spaghetti-legumes.jpg', active: 1, description:'Description 2', prix: 12.99, cat: 6, manager: $manager);
        $this->createPlat(name: 'Lasagnes Viande', image: 'lasagnes_viande.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 6, manager: $manager);

        // BURGER Catégorie 7
        $this->createPlat(name: 'Hamburger', image: 'hamburger.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 7, manager: $manager);
        $this->createPlat(name: 'Monster Burger', image: 'Food-Name-6340.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 7, manager: $manager);
        $this->createPlat(name: 'Double Cheese Burger', image: 'Food-Name-433.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 7, manager: $manager);
        $this->createPlat(name: 'CheeseBurger', image: 'cheesburger.jpg', active: 1, description:'Description 3', prix: 8.99, cat: 7, manager: $manager);

        // ASIAN FOOD Catégorie 8
        $this->createPlat(name: 'Buffalo Chicken', image: 'buffalo-chicken.webp', active: 1, description:'Description 3', prix: 8.99, cat: 8, manager: $manager);

        $manager->flush();
    }
    public function createPlat(string $name, $image, $active, $description, $prix, $cat, ObjectManager $manager)
    {
        $plat = new Plat();
        $plat->setLibelle($name);
        $plat->setSlug($this->slugger->slug($plat->getLibelle())->lower());
        $plat->setImage($image);
        $plat->setActive($active);
        $plat->setDescription($description);
        $plat->setPrix($prix);

        $category = $this->getReference('cat-'.$cat);
        $plat->setCategorie($category);


        $manager->persist($plat);

        return $plat;
    }
}
