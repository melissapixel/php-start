build:
	docker build -t my-php-app .p

run:
	docker run -p 8000:8000 my-php-app