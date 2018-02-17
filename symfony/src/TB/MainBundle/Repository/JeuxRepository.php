<?php

namespace TB\MainBundle\Repository;

/**
 * JeuxRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JeuxRepository extends \Doctrine\ORM\EntityRepository
{
    public function findGameWhithDetails($id)
    {
        $qb = $this->createQueryBuilder("game")
            ->join("game.category", "category")
            ->leftJoin("game.pictures", "pictures")
            ->leftJoin("game.gamePlatforms", "gamePlatforms")
            ->leftJoin("gamePlatforms.platform", "platform")
            ->where("game.id = :id")
            ->setParameter(":id", $id)
            ->select("game")
            ->addSelect("category")
            ->addSelect("pictures")
            ->addSelect("gamePlatforms")
            ->addSelect("platform");
        return $qb->getQuery()->getOneOrNullResult();
    }
}