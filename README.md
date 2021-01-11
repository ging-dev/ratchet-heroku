# Ratchet Heroku
Ratchet Socket Server for Heroku

[![StyleCI](https://github.styleci.io/repos/328550873/shield?branch=master)](https://github.styleci.io/repos/328550873?branch=master)
![Made with love in Vietnam](https://madewithlove.now.sh/vn?heart=true)

## Deploy

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy?template=https://github.com/ging-dev/ratchet-heroku)

## Example

```javascript
// Then some JavaScript in the browser:
var conn = new WebSocket('wss://yourapp.herokuapp.com/echo');
conn.onmessage = function(e) { console.log(e.data); };
conn.onopen = function(e) { conn.send('Hello Me!'); };
```

For autobahn.js

```javascript
var conn = new ab.Session('wss://yourapp.herokuapp.com/wamp',

    // WAMP session was established
    function() {

        // subscribe to topic
        conn.subscribe('test',

            // on event publication callback
            function(topic, event) {
                console.log('got event1');
                console.log(event);
            }
        );
        conn.publish('test', {
            a: 23,
            b: 'foobar'
        });
    },

    // WAMP session is gone
    function() {
    },
    {'skipSubprotocolCheck': true}
);
```
