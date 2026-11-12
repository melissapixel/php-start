.PHONY: up down build logs ps shell db reset

# Поднять все сервисы (PHP + MySQL) в фоне
up:
	docker compose up -d --build

# Остановить все сервисы
down:
	docker compose down

# Остановить и удалить данные БД (осторожно!)
reset:
	docker compose down -v
	@echo "⚠️  Все данные БД удалены"

# Пересобрать образ без кэша
build:
	docker compose build --no-cache

# Логи (всех сервисов или одного: make logs service=php)
logs:
	docker compose logs -f $(service)

# Статус контейнеров
ps:
	docker compose ps

# Зайти внутрь PHP-контейнера
shell:
	docker compose exec php sh

# Зайти в MySQL CLI
db:
	docker compose exec db mysql -u app -papp_secret shop

# Запустить тесты (когда появятся)
test:
	docker compose exec php php vendor/bin/phpunit

# Использование: make run task=task001
run:
	docker compose exec php php /app/$(task)/index.php


# ----------------------------------

# make up          # поднять всё
# make ps          # проверить статус
# make logs        # смотреть, что происходит
# make shell       # зайти в PHP
# make db          # зайти в MySQL
# make reset       # всё снести и начать заново
# make down        # просто остановить