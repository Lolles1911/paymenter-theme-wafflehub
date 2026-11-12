<?php

/*
 * WaffleHub - a Paymenter theme.
 *
 * Built on top of Paymenter's default theme: every page that is not in
 * views/ here comes from themes/default, so Paymenter updates keep working.
 *
 * Colours are HSL. The admin colour pickers save them as "hsl(h, s%, l%)".
 */

return [
    'name' => 'WaffleHub',
    'author' => 'WaffleHub',
    'url' => 'https://wafflehub.net',

    'settings' => [
        // --- Front page -----------------------------------------------------
        [
            'name' => 'hero_badge',
            'label' => 'Front page: small label above the headline',
            'type' => 'text',
            'default' => '',
            'description' => 'Empty = the default text in the visitor\'s language.',
        ],
        [
            'name' => 'hero_title',
            'label' => 'Front page: headline',
            'type' => 'text',
            'default' => '',
            'description' => 'Empty = "Welcome to <shop name>" in the visitor\'s language.',
        ],
        [
            'name' => 'home_page_text',
            'label' => 'Front page: text under the headline (Markdown)',
            'type' => 'markdown',
            'default' => '',
            'description' => 'Empty = the default text in the visitor\'s language.',
        ],
        [
            'name' => 'hero_button',
            'label' => 'Front page: button text',
            'type' => 'text',
            'default' => '',
            'description' => 'Empty = the default text in the visitor\'s language.',
        ],
        [
            'name' => 'show_steps',
            'label' => 'Front page: show "How to get started"',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
        ],

        // --- Same options as the default theme -----------------------------
        [
            'name' => 'direct_checkout',
            'label' => 'Direct Checkout',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
            'description' => 'Don\'t show the product overview page, go directly to the checkout page',
        ],
        [
            'name' => 'small_images',
            'label' => 'Small Images',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
            'description' => 'Show small images in the product overview page',
        ],
        [
            'name' => 'show_category_description',
            'label' => 'Show Category Description',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
            'description' => 'Show the category description in the product overview page/homepage',
        ],
        [
            'name' => 'logo_display',
            'label' => 'Logo display',
            'type' => 'select',
            'options' => [
                'logo-only' => 'Logo only',
                'logo-and-name' => 'Logo and Name',
            ],
            'default' => 'logo-and-name',
        ],

        // --- Colours: light mode -------------------------------------------
        ['name' => 'primary', 'label' => 'Primary - Brand Color (Light)', 'type' => 'color', 'default' => 'hsl(26, 85%, 37%)'],
        ['name' => 'on-primary', 'label' => 'Text on Primary (Light)', 'type' => 'color', 'default' => 'hsl(0, 0%, 100%)'],
        ['name' => 'secondary', 'label' => 'Secondary - Accent Color (Light)', 'type' => 'color', 'default' => 'hsl(40, 92%, 50%)'],
        ['name' => 'neutral', 'label' => 'Borders, Accents... (Light)', 'type' => 'color', 'default' => 'hsl(35, 35%, 86%)'],
        ['name' => 'base', 'label' => 'Base - Text Color (Light)', 'type' => 'color', 'default' => 'hsl(24, 35%, 12%)'],
        ['name' => 'muted', 'label' => 'Muted - Text Color (Light)', 'type' => 'color', 'default' => 'hsl(25, 12%, 40%)'],
        ['name' => 'inverted', 'label' => 'Inverted - Text Color (Light)', 'type' => 'color', 'default' => 'hsl(40, 60%, 98%)'],
        ['name' => 'background', 'label' => 'Background - Color (Light)', 'type' => 'color', 'default' => 'hsl(40, 60%, 98%)'],
        ['name' => 'background-secondary', 'label' => 'Background - Secondary Color (Light)', 'type' => 'color', 'default' => 'hsl(38, 50%, 95%)'],

        // --- Colours: dark mode --------------------------------------------
        ['name' => 'dark-primary', 'label' => 'Primary - Brand Color (Dark)', 'type' => 'color', 'default' => 'hsl(38, 92%, 56%)'],
        ['name' => 'dark-on-primary', 'label' => 'Text on Primary (Dark)', 'type' => 'color', 'default' => 'hsl(24, 40%, 9%)'],
        ['name' => 'dark-secondary', 'label' => 'Secondary - Accent Color (Dark)', 'type' => 'color', 'default' => 'hsl(28, 85%, 52%)'],
        ['name' => 'dark-neutral', 'label' => 'Borders, Accents... (Dark)', 'type' => 'color', 'default' => 'hsl(25, 14%, 19%)'],
        ['name' => 'dark-base', 'label' => 'Base - Text Color (Dark)', 'type' => 'color', 'default' => 'hsl(38, 40%, 94%)'],
        ['name' => 'dark-muted', 'label' => 'Muted - Text Color (Dark)', 'type' => 'color', 'default' => 'hsl(30, 10%, 62%)'],
        ['name' => 'dark-inverted', 'label' => 'Inverted - Text Color (Dark)', 'type' => 'color', 'default' => 'hsl(24, 20%, 8%)'],
        ['name' => 'dark-background', 'label' => 'Background - Color (Dark)', 'type' => 'color', 'default' => 'hsl(24, 18%, 7%)'],
        ['name' => 'dark-background-secondary', 'label' => 'Background - Secondary Color (Dark)', 'type' => 'color', 'default' => 'hsl(24, 15%, 10%)'],
    ],
];
