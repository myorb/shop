# Test API

## Run on local machine with Docker

- Install Docker and Docker Composer
- Run next commands in terminal:

And add this IP to your hosts file
```
0.0.0.0  api.shop.dev
```

Run nginx proxy container
```
docker run --name nginx-proxy --restart always -d -p 80:80 -p 443:443 -v /var/run/docker.sock:/tmp/docker.sock:ro jwilder/nginx-proxy
```

Then run API:
```
docker-compose run -d aplication
```

Load dependencies
```
docker-compose run --rm deps
```

Migrations and seeds
```
docker-compose run --rm migrations
```

Done! API is availbale on this URL: http://shop.dev


Run API tests
```
docker-compose run --rm tests
```

Artisan
```
docker-compose run --rm artisan
```

###PhpMyAdmin

Run PMA daemon
```
docker-compose run -d pma
```

And add new host into list
```
0.0.0.0 pma.shop.dev
```
Folow link [pma.shop.dev](http://pma.shop.dev)
```
Login: root
Password: root
```