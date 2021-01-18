# **API Spec - Fabric Grey**

## Authenticaion

All Api use this authentication

Request:
- Header :
        * Bearer-Token: "yout token"

## Retrive Fabric

Request:
- Method: GET
    - Endpoint: /api/v1/fabrics
    - Header:
        * Content-Type: application/json
        * Accept: application/json
    - Body: 
    ```
    {
        "name": "test1",
        "password": "test1"
    }

    ```
Response:
-    ```
    {
        "massage": "success",
        "result": {
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvbG9naW4iLCJpYXQiOjE2MTA5MzkxNjAsImV4cCI6MTYxMDk0Mjc2MCwibmJmIjoxNjEwOTM5MTYwLCJqdGkiOiJkVEJyZkticmhuV2JxS1ZXIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.RDPwiW5_XjaEoYoYD89GMFNmZ59_RZRsT3cNsM7D_MU"
        },
        "code": 200
    }
    ```
