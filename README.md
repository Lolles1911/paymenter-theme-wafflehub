# WaffleHub – tema til Paymenter

Et varmt, vaffel-inspireret tema til Paymenter med mørkt og lyst udseende,
egen forside og et vaffel-logo med en afspilningsknap.

![Forsiden i mørkt tema](screenshots/forside-dark.png)

<details>
<summary>Lyst tema og mobil</summary>

![Forsiden i lyst tema](screenshots/forside-light.png)
![Forsiden på mobil](screenshots/mobil-dark.png)

</details>

> Skærmbillederne er en statisk forhåndsvisning bygget med temaets rigtige
> stylesheet og samme markup som skabelonerne, men med eksempeltekst og
> forenklet menu. De er ikke taget fra en kørende Paymenter.

## Hvad temaet ændrer

Temaet bygger oven på Paymenters standardtema. Alle sider, der ikke ligger i
`themes/wafflehub/views`, kommer fra standardtemaet, så kurv, betaling,
kundeområde og fakturaer virker som før og følger med, når Paymenter opdateres.

| Ændret | Hvordan |
|---|---|
| Farver | Karamel og guld. Lyst og mørkt tema, al tekst tjekket for kontrast |
| Skrift | Outfit, leveret fra din egen server (ingen Google Fonts) |
| Forside | Stor velkomst, "Sådan kommer du i gang" i tre trin, abonnementer som kort |
| Logo og favicon | Vaffel-logoet bruges, indtil du uploader dit eget under Settings |
| Knapper | Mørk tekst på guld i mørkt tema, så de kan læses |
| Footer | Ryddet op. "Powered by Paymenter"-linket er bevaret, som Paymenter beder om |
| Lukket butik | Bruges Wizarr-extensionens "Only Discord members can see the shop", skjules abonnementerne på forsiden, og knappen fører til login/Discord |

## Installation (LXC eller almindelig installation)

Kør én kommando ad gangen. Repoet skal kunne hentes (gør det offentligt et
øjeblik, eller brug et token som sidst).

```bash
cd /tmp/homelab && git pull
```

```bash
bash /tmp/homelab/paymenter-theme-wafflehub/install.sh /opt/paymenter
```

Vælg så temaet: **Admin → Settings → Theme → `wafflehub` → Save**.

Scriptet kopierer to mapper ind i Paymenter:

- `themes/wafflehub` – skabeloner, farver og skrift
- `public/wafflehub` – det færdigbyggede stylesheet

Du behøver ikke Node eller `npm` på serveren.

## Tilpasning

Under **Admin → Settings → Theme**, når WaffleHub er valgt:

- **Forsidens tekster:** lille etiket, overskrift, brødtekst (Markdown) og
  knaptekst. Står butikkens navn i overskriften, får det guld-gradienten.
- **"Sådan kommer du i gang"** kan slås fra.
- **Alle farver** for lyst og mørkt tema, inkl. tekstfarven på knapper.
  "Reset Colors" sætter dem tilbage til WaffleHub-farverne.
- **Logo og favicon** uploader du under Settings → General som normalt.

Teksterne i de tre trin står i `themes/wafflehub/views/home.blade.php`.

## Hvis du ændrer i stylesheetet eller skabelonerne

Stylesheetet er bygget på forhånd mod Paymenter **v1.5.9**. Tilføjer du nye
Tailwind-klasser, eller kører du en anden Paymenter-version, og ser noget
forkert ud, så byg det igen på serveren (kræver Node 22):

```bash
cd /opt/paymenter && npm install && npm run build wafflehub
```

## Kendte forbehold

- **Ikke kørt i en rigtig Paymenter endnu.** Stylesheetet er bygget med
  Paymenters egne byggeværktøjer, og skærmbillederne viser det på samme
  markup, men selve skabelonerne er ikke renderet af Paymenter. Det, der kan
  drille, er logoet, faviconet og forsiden. Se efter dem først.
- Temaet bruger standardtemaets JavaScript-build (`public/default`). Det er
  der i en normal installation; scriptet stopper, hvis det mangler.
- Temaet er dansk. Paymenters egne tekster (menu, kurv osv.) følger stadig det
  sprog, Paymenter er sat til.

## Filer

| Fil | Indhold |
|---|---|
| `themes/wafflehub/theme.php` | Navn, farver og forsidens indstillinger |
| `themes/wafflehub/css/app.css` | Stylesheet: standardtemaet + WaffleHub |
| `themes/wafflehub/views/home.blade.php` | Forsiden |
| `themes/wafflehub/views/layouts/` | Layout (indlæser filerne) og farvevariabler |
| `themes/wafflehub/views/components/` | Logo, vaffel-mærke, knap, footer, editor |
| `themes/wafflehub/fonts/` | Outfit (SIL Open Font License) |
| `public/wafflehub/` | Det færdigbyggede stylesheet og skrift |
| `install.sh` | Kopierer temaet ind i Paymenter |
