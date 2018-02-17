<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 04-09-17
 * Time: 11:41
 */

namespace TB\MainBundle\DateFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TB\MainBundle\Entity\Category;

class LoadCategories implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $Catlist = [
            "Action",
            "Aventure",
            "Simulation",
            "FPS",
            "RTS",
            "Sport",
            "Platforme"
        ];
        foreach ($Catlist as $cat)
        {
            $c = new Category();
            $c->setCategoryName($cat);
            $manager->persist($c);
        }
        $manager->flush();

    }
}