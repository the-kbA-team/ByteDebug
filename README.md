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
//output: hellox0Aworld!
```

## Development

All development commands (install, test, lint, analyze, beautify, sniff, audit,
validate) run via Docker through the `Makefile`, so no local PHP installation is
needed. Run `make help` to list all targets. Most targets require `PHP_VERSION`,
e.g.:

```sh
make install PHP_VERSION=8.1
```

[license-mit]: https://img.shields.io/badge/license-MIT-blue.svg
