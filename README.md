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

[license-mit]: https://img.shields.io/badge/license-MIT-blue.svg
