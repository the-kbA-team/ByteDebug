# ByteDebug

[![License: MIT][license-mit]](LICENSE)

A simple class for debugging bytes by converting them to a printable string.

This is useful for all kinds of debugging, in case you receive strings containig
 all sorts of non-printable characters mixed into printable ones.

## Usage

Add the package to your repository:

`composer require kba-team/byte-debug`

Use:

```php
<?php
echo \kbATeam\ByteDebug\ToString::fromString('hello'.chr(10).'world!');
// output: hello\nworld!
```

## Development

Development commands run through the Docker-backed `Makefile`; no local PHP
installation is needed. PHP `^8.1` is supported, and CI tests PHP 8.1 and 8.5
with normal and lowest dependencies. During the required-check transition, CI
also retains the existing PHP 8.2–8.4 checks. Run `make help` for all targets.

```sh
make check PHP_VERSION=8.1
make check PHP_VERSION=8.5 DEPENDENCIES_LOWEST=1
```

`check` resolves dependencies, runs lint, PHPUnit, PHPStan and PHPCS, then
audits the same temporary lockfile. `install` resolves dependencies but removes
its temporary lockfile; a later standalone `audit` does not verify that earlier
snapshot. `clean` removes `vendor/` and the PHPUnit cache, not a pre-existing
lockfile. Composer uses an isolated copy of the manifest in the project root;
the checked-in Composer configuration is not changed.
The host needs `flock` to serialize install, check, audit and clean operations
that share `vendor/`.

The Composer executable comes from `COMPOSER_IMAGE` (default `composer:2`);
Composer and QA run under the requested PHP image. The container installs
`git` and `unzip` for dependency resolution. Proxy environment variables and an
optional `CA_CERT_FILE` are forwarded, and `COMPOSER_CACHE_DIR` controls the
Composer cache.
If `config.platform.php` is present, only the isolated manifest copy uses the
actual PHP patch version; other platform settings and the checked-in manifest
remain unchanged.

Changes to `main` use pull requests and squash merges. Issue branches should be
named `<issue-number>-<title-slug>`. The force-push ruleset excludes the broader
glob `[0-9]*-*`, which also matches some names outside that convention; it
does not enforce the PR source. Main is protected separately.

[license-mit]: https://img.shields.io/badge/license-MIT-blue.svg
