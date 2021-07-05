<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Image;
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

        $hash = $this->encoder->encodePassword($admin, "p%G5MrISy9FKXRZwd5");

        $admin->setEmail("administrateur@ganacheetcabosse.com")
            ->setPassword($hash)
            ->setFullName("Admin")
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        // Catégorie - Pâtisserie
        $patisseries = new Category;
        $patisseries->setName("Pâtisseries")
            ->setSlug(strtolower($this->slugger->slug($patisseries->getName())));
        $manager->persist($patisseries);

        // Catégorie - Macarons
        $macarons = new Category;
        $macarons->setName("Macarons")
            ->setSlug(strtolower($this->slugger->slug($macarons->getName())));
        $manager->persist($macarons);

        // Catégorie - Bonbons de chocolat
        $bonbonsChocolat = new Category;
        $bonbonsChocolat->setName("Bonbons de chocolat")
            ->setSlug(strtolower($this->slugger->slug($bonbonsChocolat->getName())));
        $manager->persist($bonbonsChocolat);

        // Catégorie - Tablettes de chocolat
        $tablettesChocolat = new Category;
        $tablettesChocolat->setName("Tablettes de chocolat")
            ->setSlug(strtolower($this->slugger->slug($tablettesChocolat->getName())));
        $manager->persist($tablettesChocolat);

        // Catégorie - Spécialités en chocolat
        $specialitesChocolat = new Category;
        $specialitesChocolat->setName("Spécialités en chocolat")
            ->setSlug(strtolower($this->slugger->slug($specialitesChocolat->getName())));
        $manager->persist($specialitesChocolat);

        // Catégorie - Moulages
        $moulagesChocolat = new Category;
        $moulagesChocolat->setName("Moulages")
            ->setSlug(strtolower($this->slugger->slug($moulagesChocolat->getName())));
        $manager->persist($moulagesChocolat);

        // Article - Pâtisserie
        $patisserie1 = new Product;
        $patisserie1->setName("3 Chocolats")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-3-chocolats-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie1->getName())));

        $imagePatisserie1 = new Image();
        $imagePatisserie1->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-3-chocolats-2.jpg")
            ->setProduct($patisserie1);
        $manager->persist($imagePatisserie1);

        $imagePatisserie12 = new Image();
        $imagePatisserie12->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-3-chocolats-3.jpg")
            ->setProduct($patisserie1);
        $manager->persist($imagePatisserie12);

        $manager->persist($patisserie1);

        // Article - Pâtisserie
        $patisserie2 = new Product;
        $patisserie2->setName("Bavarois Framboise")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-bavarois-framboise-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie2->getName())));

        $imagePatisserie2 = new Image();
        $imagePatisserie2->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-bavarois-framboise-2.jpg")
            ->setProduct($patisserie2);
        $manager->persist($imagePatisserie2);

        $manager->persist($patisserie2);

        // Article - Pâtisserie
        $patisserie3 = new Product;
        $patisserie3->setName("Bûcheron")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-bucheron-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie3->getName())));

        $imagePatisserie3 = new Image();
        $imagePatisserie3->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-bucheron-2.jpg")
            ->setProduct($patisserie3);
        $manager->persist($imagePatisserie3);

        $manager->persist($patisserie3);

        // Article - Pâtisserie
        $patisserie4 = new Product;
        $patisserie4->setName("Fôret Noire")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-foret-noire-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie4->getName())));

        $imagePatisserie4 = new Image();
        $imagePatisserie4->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-foret-noire-2.jpg")
            ->setProduct($patisserie4);
        $manager->persist($imagePatisserie4);

        $imagePatisserie41 = new Image();
        $imagePatisserie41->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-foret-noire-3.jpg")
            ->setProduct($patisserie4);
        $manager->persist($imagePatisserie41);

        $manager->persist($patisserie4);

        // Article - Pâtisserie
        $patisserie5 = new Product;
        $patisserie5->setName("Fraisier")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-fraisier-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie5->getName())));

        $imagePatisserie5 = new Image();
        $imagePatisserie5->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-fraisier-2.jpg")
            ->setProduct($patisserie5);
        $manager->persist($imagePatisserie5);

        $manager->persist($patisserie5);

        // Article - Pâtisserie
        $patisserie6 = new Product;
        $patisserie6->setName("Framboisier")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-framboisier-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie6->getName())));

        $imagePatisserie6 = new Image();
        $imagePatisserie6->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-framboisier-2.jpg")
            ->setProduct($patisserie6);
        $manager->persist($imagePatisserie6);

        $manager->persist($patisserie6);

        // Article - Pâtisserie
        $patisserie7 = new Product;
        $patisserie7->setName("Multifruits")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-multifruits-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie7->getName())));

        $imagePatisserie7 = new Image();
        $imagePatisserie7->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-multifruits-2.jpg")
            ->setProduct($patisserie7);
        $manager->persist($imagePatisserie7);

        $manager->persist($patisserie7);

        // Article - Pâtisserie
        $patisserie8 = new Product;
        $patisserie8->setName("Paris-Brest")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-paris-brest-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie8->getName())));

        $imagePatisserie8 = new Image();
        $imagePatisserie8->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-paris-brest-2.jpg")
            ->setProduct($patisserie8);
        $manager->persist($imagePatisserie8);

        $manager->persist($patisserie8);

        // Article - Pâtisserie
        $patisserie9 = new Product;
        $patisserie9->setName("Tarte Caramel Beurre Salé")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-caramel-beurre-sale-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie9->getName())));

        $imagePatisserie9 = new Image();
        $imagePatisserie9->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-caramel-beurre-sale-2.jpg")
            ->setProduct($patisserie9);
        $manager->persist($imagePatisserie9);

        $manager->persist($patisserie9);

        // Article - Pâtisserie
        $patisserie10 = new Product;
        $patisserie10->setName("Tarte Citron Meringuée")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-citron-meringuee-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie10->getName())));

        $imagePatisserie10 = new Image();
        $imagePatisserie10->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-citron-meringuee-2.jpg")
            ->setProduct($patisserie10);
        $manager->persist($imagePatisserie10);

        $manager->persist($patisserie10);

        // Article - Pâtisserie
        $patisserie11 = new Product;
        $patisserie11->setName("Tarte aux fraises")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-fraise-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie11->getName())));

        $imagePatisserie11 = new Image();
        $imagePatisserie11->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-fraise-2.jpg")
            ->setProduct($patisserie11);
        $manager->persist($imagePatisserie11);

        $manager->persist($patisserie11);

        // Article - Pâtisserie
        $patisserie12 = new Product;
        $patisserie12->setName("Tarte aux framboises")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-framboise-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie12->getName())));

        $imagePatisserie12 = new Image();
        $imagePatisserie12->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-tarte-framboise-2.jpg")
            ->setProduct($patisserie12);
        $manager->persist($imagePatisserie12);

        $manager->persist($patisserie12);

        // Article - Pâtisserie
        $patisserie13 = new Product;
        $patisserie13->setName("Entremet Chocolat Noisette")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("Génoise chocolat, croustillant praliné noisette, mousse chocolat noir, glaçage cacaoté parsemé d'éclats de spéculoos")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-chocolat-noisette-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie13->getName())));

        $imagePatisserie131 = new Image();
        $imagePatisserie131->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-chocolat-noisette-2.jpg")
            ->setProduct($patisserie13);
        $manager->persist($imagePatisserie131);

        $imagePatisserie132 = new Image();
        $imagePatisserie132->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-chocolat-noisette-3.jpg")
            ->setProduct($patisserie13);
        $manager->persist($imagePatisserie132);

        $manager->persist($patisserie13);

        // Article - Pâtisserie
        $patisserie18 = new Product;
        $patisserie18->setName("Saint-Honoré")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-saint-honore-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie18->getName())));

        $imagePatisserie18 = new Image();
        $imagePatisserie18->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-saint-honore-2.jpg")
            ->setProduct($patisserie18);
        $manager->persist($imagePatisserie18);

        $manager->persist($patisserie18);

        // Article - Pâtisserie
        $patisserie14 = new Product;
        $patisserie14->setName("Saint-Rémi")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-saint-remi-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie14->getName())));

        $imagePatisserie14 = new Image();
        $imagePatisserie14->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-saint-remi-2.jpg")
            ->setProduct($patisserie14);
        $manager->persist($imagePatisserie14);

        $manager->persist($patisserie14);

        // Article - Pâtisserie
        $patisserie15 = new Product;
        $patisserie15->setName("Éclair à la vanille")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-eclair-vanille-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie15->getName())));

        $imagePatisserie15 = new Image();
        $imagePatisserie15->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-eclair-vanille-2.jpg")
            ->setProduct($patisserie15);
        $manager->persist($imagePatisserie15);

        $manager->persist($patisserie15);

        // Article - Pâtisserie
        $patisserie16 = new Product;
        $patisserie16->setName("Éclair au chocolat")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-eclair-chocolat-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie16->getName())));

        $imagePatisserie16 = new Image();
        $imagePatisserie16->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-eclair-chocolat-2.jpg")
            ->setProduct($patisserie16);
        $manager->persist($imagePatisserie16);

        $manager->persist($patisserie16);

        // Article - Pâtisserie
        $patisserie17 = new Product;
        $patisserie17->setName("Éclair au café")
            ->setPrice(0)
            ->setCategory($patisseries)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/patisseries-eclair-cafe-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($patisserie17->getName())));

        $imagePatisserie17 = new Image();
        $imagePatisserie17->setUrl("https://www.ganacheetcabosse.com/build/images/patisseries-eclair-cafe-2.jpg")
            ->setProduct($patisserie17);
        $manager->persist($imagePatisserie17);

        $manager->persist($patisserie17);

        // Article - Macaron
        $macaron1 = new Product;
        $macaron1->setName("Macaron Fraise")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-fraise-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron1->getName())));

        $imageMacaron1 = new Image();
        $imageMacaron1->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-fraise-2.jpg")
            ->setProduct($macaron1);
        $manager->persist($imageMacaron1);

        $manager->persist($macaron1);

        // Article - Macaron
        $macaron2 = new Product;
        $macaron2->setName("Macaron Café")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-cafe-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron2->getName())));

        $imageMacaron2 = new Image();
        $imageMacaron2->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-cafe-2.jpg")
            ->setProduct($macaron2);
        $manager->persist($imageMacaron2);

        $manager->persist($macaron2);

        // Article - Macaron
        $macaron3 = new Product;
        $macaron3->setName("Macaron Caramel")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-caramel-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron3->getName())));

        $imageMacaron3 = new Image();
        $imageMacaron3->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-caramel-2.jpg")
            ->setProduct($macaron3);
        $manager->persist($imageMacaron3);

        $manager->persist($macaron3);

        // Article - Macaron
        $macaron4 = new Product;
        $macaron4->setName("Macaron Chocolat")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-chocolat-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron4->getName())));

        $imageMacaron4 = new Image();
        $imageMacaron4->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-chocolat-2.jpg")
            ->setProduct($macaron4);
        $manager->persist($imageMacaron4);

        $manager->persist($macaron4);

        // Article - Macaron
        $macaron5 = new Product;
        $macaron5->setName("Macaron Citron")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-citron-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron5->getName())));

        $imageMacaron5 = new Image();
        $imageMacaron5->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-citron-2.jpg")
            ->setProduct($macaron5);
        $manager->persist($imageMacaron5);

        $manager->persist($macaron5);

        // Article - Macaron
        $macaron6 = new Product;
        $macaron6->setName("Macaron Framboise")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-framboise-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron6->getName())));

        $imageMacaron6 = new Image();
        $imageMacaron6->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-framboise-2.jpg")
            ->setProduct($macaron6);
        $manager->persist($imageMacaron6);

        $manager->persist($macaron6);

        // Article - Macaron
        $macaron7 = new Product;
        $macaron7->setName("Macaron Pistache")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-pistache-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron7->getName())));

        $imageMacaron7 = new Image();
        $imageMacaron7->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-pistache-2.jpg")
            ->setProduct($macaron7);
        $manager->persist($imageMacaron7);

        $manager->persist($macaron7);

        // Article - Macaron
        $macaron8 = new Product;
        $macaron8->setName("Macaron Vanille")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-macaron-vanille-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron8->getName())));

        $imageMacaron8 = new Image();
        $imageMacaron8->setUrl("https://www.ganacheetcabosse.com/build/images/macarons-macaron-vanille-2.jpg")
            ->setProduct($macaron8);
        $manager->persist($imageMacaron8);

        $manager->persist($macaron8);

        // Article - Macaron
        $macaron9 = new Product;
        $macaron9->setName("Boîte de 8 Macarons")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-coffret-8-macarons.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron9->getName())));

        $manager->persist($macaron9);

        // Article - Macaron
        $macaron10 = new Product;
        $macaron10->setName("Boîte de 16 Macarons")
            ->setPrice(0)
            ->setCategory($macarons)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/macarons-coffret-16-macarons.jpg")
            ->setSlug(strtolower($this->slugger->slug($macaron10->getName())));

        $manager->persist($macaron10);

        // Article - Bonbons de chocolat
        $bonbonChocolat1 = new Product;
        $bonbonChocolat1->setName("Rectangle Rayé")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Praliné amande et noix de coco")
            ->setMentions("Lait, soja, fruits à coque. Présence possible de : gluten, oeuf")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-raye-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat1->getName())));

        $imageBonbonChocolat1 = new Image();
        $imageBonbonChocolat1->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-raye-2.jpg")
            ->setProduct($bonbonChocolat1);
        $manager->persist($imageBonbonChocolat1);

        $manager->persist($bonbonChocolat1);

        // Article - Bonbons de chocolat
        $bonbonChocolat2 = new Product;
        $bonbonChocolat2->setName("Rond Uni")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Praliné amande noisette, grué de cacao")
            ->setMentions("Lait, soja, fruits à coque. Présence possible de : gluten, oeuf")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rond-uni-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat2->getName())));

        $imageBonbonChocolat2 = new Image();
        $imageBonbonChocolat2->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rond-uni-2.jpg")
            ->setProduct($bonbonChocolat2);
        $manager->persist($imageBonbonChocolat2);

        $manager->persist($bonbonChocolat2);

        // Article - Bonbons de chocolat
        $bonbonChocolat3 = new Product;
        $bonbonChocolat3->setName("Rectangle Contour")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Praliné amande, amande entière")
            ->setMentions("Lait, soja, fruits à coque. Présence possible de : gluten, oeuf")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-contour-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat3->getName())));

        $imageBonbonChocolat3 = new Image();
        $imageBonbonChocolat3->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-contour-2.jpg")
            ->setProduct($bonbonChocolat3);
        $manager->persist($imageBonbonChocolat3);

        $manager->persist($bonbonChocolat3);

        // Article - Bonbons de chocolat
        $bonbonChocolat4 = new Product;
        $bonbonChocolat4->setName("Sanglier")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Pâte de noisettes")
            ->setMentions("Lait, soja, fruits à coque")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-sanglier-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat4->getName())));

        $imageBonbonChocolat4 = new Image();
        $imageBonbonChocolat4->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-sanglier-2.jpg")
            ->setProduct($bonbonChocolat4);
        $manager->persist($imageBonbonChocolat4);

        $manager->persist($bonbonChocolat4);

        // Article - Bonbons de chocolat
        $bonbonChocolat5 = new Product;
        $bonbonChocolat5->setName("Rectangle Uni")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Pâte de cacahuètes")
            ->setMentions("Lait, soja, arachides. Présence possible de : fruits à coque")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-uni-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat5->getName())));

        $imageBonbonChocolat5 = new Image();
        $imageBonbonChocolat5->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-uni-2.jpg")
            ->setProduct($bonbonChocolat5);
        $manager->persist($imageBonbonChocolat5);

        $manager->persist($bonbonChocolat5);

        // Article - Bonbons de chocolat
        $bonbonChocolat6 = new Product;
        $bonbonChocolat6->setName("Rond Cerclé")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Praliné pécan")
            ->setMentions("Lait, soja, fruits à coque. Présence possible de : gluten, oeuf")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rond-cercle-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat6->getName())));

        $imageBonbonChocolat6 = new Image();
        $imageBonbonChocolat6->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rond-cercle-2.jpg")
            ->setProduct($bonbonChocolat6);
        $manager->persist($imageBonbonChocolat6);

        $manager->persist($bonbonChocolat6);

        // Article - Bonbons de chocolat
        $bonbonChocolat7 = new Product;
        $bonbonChocolat7->setName("Carré Contour")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Praliné pistache")
            ->setMentions("Lait, soja, fruits à coque. Présence possible de : gluten, oeuf")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-carre-contour-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat7->getName())));

        $imageBonbonChocolat7 = new Image();
        $imageBonbonChocolat7->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-carre-contour-2.jpg")
            ->setProduct($bonbonChocolat7);
        $manager->persist($imageBonbonChocolat7);

        $manager->persist($bonbonChocolat7);

        // Article - Bonbons de chocolat
        $bonbonChocolat9 = new Product;
        $bonbonChocolat9->setName("Carré Uni")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Praliné noisette, noisettes grillées hachées")
            ->setMentions("Lait, soja, fruits à coque")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-carre-uni-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat9->getName())));

        $imageBonbonChocolat9 = new Image();
        $imageBonbonChocolat9->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-carre-uni-2.jpg")
            ->setProduct($bonbonChocolat9);
        $manager->persist($imageBonbonChocolat9);

        $manager->persist($bonbonChocolat9);

        // Article - Bonbons de chocolat
        $bonbonChocolat10 = new Product;
        $bonbonChocolat10->setName("Rectangle Multi Reliefs")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Pâte de noisettes, crèpe dentelle")
            ->setMentions("Lait, soja, gluten, fruits à coque")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-multi-reliefs-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat10->getName())));

        $imageBonbonChocolat10 = new Image();
        $imageBonbonChocolat10->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rectangle-multi-reliefs-2.jpg")
            ->setProduct($bonbonChocolat10);
        $manager->persist($imageBonbonChocolat10);

        $manager->persist($bonbonChocolat10);

        // Article - Bonbons de chocolat
        $bonbonChocolat11 = new Product;
        $bonbonChocolat11->setName("Rond Rayé")
            ->setPrice(0)
            ->setCategory($bonbonsChocolat)
            ->setDetails("Chocolat noir de couverture (61% de cacao minimum, pur beurre de cacao) / Chocolat de couverture au lait (33% de cacao minimum, pur beurre de cacao) / Pâte d'amande")
            ->setMentions("Lait, soja, fruits à coque")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rond-raye-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($bonbonChocolat11->getName())));

        $imageBonbonChocolat11 = new Image();
        $imageBonbonChocolat11->setUrl("https://www.ganacheetcabosse.com/build/images/bonbons-chocolat-rond-raye-2.jpg")
            ->setProduct($bonbonChocolat11);
        $manager->persist($imageBonbonChocolat11);

        $manager->persist($bonbonChocolat11);

        // Article - Spécialité
        $specialiteChocolat1 = new Product;
        $specialiteChocolat1->setName("Boudins blancs")
            ->setPrice(0)
            ->setCategory($specialitesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/specialites-chocolat-boudins-chocolat-blanc-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($specialiteChocolat1->getName())));

        $manager->persist($specialiteChocolat1);

        // Article - Spécialité
        $specialiteChocolat2 = new Product;
        $specialiteChocolat2->setName("Ardoises ardennaises")
            ->setPrice(0)
            ->setCategory($specialitesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/specialites-chocolat-ardoises-ardennaises-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($specialiteChocolat2->getName())));

        $manager->persist($specialiteChocolat2);

        // Article - Spécialité
        $specialiteChocolat3 = new Product;
        $specialiteChocolat3->setName("Mendiants au chocolat noir")
            ->setPrice(0)
            ->setCategory($specialitesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/specialites-chocolat-mendiants-chocolat-noir-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($specialiteChocolat3->getName())));

        $manager->persist($specialiteChocolat3);

        // Article - Spécialité
        $specialiteChocolat4 = new Product;
        $specialiteChocolat4->setName("Mendiants au chocolat au lait")
            ->setPrice(0)
            ->setCategory($specialitesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/specialites-chocolat-mendiants-chocolat-lait-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($specialiteChocolat4->getName())));

        $manager->persist($specialiteChocolat4);

        // Article - Spécialité
        $specialiteChocolat5 = new Product;
        $specialiteChocolat5->setName("Orangettes")
            ->setPrice(0)
            ->setCategory($specialitesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/specialites-chocolat-orangettes-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($specialiteChocolat5->getName())));

        $manager->persist($specialiteChocolat5);

        // Article - Tablette de chocolat
        $tabletteChocolat1 = new Product;
        $tabletteChocolat1->setName("Tablette de chocolat noir")
            ->setPrice(0)
            ->setCategory($tablettesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/tablettes-tablette-chocolat-noir-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($tabletteChocolat1->getName())));

        $manager->persist($tabletteChocolat1);

        // Article - Tablette de chocolat
        $tabletteChocolat2 = new Product;
        $tabletteChocolat2->setName("Tablette de chocolat au lait")
            ->setPrice(0)
            ->setCategory($tablettesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/tablettes-tablette-chocolat-lait-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($tabletteChocolat2->getName())));

        $manager->persist($tabletteChocolat2);

        // Article - Tablette de chocolat
        $tabletteChocolat3 = new Product;
        $tabletteChocolat3->setName("Tablette de chocolat blanc")
            ->setPrice(0)
            ->setCategory($tablettesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/tablettes-tablette-chocolat-blanc-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($tabletteChocolat3->getName())));

        $manager->persist($tabletteChocolat3);

        // Article - Tablette de chocolat
        $tabletteChocolat4 = new Product;
        $tabletteChocolat4->setName("Tablette de chocolat noir sans sucres")
            ->setPrice(0)
            ->setCategory($tablettesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/tablettes-tablette-chocolat-noir-sans-sucres-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($tabletteChocolat4->getName())));

        $manager->persist($tabletteChocolat4);

        // Article - Moulages
        $moulageChocolat1 = new Product;
        $moulageChocolat1->setName("Sucette au chocolat noir")
            ->setPrice(0)
            ->setCategory($moulagesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/moulages-sucette-chocolat-noir-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($moulageChocolat1->getName())));

        $imageMoulageChocolat1 = new Image();
        $imageMoulageChocolat1->setUrl("https://www.ganacheetcabosse.com/build/images/moulages-sucette-chocolat-noir-2.jpg")
            ->setProduct($moulageChocolat1);
        $manager->persist($imageMoulageChocolat1);

        $manager->persist($moulageChocolat1);

        // Article - Moulages
        $moulageChocolat2 = new Product;
        $moulageChocolat2->setName("Sucette au chocolat au lait")
            ->setPrice(0)
            ->setCategory($moulagesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/moulages-sucette-chocolat-lait-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($moulageChocolat2->getName())));

        $imageMoulageChocolat2 = new Image();
        $imageMoulageChocolat2->setUrl("https://www.ganacheetcabosse.com/build/images/moulages-sucette-chocolat-lait-2.jpg")
            ->setProduct($moulageChocolat2);
        $manager->persist($imageMoulageChocolat2);

        $manager->persist($moulageChocolat2);

        // Article - Moulages
        $moulageChocolat3 = new Product;
        $moulageChocolat3->setName("Sucette au chocolat blanc")
            ->setPrice(0)
            ->setCategory($moulagesChocolat)
            ->setDetails("")
            ->setMainPicture("https://www.ganacheetcabosse.com/build/images/moulages-sucette-chocolat-blanc-1.jpg")
            ->setSlug(strtolower($this->slugger->slug($moulageChocolat3->getName())));

        $imageMoulageChocolat3 = new Image();
        $imageMoulageChocolat3->setUrl("https://www.ganacheetcabosse.com/build/images/moulages-sucette-chocolat-blanc-2.jpg")
            ->setProduct($moulageChocolat3);
        $manager->persist($imageMoulageChocolat3);

        $manager->persist($moulageChocolat3);

        $manager->flush();
    }
}
