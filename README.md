## Coolblue Shopping Cart
### Instructions:
Please run the following command to create your .env file

```bash
docker exec -i coolblue_cart_php cp .env.example .env
```

### Tests
You can run unit tests with following command:
```bash
docker exec -i coolblue_cart_php vendor/bin/phpunit tests
```

### View
You can open the following urls to check the outputs:
```bash
http://localhost:8080
```
with filters:
```bash
http://localhost:8080?cart_id=1
```