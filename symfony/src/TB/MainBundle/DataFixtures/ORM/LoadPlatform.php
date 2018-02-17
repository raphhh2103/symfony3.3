<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 04-09-17
 * Time: 13:29
 */

namespace TB\MainBundle\DateFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TB\MainBundle\Entity\Platform;

class LoadPlatform implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {


        $Platlist = [
            "XBOX ONE",
            "XBOX 360",
            "PLAYSTATION 4",
            "PLAYSTATION 3",
            "NINTENDO SWITCH",
            "PC",
            "MAC",
            "NINTENDO 3DS"

        ];
        foreach ($Platlist as $plat)
        {
            $c = new Platform();
            $c->setPlatformName($plat);
            $manager->persist($c);
        }
        $manager->flush();


    }
}