# event-managment

# Events Management Module for Drupal 10

## Overview

The Events Management module allows site administrators to manage and display events. Features include:
- CRUD operations for events (Create, Read, Update, Delete)
- A configuration page for managing display settings
- Custom block to display the latest events
- Listing and detail pages for events

## Code Structure

    src/Controller/: Contains controllers for event listing and details.
    src/Entity/: Defines the custom entity for storing event data.
    src/Form/: Includes forms for creating/editing events and configuring module settings.
    src/Plugin/Block/: Provides a block plugin for displaying the latest events.
    templates/: Contains Twig templates for custom display of events.
    config/install/: Default configuration values.
    config/schema/: Defines the configuration schema.
    events_management.info.yml: Module metadata.
    events_management.routing.yml: Defines routes for event pages.

## Requirements

- Drupal 10
- PHP >= 8.2
- MySQL >= 8.0

## Installation

1. git clone https://github.com/your-repo/events_management_module.git

2. install docker desktop

3. docker-compose up -d --build
