<?php

namespace App\Controller;

use App\Entity\SchoolTimetable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/school_timetables", name="api_school_timetables")
 */
class SchoolTimetableController extends AbstractController
{
    /**
     * @Route("/school_timetables", methods={"GET"})
     */
    public function index(): Response
    {
        $schoolTimetables = $this->getDoctrine()->getRepository(SchoolTimetable::class)->findAll();

        return $this->json($schoolTimetables);
    }

    /**
     * @Route("/school_timetables/{id}", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $schoolTimetable = $this->getDoctrine()->getRepository(SchoolTimetable::class)->find($id);

        if (!$schoolTimetable) {
            return $this->json(['message' => 'School timetable not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($schoolTimetable);
    }

    /**
     * @Route("/school_timetables", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $schoolTimetable = new SchoolTimetable();
        $schoolTimetable->setName($data['name']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($schoolTimetable);
        $entityManager->flush();

        return $this->json($schoolTimetable, Response::HTTP_CREATED);
    }
}
