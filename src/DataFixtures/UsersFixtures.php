<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
// use Faker;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
        ){}

    public function load(ObjectManager $manager): void
    {
        $admin = new Utilisateur();
        $admin->setEmail('admin@demo.fr');
        $admin->setNom('Administrateur');
        $admin->setPrenom('Modo');
        $admin->setTelephone('0601010101');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin')
        );
        $admin->setRoles(['ROLE_ADMIN']);
        
        $manager->persist(($admin));

        // $faker = Faker\Factory::create('fr_FR');

        // for($usr =1; $usr >=5; $usr++)
        // {
        //     $user = new Utilisateur();
        //     $user->setEmail($faker->email);
        //     $user->setNom($faker->firstName);
        //     $user->setPrenom($faker->lastName);
        //     $user->setTelephone($faker->phone);
        //     $user->setPassword(
        //         $this->passwordEncoder->hashPassword($user, 'secret')
        //     );
        // }
        
        $manager->flush();
    }
}
