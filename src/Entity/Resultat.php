<?php

namespace App\Entity;

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * Class Resultat
 * @Entity
 * @ORM\Table(name="resultats")
 * @package App\Entity
 */


class Resultat
{

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     */
    public int $id;


    /**
     * @param string $intitule
     *
     * @ORM\Column(name="intitule", type="string")
     */
    public string $intitule;


    /**
     * @param integer $id
     * @param string $intitule
     */
    public function __construct ( string $intitule, int $id){
        $this->intitule = $intitule;
        $this->id = $id ;}

}