<?php

namespace Drupal\events_management\Entity;

use Drupal\Core\Entity\Annotation\ContentEntityType;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Event entity.
 *
 * @ContentEntityType(
 *   id = "event",
 *   label = @Translation("Event"),
 *   base_table = "events",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "title"
 *   }
 * )
 */
class Event extends ContentEntityBase
{

    public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array
    {
        $fields = parent::baseFieldDefinitions($entity_type);

        $fields['title'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Title'))
            ->setRequired(true);

        $fields['description'] = BaseFieldDefinition::create('text_long')
            ->setLabel(t('Description'));

        $fields['start_time'] = BaseFieldDefinition::create('datetime')
            ->setLabel(t('Start Time'))
            ->setRequired(true);

        $fields['end_time'] = BaseFieldDefinition::create('datetime')
            ->setLabel(t('End Time'))
            ->setRequired(true);

        $fields['category'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Category'));

        return $fields;
    }
}
