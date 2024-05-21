<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\Type\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{
    #[Route('/events', name: 'app_event')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository
            ->findAll();

        return $this->render('event/index.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('/event/add', name: 'create_event')]
    public function createEvent(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$event` variable has also been updated
            $event = $form->getData();

            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('show_event', [
                'id' => $event->getId()]
            );
        }

        return $this->render('event/add.html.twig', [
            'event' => $event,
            'form' => $form
        ]);
    }


    #[Route('/event/{id}', name: 'show_event')]
    public function show(EventRepository $eventRepository, int $id): Response
    {
        $event = $eventRepository
            ->find($id);

        return $this->render('event/details.html.twig', [
            'event' => $event,
        ]);
    }
}
