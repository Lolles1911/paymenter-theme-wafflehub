# WaffleHub, a theme for Paymenter

A warm, waffle-inspired theme for Paymenter with dark and light modes, its own
home page, and a waffle logo with a play button.

![The home page in dark mode](screenshots/forside-dark.png)

<details>
<summary>Light mode and mobile</summary>

![The home page in light mode](screenshots/forside-light.png)
![The home page on mobile](screenshots/mobil-dark.png)

</details>

> The screenshots are a static preview built with the theme's real stylesheet
> and the same markup as the templates, but with sample text and a simplified
> menu. They were not taken from a running Paymenter.

## What the theme changes

The theme builds on Paymenter's default theme. Every page that is not in
`themes/wafflehub/views` comes from the default theme, so the cart, checkout,
client area and invoices work as before and keep up when Paymenter is updated.

| Changed | How |
|---|---|
| Colours | Caramel and gold. Light and dark mode, all text checked for contrast |
| Font | Outfit, served from your own server (no Google Fonts) |
| Home page | Large welcome, "Sådan kommer du i gang" (getting started) in three steps, subscriptions as cards |
| Logo and favicon | The waffle logo is used until you upload your own under Settings |
| Buttons | Dark text on gold in dark mode, so they stay readable |
| Footer | Tidied up. The "Powered by Paymenter" link is kept, as Paymenter asks |
| Register page | Has an extra hook (`auth.register`) so the Wizarr extension can show "Opret konto med Discord" (create account with Discord) |
| Closed shop | When the Wizarr extension's "Only Discord members can see the shop" is on, the subscriptions are hidden on the home page and the button leads to login/Discord |

## Installation (LXC or a regular install)

```bash
git clone https://github.com/Lolles1911/homelab.git /tmp/homelab     # or: cd /tmp/homelab && git pull
bash /tmp/homelab/paymenter-theme-wafflehub/install.sh /opt/paymenter
```

Then select the theme: **Admin → Settings → Theme → `wafflehub` → Save**.

The script copies two folders into Paymenter:

- `themes/wafflehub`: templates, colours and font
- `public/wafflehub`: the prebuilt stylesheet

You don't need Node or `npm` on the server.

## Customising

Under **Admin → Settings → Theme**, with WaffleHub selected:

- **Home page texts:** small label, heading, body text (Markdown) and button
  text. If the shop's name appears in the heading, it gets the gold gradient.
- **"Sådan kommer du i gang"** (getting started) can be turned off.
- **All colours** for light and dark mode, including the text colour on buttons.
  "Reset Colors" puts them back to the WaffleHub colours.
- **Logo and favicon** are uploaded under Settings → General as usual.

The texts in the three steps are in `themes/wafflehub/views/home.blade.php`.

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
- The theme's own texts are in Danish. Paymenter's own texts (menu, cart and so
  on) still follow the language Paymenter is set to.

## Files

| File | Contents |
|---|---|
| `themes/wafflehub/theme.php` | Name, colours and home page settings |
| `themes/wafflehub/css/app.css` | Stylesheet: the default theme + WaffleHub |
| `themes/wafflehub/views/home.blade.php` | The home page |
| `themes/wafflehub/views/layouts/` | Layout (loads the files) and colour variables |
| `themes/wafflehub/views/components/` | Logo, waffle mark, button, footer, editor |
| `themes/wafflehub/views/auth/register.blade.php` | The register page with the hook for the Discord button |
| `themes/wafflehub/fonts/` | Outfit (SIL Open Font License) |
| `public/wafflehub/` | The prebuilt stylesheet and font |
| `install.sh` | Copies the theme into Paymenter |
