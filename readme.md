# Project 4
+ By: Phil Plencner
+ Production URL: <http://p4.plencnerlabs.me>

## Feature summary

+ This app allows you to add events and then see how many days are left until the event occurs. You can also update and delete events
+ Users can add/update/delete events in their list (name, type, month, day, year)
+ Each event has a countdown of how many days are left until the event occurs
+ Some events have user comments and they are displayed on the event page

  
## Database summary

+ My application has 3 tables in total (`events`, `types`, `comments`)
+ There's a one-to-many relationship between `events` and `types`
+ There's a one-to-many relationship between `events` and `comments`

## Outside resources
+ Font Awesome Icons:  <https://fontawesome.com/icons>
+ Stackoverflow thread on daily countdown: <https://stackoverflow.com/questions/1735252/php-countdown-to-date> 

## Code style divergences
+ None