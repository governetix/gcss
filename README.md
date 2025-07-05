# GCSS - Governetix CSS

GCSS is a UI/Design System for Laravel 12 that provides a set of reusable, customizable, and role-based UI/UX components.

## Installation

1.  Require the package via Composer:

    ```bash
    composer require governetix/gcss
    ```

2.  Publish the package assets:

    ```bash
    php artisan vendor:publish --provider="Governetix\Gcss\GcssServiceProvider" --tag=gcss-all
    ```

3.  Include the package's CSS and JS in your main layout file:

    ```html
    <head>
        ...
        <link rel="stylesheet" href="{{ asset('vendor/gcss/css/gcss.css') }}">
        ...
    </head>
    <body>
        ...
        <script src="{{ asset('vendor/gcss/js/gcss.js') }}"></script>
    </body>
    ```

## Usage

### Components

GCSS provides a variety of Blade components that you can use in your views. Here are a few examples:

**Button:**

```html
<x-gcss-button type="primary" size="lg" icon="fas fa-save">
    Save
</x-gcss-button>
```

**Card:**

```html
<x-gcss-card>
    <x-slot name="title">Card Title</x-slot>
    <p>Card content goes here.</p>
</x-gcss-card>
```

**Alert:**

```html
<x-gcss-alert type="success" message="This is a success message." />
```

### Admin Dashboard

GCSS comes with an admin dashboard where you can customize the look and feel of the components. To access the dashboard, visit `/gcss/admin/styles`.

**Note:** The admin dashboard is protected by the `manage-gcss-settings` gate. You can define this gate in your `AuthServiceProvider` to control access.

## Extending and Overriding

You can extend or override the components, views, and translations by publishing the package assets and modifying the files in your application's `resources` directory.
