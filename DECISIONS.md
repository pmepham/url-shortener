# Decisions

## Research and approach

Before starting the implementation, I did some quick research into URL shortener design and found this article:

https://medium.com/@aishahsofea/how-would-you-design-a-url-shortener-9a590827289e

The article discusses how a URL shortener could be designed at scale, including support for very high traffic and a large user base. One of the key ideas discussed is separating the application into different services, such as one service for creating short URLs and another for handling redirects.

For this project, I decided not to split the application into separate services because of the small scope and limited time available. However, I have still kept the URL shortening and URL redirecting responsibilities separate by placing them in their own classes and exposing them through separate routes.

## Dependencies

Composer has been added so the project can use its autoloader rather than requiring files manually.

Tailwind CSS has also been added via CDN to keep the front-end simple and avoid introducing a build step.

## Environment

I initially used WAMP with PHP 8.2 so the project would run on currently supported PHP versions. The project uses SQLite, so I also made sure that the `pdo_sqlite` extension was enabled.

I had some difficulty configuring clean URLs using `.htaccess` with WAMP/Apache. To avoid spending too much time on environment setup, I moved over to Laravel Herd, which uses Nginx and made it easier to run the project locally with clean routes.

## Scope and trade-offs

Due to the time constraints, I kept the project intentionally slim. I used an object-oriented approach, but did not implement a full MVC structure or use a framework.

The main focus was to deliver the core URL shortener functionality:

- submitting a URL
- validating the URL
- generating a short code
- storing the URL in SQLite
- redirecting from the short code to the original URL

Given more time, I would improve the project by adding automated tests, stronger collision handling for generated codes, better error handling, and a more complete routing structure.