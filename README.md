# strahovaniye_test

Запуск проекта:
```
docker build test_tagleev .
docker run --name test_tagleev -dp 8000:8000 test_tagleev
curl http://127.0.0.1
```

Тестирование:
```
docker exec -it test_tagleev bash
./vendor/bin/phpunit tests
```
