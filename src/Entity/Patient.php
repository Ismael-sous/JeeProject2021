<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Patient
 * @Entity
 * @ORM\Table(name="patients")
 * @package App\Entity
 */


Class Patient
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     *
     */
    public int $id;

    /**
     * @var string
     * @ORM\Column (name="name", type="string")
     *
     */
    public string $name;

    /**
     * @var integer
     * @ORM\Column(name="resultat_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public int $promo_id;

    /**
     * @var Resultat $resultat
     * @ORM\ManyToOne(targetEntity="App\Entity\Resultat", fetch="EAGER")
     */
    public Resultat $resultat;


    /**
     * @param string $name
     * @param Resultat|null $resultat
     */
    public function __construct (string $name, ?Resultat $resultat = null){
        $this->name=$name;
        $this->resultat = $resultat;
       // $this -> id = $id;
        }


    public function getNameE(): string
    {
        return $this->name;}

    public function __toString() {
        return $this->name;
    }
}