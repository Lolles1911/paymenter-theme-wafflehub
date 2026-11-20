# Changing the theme

Rebuilding the stylesheet, known caveats, and what each file does.

## If you change the stylesheet or the templates

The stylesheet is prebuilt against Paymenter **v1.5.9**. If you add new
Tailwind classes, or run another Paymenter version and something looks wrong,
rebuild it on the server (requires Node 22):

```bash
cd /opt/paymenter && npm install && npm run build wafflehub
```

## Known caveats

- The theme uses the default theme's JavaScript build (`public/default`). It is
  there in a normal install; the script stops if it is missing.

## Files

| File | Contents |
|---|---|
| `themes/wafflehub/theme.php` | Name, colours and front page settings |
| `themes/wafflehub/css/app.css` | Stylesheet: the default theme + WaffleHub |
| `themes/wafflehub/views/home.blade.php` | The front page |
| `themes/wafflehub/lang/` | The theme's texts in English (`en`) and Danish (`da`) |
| `themes/wafflehub/views/layouts/` | Layout (loads the files, the light behind the pages, the poster wall on the sign-in pages) and colour variables |
| `themes/wafflehub/views/components/` | Logo, waffle mark, poster wall, button, footer, editor, (empty) light/dark switch |
| `themes/wafflehub/views/auth/register.blade.php` | The register page with the hook for the Discord button |
| `themes/wafflehub/views/products/index.blade.php` | A category page: heading, the categories as a menu, the products as cards |
| `themes/wafflehub/views/products/show.blade.php` | The product page: the product and its price as two cards |
| `themes/wafflehub/fonts/` | Space Grotesk (SIL Open Font License) |
| `public/wafflehub/` | The prebuilt stylesheet and font |
| `public/wafflehub-art/posters/` | The 18 waffle posters (WebP) |
| `install.sh` | Copies the theme into Paymenter |

[← WaffleHub](../README.md)
