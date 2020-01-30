# Doctrine module for Laminas

Goal of this project is to stop using Entity Repositories and start working with query provider instead. Not sure if
it's a good idea but it allow to split each query doctrine in it's own QueryProvider provider file. 
To implements query provider we had to extends the QueryBuilder and to create interface for it.
Added query builder interfaces, query provider factory, single value hydrator.

## Requirements
- Doctrine 2

## Installation
1. Installation with composer
```bash
composer require swarmtech/doctrine:"^1.0"
```

2. Enable module for Laminas by adding `Swarmtech\\Doctrine` in config/modules.config.php
```php
return [
    "Swarmtech\\Doctrine",
];
```

## Feature
* QueryProviderFactory to create your QueryProvider classes
* QueryBuilder Interfaces to make the use of QueryProvider easy

## Issue reporting
If you have found a bug or if you have a feature request, please report them at this repository issues section.

## Author
[Gary Gitton](https://github.com/garygitton)

## License
This project is licensed under the MIT license. 
See the [LICENSE](https://github.com/swarmtech/doctrine/blob/master/LICENSE) file for more info.
