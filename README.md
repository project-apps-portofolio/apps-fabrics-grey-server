# **API Spec - Fabric Grey**

## Authenticaion

All Api use this authentication

* Request:
    - Header :
        * Bearer-Token: "yout token"

## Login

* Request:

- Method: POST
    - Endpoint: /api/v1/login
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
- Response:

    ```
    {
        "massage": "success",
        "result": {
            "token":""
        },
        "code": 200
    }
    ```

## Register

* Request:

    - Method: POST
        - Endpoint: /api/v1/register
        - Header:
            * Content-Type: application/json
            * Accept: application/json
        - Body: 
        ```
        {
            "name": "test1",
            "email: : "test@gmail.com"
            "password": "test1"
        }

        ```
- Response:

    ```
    {
        "user": {
            "name": "test2",
            "email": "test3",
            "updated_at": "2021-01-18T03:34:47.000000Z",
            "created_at": "2021-01-18T03:34:47.000000Z",
            "id": 4
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1N"
    }
    ```

## Store Fabric

* Request:

    - Method: POST
        - Endpoint: /api/v1/fabric/store
        - Header:
            * Content-Type: application/json
            * Accept: application/json
            * Bearer Token: "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1N"
        - Body: 
        ```
        {
            "fabric_type": "Fabric Franch Terry",
            "machine_id: : "001"
            "brand": "Franch Terry"
            "po_number": "0554124"
        }

        ```
- Response:

    ```
   {
        "massage": "POST Data",
        "data": {
            "fabric_type": "HAI",
            "machine_id": "11",
            "brand": "11",
            "po_number": "12312312",
            "updated_at": "18-01-2021",
            "created_at": "18-01-2021",
            "id": 31
        },
        "code": 200
    }
    ```
