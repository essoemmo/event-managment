<?php

namespace Drupal\events_management\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Database\Database;

/**
 * Provides a 'Latest Events' block.
 *
 * @Block(
 *   id = "latest_events_block",
 *   admin_label = @Translation("Latest Events")
 * )
 */
class LatestEventsBlock extends BlockBase
{

    /**
     * {@inheritdoc}
     */
    public function build(): array
    {
        // Fetch the latest 5 events.
        $connection = Database::getConnection();
        $query = $connection->select('events', 'e')
            ->fields('e', ['title', 'start_time'])
            ->range(0, 5)
            ->orderBy('start_time', 'DESC');
        $results = $query->execute()->fetchAll();

        // Prepare event items to display in the block.
        $items = [];
        foreach ($results as $event) {
            $items[] = [
                '#markup' => $event->title . ' - ' . date('Y-m-d H:i', strtotime($event->start_time)),
            ];
        }

        return [
            '#theme' => 'item_list',
            '#items' => $items,
            '#title' => $this->t('Latest Events'),
        ];
    }
}
