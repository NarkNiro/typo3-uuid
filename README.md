[![Latest Stable Version](http://poser.pugx.org/narkniro/uuid/v)](https://packagist.org/packages/narkniro/uuid)
[![Version](http://poser.pugx.org/narkniro/uuid/version)](https://packagist.org/packages/narkniro/uuid)
[![PHP Version Require](http://poser.pugx.org/phpunit/phpunit/require/php)](https://packagist.org/packages/phpunit/phpunit)
[![TYPO3 11.5](https://img.shields.io/badge/TYPO3-11.5-green.svg?style=flat-square)](https://get.typo3.org/version/11)

[![Total Downloads](http://poser.pugx.org/narkniro/uuid/downloads)](https://packagist.org/packages/narkniro/uuid)

# UUID Packages

Adds a UUID field to all TYPO3 tables to uniquely identify a record.
When records are created, a DataHandler hook adds the UUID.

- Cannot be resolved in Extbase
- Cannot be used in the table MM context

## Installation

Install with your favour:

* composer

We prefer composer installation:

```bash
composer req narkniro/uuid
```
