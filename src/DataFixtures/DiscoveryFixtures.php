<?php

namespace App\DataFixtures;

use App\Entity\Discovery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

class DiscoveryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$faker = Faker::create();

    	// création de plusieurs produits
	    for($i = 0; $i < 50; $i++) {
	    	// instanciation d'une entité
		    $discovery = new Discovery();
		    $discovery->setName( $faker->sentence(3) );
		    $discovery->setDescription( $faker->text(200) );
		    $discovery->setImage('default.jpg');
			$randomContinent = random_int(0,4);
			$continent = $this->getReference("continent$randomContinent");
			$discovery->setContinent($continent);
		    // doctrine : méthode persist permet de créer un enregistrement (INSERT INTO)
		    $manager->persist($discovery);
	    }

	    // doctrine : méthode flush permet d'exécuter les requêtes SQL (à exécuter une seule fois)
        $manager->flush();
    }
}