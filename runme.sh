cp src/.env.example src/.env
docker-compose run --rm composer install --ignore-platform-reqs
docker-compose run --rm artisan key:generate
docker-compose run --rm artisan migrate:fresh
docker-compose run --rm artisan storage:link
docker-compose run --rm artisan horizon:install
docker-compose run --rm artisan horizon
