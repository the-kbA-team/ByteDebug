# ByteDebug

[![License: MIT][license-mit]](LICENSE)
[![Build Status][build-status]][travis-ci]
[![Maintainability][maintainability-badge]][maintainability]
[![Test Coverage][coverage-badge]][coverage]

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

[license-mit]: https://img.shields.io/badge/license-MIT-blue.svg
[build-status]: https://travis-ci.org/the-kbA-team/ByteDebug.svg?branch=main
[travis-ci]: https://travis-ci.org/the-kbA-team/ByteDebug
[maintainability-badge]: https://api.codeclimate.com/v1/badges/c7c8e0ab8b10289143f8/maintainability
[maintainability]: https://codeclimate.com/github/the-kbA-team/ByteDebug/maintainability
[coverage-badge]: https://api.codeclimate.com/v1/badges/c7c8e0ab8b10289143f8/test_coverage
[coverage]: https://codeclimate.com/github/the-kbA-team/ByteDebug/test_coverage
