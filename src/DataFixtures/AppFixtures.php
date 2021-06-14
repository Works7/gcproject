<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $slugger;
    protected $encoder;

    public function __construct(SluggerInterface $slugger, UserPasswordEncoderInterface $encoder)
    {
        $this->slugger = $slugger;
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User;

        $hash = $this->encoder->encodePassword($admin, "password");

        $admin->setEmail("admin@gmail.com")
            ->setPassword($hash)
            ->setFullName("Admin")
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        for ($u = 0; $u < 5; $u++) {
            $user = new User();
            $hash = $this->encoder->encodePassword($user, "password");
            $user->setEmail("user$u@gmail.com")
                ->setFullName("User")
                ->setPassword($hash);

            $manager->persist($user);
        }

        $patisseries = new Category;
        $patisseries->setName('Pâtisseries')
            ->setSlug(strtolower($this->slugger->slug($patisseries->getName())));
        $manager->persist($patisseries);

        $patisserie1 = new Product;
        $patisserie1->setName('Éclair vanille')
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails('La description de l\'éclair vanille')
            ->setMainPicture("http:/placehold.it/400x400")
            ->setSlug(strtolower($this->slugger->slug($patisserie1->getName())));
        $manager->persist($patisserie1);

        $patisserie2 = new Product;
        $patisserie2->setName('3 chocolats')
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails('La description du 3 chocolats')
            ->setMainPicture("http:/placehold.it/400x400")
            ->setSlug(strtolower($this->slugger->slug($patisserie2->getName())));
        $manager->persist($patisserie2);

        $macarons = new Category;
        $macarons->setName('Macarons')
            ->setSlug(strtolower($this->slugger->slug($macarons->getName())));
        $manager->persist($macarons);

        $macaron1 = new Product;
        $macaron1->setName('Macaron Fraise')
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails('La description du macaron fraise')
            ->setMainPicture("http:/placehold.it/400x400")
            ->setSlug(strtolower($this->slugger->slug($macaron1->getName())));
        $manager->persist($macaron1);

        $manager->flush();
    }
}
