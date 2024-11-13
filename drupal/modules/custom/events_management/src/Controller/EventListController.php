<?php

namespace Drupal\events_management\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

class EventListController extends ControllerBase
{

    public function listEvents(): array
    {
        $connection = Database::getConnection();
        $query = $connection->select('events', 'e')
            ->fields('e', ['title', 'description', 'start_time', 'end_time', 'category']);
        $results = $query->execute()->fetchAll();

        $events = [];
        foreach ($results as $event) {
            $events[] = [
                'title' => $event->title,
                'description' => $event->description,
                'start_time' => $event->start_time,
                'end_time' => $event->end_time,
                'category' => $event->category,
            ];
        }

        return [
            '#theme' => 'event_list',
            '#events' => $events,
        ];
    }

    public function eventDetails($event_id): array
    {
        $event = Database::getConnection()->select('events', 'e')
            ->fields('e')
            ->condition('id', $event_id)
            ->execute()
            ->fetch();

        return [
            '#theme' => 'item_list',
            '#items' => [
                'Title: ' . $event->title,
                'Description: ' . $event->description,
                'Category: ' . $event->category,
            ],
        ];
    }
}
