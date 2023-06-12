# Simple app

## Installation

```bash
$ composer install
```

## Command to import data

```bash
$ ./vendor/bin/laminas app:import-images --filepath {filepath}
```

## TODO

- Add tests
- Add validation
- Add more error handling
- Add more exceptions
- Add logging
- Use symfony serializer instead of custom `File` module
- Add dockerfile/docker-compose in order to run the app on the same environments