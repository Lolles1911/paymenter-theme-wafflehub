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

rm -rf "$PAYMENTER/themes/wafflehub" "$PAYMENTER/public/wafflehub"
cp -r "$HERE/themes/wafflehub" "$PAYMENTER/themes/wafflehub"
cp -r "$HERE/public/wafflehub" "$PAYMENTER/public/wafflehub"

# Same owner as the files Paymenter already serves.
chown -R --reference="$PAYMENTER/themes/default" "$PAYMENTER/themes/wafflehub"
chown -R --reference="$PAYMENTER/public/default" "$PAYMENTER/public/wafflehub"

if command -v php >/dev/null 2>&1; then
  (cd "$PAYMENTER" && php artisan view:clear >/dev/null && echo "Cleared Paymenter's view cache.")
fi

echo
echo "Installed. Now choose it in Paymenter: Admin -> Settings -> Theme -> 'wafflehub' -> Save."
