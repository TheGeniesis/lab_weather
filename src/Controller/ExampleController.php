<?php

namespace App\Controller;

use App\Entity\Example;
use App\Repository\ExampleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ExampleController extends AbstractController
{
    /**
     * @Route("/example", name="api_get_example", methods={"GET"})
     */
    public function getExample(ExampleRepository $exampleRepository): Response
    {
            $result = $exampleRepository->findAll();

        $normalizers = [new ObjectNormalizer()];
        $encoders = [new XmlEncoder(), new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($result, 'json');

        return new Response($jsonContent, Response::HTTP_OK);
    }

    /**
     * @Route("/example", name="api_post_example", methods={"POST"})
     */
    public function postExample(EntityManagerInterface $entityManager): Response
    {
        for ($i = 0; $i < rand(1, 3); $i++) {
            $example = new Example();
            $example->setHumility(30);
            $example->setTemp(30);
            $example->setRainfall(1000);
            $example->setWindDirection("NE");
            $entityManager->persist($example);
        }
        $entityManager->flush();

        return new Response('', Response::HTTP_CREATED);
    }
}
