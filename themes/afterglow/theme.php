<?php

/*
 * Afterglow - a neon Paymenter theme. Dark only.
 *
 * Built on top of Paymenter's default theme: every page that is not in
 * views/ here comes from themes/default, so Paymenter updates keep working.
 * The default pages get the neon look from css/app.css.
 *
 * Colours are HSL. The admin colour pickers save them as "hsl(h, s%, l%)".
 */

return [
    'name' => 'Afterglow',
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
            'description' => 'Empty = "Welcome to <shop name>" in the visitor\'s language. The shop\'s name glows.',
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
        [
            'name' => 'motion',
            'label' => 'Animated glow',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
            'description' => 'The slowly moving light behind the pages. Always off for visitors who ask their device for less motion.',
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

        // --- Colours (dark only) -------------------------------------------
        ['name' => 'primary', 'label' => 'Primary - Neon (buttons, links, glow)', 'type' => 'color', 'default' => 'hsl(318, 100%, 64%)'],
        ['name' => 'secondary', 'label' => 'Secondary - Second neon', 'type' => 'color', 'default' => 'hsl(188, 100%, 52%)'],
        ['name' => 'tertiary', 'label' => 'Middle of the neon gradient', 'type' => 'color', 'default' => 'hsl(266, 92%, 68%)'],
        ['name' => 'on-primary', 'label' => 'Text on the neon buttons', 'type' => 'color', 'default' => 'hsl(252, 60%, 6%)'],
        ['name' => 'neutral', 'label' => 'Borders, Accents...', 'type' => 'color', 'default' => 'hsl(252, 28%, 19%)'],
        ['name' => 'base', 'label' => 'Base - Text Color', 'type' => 'color', 'default' => 'hsl(240, 40%, 97%)'],
        ['name' => 'muted', 'label' => 'Muted - Text Color', 'type' => 'color', 'default' => 'hsl(248, 20%, 72%)'],
        ['name' => 'inverted', 'label' => 'Inverted - Text Color', 'type' => 'color', 'default' => 'hsl(252, 45%, 5%)'],
        ['name' => 'background', 'label' => 'Background - Color', 'type' => 'color', 'default' => 'hsl(252, 45%, 4%)'],
        ['name' => 'background-secondary', 'label' => 'Background - Cards and panels', 'type' => 'color', 'default' => 'hsl(252, 38%, 9%)'],
    ],
];
