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
| Home page | Large welcome, "How to get started" in three steps, subscriptions as cards |
| Logo and favicon | The waffle logo is used until you upload your own under Settings |
| Buttons | Dark text on gold in dark mode, so they stay readable |
| Footer | Tidied up. The "Powered by Paymenter" link is kept, as Paymenter asks |
| Register page | Has an extra hook (`auth.register`) so the [Wizarr extension](https://github.com/Lolles1911/homelab) (`paymenter-wizarr/`) can show "Create an account with Discord" |
| Closed shop | When the Wizarr extension's "Only Discord members can see the shop" is on, the subscriptions are hidden on the home page and the button leads to login/Discord |
| Languages | The theme's texts follow the language Paymenter shows: English and Danish included |

## Installation (LXC or a regular install)

The repo is private, so cloning asks for a GitHub token as the password
(GitHub → Settings → Developer settings → Fine-grained tokens, only
*Contents: Read* on this repo).

```bash
git clone https://github.com/Lolles1911/paymenter-theme-wafflehub.git /tmp/wafflehub     # or: cd /tmp/wafflehub && git pull
bash /tmp/wafflehub/install.sh /opt/paymenter
```

Then select the theme: **Admin → Settings → Theme → `wafflehub` → Save**.

The script copies two folders into Paymenter:

- `themes/wafflehub`: templates, colours and font
- `public/wafflehub`: the prebuilt stylesheet

You don't need Node or `npm` on the server.

## Customising

Under **Admin → Settings → Theme**, with WaffleHub selected:

- **Home page texts:** small label, heading, body text (Markdown) and button
  text. **Leave a field empty** to get the default text in the visitor's
  language; anything you type is shown as it is, in every language. If the
  shop's name appears in the heading, it gets the gold gradient.
- **"How to get started"** can be turned off.
- **All colours** for light and dark mode, including the text colour on buttons.
  "Reset Colors" puts them back to the WaffleHub colours.
- **Logo and favicon** are uploaded under Settings → General as usual.

## Languages

The theme's own texts (home page, the three steps, the closed-shop button) are
in `themes/wafflehub/lang/<language>/home.php`: `en` and `da` are included.
Paymenter loads them itself and picks the one matching the visitor's language
(the language switch, otherwise **Admin → Settings → General → Default
Language**); languages without a file get English. To add one, copy `lang/en`
to e.g. `lang/de` and translate the texts on the right. Paymenter's own texts
(menu, cart and so on) come from Paymenter.

**Upgrading from a version with Danish texts in the settings:** earlier
versions filled the home page fields with Danish text. Saved fields keep
winning, so empty them under **Admin → Settings → Theme** to get the
translated texts.

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
| `themes/wafflehub/theme.php` | Name, colours and home page settings |
| `themes/wafflehub/css/app.css` | Stylesheet: the default theme + WaffleHub |
| `themes/wafflehub/views/home.blade.php` | The home page |
| `themes/wafflehub/lang/` | The theme's texts in English (`en`) and Danish (`da`) |
| `themes/wafflehub/views/layouts/` | Layout (loads the files) and colour variables |
| `themes/wafflehub/views/components/` | Logo, waffle mark, button, footer, editor |
| `themes/wafflehub/views/auth/register.blade.php` | The register page with the hook for the Discord button |
| `themes/wafflehub/fonts/` | Outfit (SIL Open Font License) |
| `public/wafflehub/` | The prebuilt stylesheet and font |
| `install.sh` | Copies the theme into Paymenter |
