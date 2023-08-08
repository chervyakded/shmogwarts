<?php

namespace App\Controller;

use App\Entity\WandRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/wand_records", name="api_wand_records")
 */
class WandRecordController extends AbstractController
{
    /**
     * @Route("/wand_records", methods={"GET"})
     */
    public function index(): Response
    {
        $wandRecords = $this->getDoctrine()->getRepository(WandRecord::class)->findAll();

        return $this->json($wandRecords);
    }

    /**
     * @Route("/wand_records/{id}", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $wandRecord = $this->getDoctrine()->getRepository(WandRecord::class)->find($id);

        if (!$wandRecord) {
            return $this->json(['error' => 'Wand record not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($wandRecord);
    }

//    /**
//     * @Route("/wand_records", methods={"POST"})
//     */
//    public function create(Request $request): Response
//    {
//        $data = json_decode($request->getContent(), true);
//
//        $wandRecord = new WandRecord();
//        $wandRecord->setName($data['name']);
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->persist($wandRecord);
//        $entityManager->flush();
//
//        return $this->json($wandRecord, Response::HTTP_CREATED);
//    }
}
