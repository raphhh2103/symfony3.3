<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 04-09-17
 * Time: 11:56
 */

namespace TB\MainBundle\DateFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TB\MainBundle\Entity\Picture;
use TB\MainBundle\Entity\User;

class LoadUsers implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $image_admin = new Picture();
        $image_admin->setPictureURL("asset/image/imageDefault.jpg");
        $admin = new User();
        $admin
            ->setUserLastName("admin")
            ->setUserFirstName("admin")
            ->setUserPassword("admin")
            ->setUserEmail("admin@admin.admin")
            ->setUserRoles(["ROLE_ADMIN"])
            ->setUserSalt(uniqid())
            ->setPhoto($image_admin)
        ;

        $image_user = new Picture();
        $image_user->setPictureURL("asset/image/imageDefault.jpg");
        $user = new User();
        $user
            ->setUserLastName("user")
            ->setUserFirstName("user")
            ->setUserPassword("user")
            ->setUserEmail("user@user.user")
            ->setUserRoles(["ROLE_USER"])
            ->setUserSalt(uniqid())
            ->setPhoto($image_user)
        ;

        $manager->persist($admin);
        $manager->persist($user);
        $manager->flush();
    }
}