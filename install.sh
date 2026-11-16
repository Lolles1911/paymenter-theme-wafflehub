#!/bin/bash
# Installs the WaffleHub theme into a Paymenter installation.
#
#   bash install.sh                    # Paymenter in /opt/paymenter (LXC / plain install)
#   bash install.sh /var/www/paymenter
#
# Safe to run again after an update.

set -euo pipefail

PAYMENTER="${1:-/opt/paymenter}"
HERE="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

if [ ! -f "$PAYMENTER/artisan" ] || [ ! -d "$PAYMENTER/themes/default" ]; then
  echo "No Paymenter installation in $PAYMENTER (artisan or themes/default missing)." >&2
  echo "Give the right folder as argument: bash install.sh /path/to/paymenter" >&2
  exit 1
fi

# WaffleHub borrows the default theme's JavaScript build instead of shipping its own.
if [ ! -f "$PAYMENTER/public/default/manifest.json" ]; then
  echo "$PAYMENTER/public/default/manifest.json is missing: the default theme has not been built." >&2
  echo "WaffleHub needs it. Run 'npm install && npm run build' in $PAYMENTER first." >&2
  exit 1
fi

for THEME in wafflehub; do
  rm -rf "$PAYMENTER/themes/$THEME" "$PAYMENTER/public/$THEME"
  cp -r "$HERE/themes/$THEME" "$PAYMENTER/themes/$THEME"
  cp -r "$HERE/public/$THEME" "$PAYMENTER/public/$THEME"

  # Same owner as the files Paymenter already serves.
  chown -R --reference="$PAYMENTER/themes/default" "$PAYMENTER/themes/$THEME"
  chown -R --reference="$PAYMENTER/public/default" "$PAYMENTER/public/$THEME"
done

# The waffle posters for the front page: plain images, outside the stylesheet build.
rm -rf "$PAYMENTER/public/wafflehub-art"
cp -r "$HERE/public/wafflehub-art" "$PAYMENTER/public/wafflehub-art"
chown -R --reference="$PAYMENTER/public/default" "$PAYMENTER/public/wafflehub-art"

# As the user that owns storage/ (usually www-data): run as root, artisan can
# leave root-owned files behind that the web server then cannot write.
if command -v php >/dev/null 2>&1; then
  OWNER="$(stat -c %U "$PAYMENTER/storage")"
  CLEAR="cd '$PAYMENTER' && php artisan view:clear >/dev/null"
  if { [ "$(id -un)" = "$OWNER" ] && bash -c "$CLEAR"; } || su -s /bin/bash "$OWNER" -c "$CLEAR"; then
    echo "Cleared Paymenter's view cache."
  else
    echo "Could not clear the view cache. Run: su -s /bin/bash $OWNER -c 'php $PAYMENTER/artisan view:clear'" >&2
  fi
fi

echo
echo "Installed. If WaffleHub isn't selected yet: Admin -> Settings -> Theme -> 'wafflehub' -> Save."
