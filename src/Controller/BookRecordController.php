<?php

namespace App\Controller;

use App\Entity\BookRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/book_records", name="api_book_records")
 */
class BookRecordController extends AbstractController
{
    /**
     * @Route("/book_records", methods={"GET"})
     */
    public function index(): Response
    {
        $bookRecords = $this->getDoctrine()->getRepository(BookRecord::class)->findAll();

        return $this->json($bookRecords);
    }

    /**
     * @Route("/book_records/{id}", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $bookRecord = $this->getDoctrine()->getRepository(BookRecord::class)->find($id);

        if (!$bookRecord) {
            return $this->json(['error' => 'Book record not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($bookRecord);
    }

//    /**
//     * @Route("/book_records", methods={"POST"})
//     */
//    public function create(Request $request): Response
//    {
//        $data = json_decode($request->getContent(), true);
//
//        $bookRecord = new BookRecord();
//        $bookRecord->setName($data['name']);
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->persist($bookRecord);
//        $entityManager->flush();
//
//        return $this->json($bookRecord, Response::HTTP_CREATED);
//    }
}
