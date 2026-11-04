build:
	docker build -t my-php-app .

run:
	docker run -p 8000:8000 my-php-app