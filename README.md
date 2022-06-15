# Helpmate server
This is implementation of primitive json spread server
#### Install
```
docker build -t helpmate-server .
```

#### Run

```
docker run -d -p 8080:8080 helpmate-server
```

#### Usage example
put file to new session return session id:
```
curl -X POST "http://localhost:8008?file=test" -d '{"json":"example data"}'
>>> ab218e5b752ca2b29bd8a6de904ad596
```

or put file to exist session:
```
curl -X POST "http://localhost:8008?file=test&session=ab218e5b752ca2b29bd8a6de904ad596" -d '{"json":"example data"}'
>>> ab218e5b752ca2b29bd8a6de904ad596
```

get file:
```
curl "http://localhost:8008?file=test&session=ab218e5b752ca2b29bd8a6de904ad596"
>>> {"json":"example data"}```