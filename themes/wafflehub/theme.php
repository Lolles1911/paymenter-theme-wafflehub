<?php

/*
 * WaffleHub - a dark Paymenter theme with a soft violet-to-pink glow.
 *
 * Built on top of Paymenter's default theme: every page that is not in
 * views/ here comes from themes/default, so Paymenter updates keep working.
 * The default pages get WaffleHub's look from css/app.css.
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
            'description' => 'Empty = "Welcome to <shop name>" in the visitor\'s language. The shop\'s name gets the accent gradient.',
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
            'name' => 'poster_images',
            'label' => 'Front page: poster wall images (optional)',
            'type' => 'textarea',
            'default' => '',
            'description' => 'One image address per line, e.g. posters you have uploaded or from your media server. Empty = drawn posters in the theme\'s colours. Images from another site are loaded from that site by every visitor.',
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
            'label' => 'Moving light in the background',
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
        // The accent gradient runs from Primary to Secondary. The keys start with
        // "night-" so colours saved for the earlier, caramel WaffleHub don't apply.
        ['name' => 'night-primary', 'label' => 'Primary - Accent (buttons, links)', 'type' => 'color', 'default' => 'hsl(266, 85%, 72%)'],
        ['name' => 'night-secondary', 'label' => 'Secondary - End of the accent gradient', 'type' => 'color', 'default' => 'hsl(325, 80%, 70%)'],
        ['name' => 'night-tertiary', 'label' => 'A third tone (drawn screen on the front page)', 'type' => 'color', 'default' => 'hsl(230, 70%, 62%)'],
        ['name' => 'night-on-primary', 'label' => 'Text on the accent buttons', 'type' => 'color', 'default' => 'hsl(252, 60%, 6%)'],
        ['name' => 'night-neutral', 'label' => 'Borders, Accents...', 'type' => 'color', 'default' => 'hsl(252, 28%, 19%)'],
        ['name' => 'night-base', 'label' => 'Base - Text Color', 'type' => 'color', 'default' => 'hsl(240, 40%, 97%)'],
        ['name' => 'night-muted', 'label' => 'Muted - Text Color', 'type' => 'color', 'default' => 'hsl(248, 20%, 72%)'],
        ['name' => 'night-inverted', 'label' => 'Inverted - Text Color', 'type' => 'color', 'default' => 'hsl(252, 45%, 5%)'],
        ['name' => 'night-background', 'label' => 'Background - Color', 'type' => 'color', 'default' => 'hsl(252, 45%, 4%)'],
        ['name' => 'night-background-secondary', 'label' => 'Background - Cards and panels', 'type' => 'color', 'default' => 'hsl(252, 38%, 9%)'],
    ],
];
