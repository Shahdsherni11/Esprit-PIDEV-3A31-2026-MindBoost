<?php namespace App\Repository;
use App\Entity\GeneralAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
class GeneralAnswerRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $r) { parent::__construct($r, GeneralAnswer::class); }
}
