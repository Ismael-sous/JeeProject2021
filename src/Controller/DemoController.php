<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Resultat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Framework\RequestConfig;

class DemoController extends AbstractController
{

    #[Route(path: "/new")]
    public function demo(EntityManagerInterface $em)
    {
        $nbrPatient = $this->getDoctrine()->getrepository(Patient::class)->findAll();
        $positive = $em->getRepository(Resultat::class)->findOneBy(['intitule'=>'positive']);
        $negative = $em->getRepository(Resultat::class)->findOneBy(['intitule'=>'negative']);
        $toRedo = $em->getRepository(Resultat::class)->findOneBy(['intitule'=>'toRedo']);

        //$getName = $trucs->findOneBy(["name"=>"Juju"]);

        $etu4 = new Patient("testtt", $negative);

      //  $em->persist($etu3);
        $em->persist($etu4);
        $em->flush ();

        $etu = $em->getRepository(Patient::class)->findAll();
        dump($etu);
        dump($etu4);


        return new Response('Le patient '.$etu4. ' d\'identifiant '.$etu4->id. ' a été créé. Nombre de patient actuel: '.count($nbrPatient));
    }

        #[Route(path: "/patient")]

    public function premiereRoute(EntityManagerInterface $entityManager)
        {
            $liste = $entityManager ->getRepository(Patient::class)->findAll();
            return $this->render('etus.json.twig', ['liste'=>$liste]);
        }



    #[Route(path: "/patient/{id}", methods: ['GET'])]

    public function deuxiemeRoute(EntityManagerInterface $entityManager, int $id)
{
    $etu = $entityManager->getRepository(Patient::class)->find($id);
    //$r = '{"nom":$etu->name.,"id":"'.$etu->$id.'"}';
    return $this->render('etu.json.twig', ['patient'=>$etu]);
}

    #[Route(path: "/patient/{id}", methods: ['DELETE'])]

    public function troisièmeRoute(EntityManagerInterface $entityManager, int $id)
    {
        $etu = $entityManager->getRepository(Patient::class)->find($id);
        $entityManager->remove($etu);
        $entityManager->flush();
        return new Response('ok');
    }

    #[Route(path: "/patient/{id}", methods: ['PUT'])]

    public function quatrièmeRoute(Request $request, EntityManagerInterface $entityManager, int $id)
    {
        $data = json_decode($request->getContent());
        $etu = $entityManager->getRepository(Patient::class)->find($id);
        $etu->name = $data->name;
        $etu->resultat_id = $data->resultat_id;
        $entityManager->flush();
        //return new Response('ok');
        return $this->render('etu.json.twig', ['patient'=>$etu]);
    }



}