FROM php:8.3-cli-alpine
RUN apk add --no-cache icu-dev \
    && docker-php-ext-install intl
WORKDIR /app
COPY . .
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/app"]