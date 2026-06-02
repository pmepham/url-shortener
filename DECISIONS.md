After a quick google I found this blog post:
https://medium.com/@aishahsofea/how-would-you-design-a-url-shortener-9a590827289e
would be cool to actually host this project so they the link would be from this project.

it details how they would design url shortner that can scale to supporting 100 million users, it goes pretty deep on perforamce they talk about seperating the project into two services one for url shortning and another for url redirecting, I wont be doing that for this project however they will be kept in their own class with seperate end points.

Composer has been added to use the auto loader it provides.
the CDN to tailwind has also been added.

My environment,
I'm using wamp to run PHP 8.2 so that the project can run on all non-EOD versions and sqlite3, I have also made sure sqlite_pdo has been enabled.

I due to time contraints I will be keep this project as slim as possible using an oop approach without the MVC pattern.

htaccess has been set up to provide clean urls