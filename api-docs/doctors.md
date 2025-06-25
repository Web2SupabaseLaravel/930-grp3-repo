# Doctors API 

# Done By Mohammad Dwikat
## Get All Doctors
>**GET** `http://127.0.0.1:8000/api/datadoctors/`


### Headers

| Name         | Required | Description                |
| ------------ | -------- | -------------------------- |
| Content-Type | Yes      | Must be `application/json` |
| Accept       | Yes      | Must be `application/json` |



### Success Response (200)

```json
{
    "doctor_id": 8,
    "users_id": 13,
    "medical_field": "boneds",
    "phone": "0599112244",
    "working_hours": "9:00 AM- 5:00 PM",
    "user": {
      "user_id": 13,
      "email": "noor1@gmail.com",
      "password": "$2y$12$LqtjPlMHyqs1joF7wJSqSum2.TGfOWJ594Ecz33R3TJC5RQg7dH.W",
      "role": "Doctor",
      "name": "Dr. noor"
    }
  },
  {
    "doctor_id": 1,
    "users_id": 2,
    "medical_field": "Cardiology",
    "phone": "0599123456",
    "working_hours": "9:00 AM- 5:00",
    "user": {
      "user_id": 2,
      "email": "ahmad@gmail.com",
      "password": "$2y$12$/DRqOjeHLuCdr8XQV1cMA.eVotElHFstVjLfej.Oc3rUrdnaAJlm.",
      "role": "Doctor",
      "name": "Dr. Ahmadd"
    }
  }
```

#  Register a New Doctor
>**post** `http://127.0.0.1:8000/api/datadoctors/`


### Headers

| Name         | Required | Description                |
| ------------ | -------- | -------------------------- |
| Content-Type | Yes      | Must be `application/json` |
| Accept       | Yes      | Must be `application/json` |


### Parameters

| Name   | Type    | Required | Description                      |
|--------|---------|----------|----------------------------------|
| name   | integer |   yas    |         Doctor's name            |
| email  | integer |   yas    |         Doctor's email           |
|password|  text   |   yas    |         password for doctor      |
|medical_field|varchar|yas    |         Doctor's specialty       |
|phone   |varchar  |   yas    |         Doctor's mobile number   |
|working_hours|text|yes       |          Dr.'s working hours     |


### Example Request
```json
 {
   "medical_field": "boneds",
    "phone": "0599112244",
    "working_hours": "9:00 AM- 5:00 PM",
      "email": "noor@gmail.com",
      "password": "123456789",
      "role": "Doctor",
      "name": "Dr. noor"

    }
 
```

### Success Response (200)

```json
{
  "message": "Doctor created successfully"
}
```

# Status Code: 422 Unprocessable Entity

```json
{
"message": "The given data was invalid..",
"errors": {
"email": [
"The email has already been taken.."
],

}
}
```




## update  Doctors
>**update** `http://127.0.0.1:8000/api/datadoctors/1`


### Headers

| Name         | Required | Description                |
| ------------ | -------- | -------------------------- |
| Content-Type | Yes      | Must be `application/json` |
| Accept       | Yes      | Must be `application/json` |

### Example Request
```json
 {
   "medical_field": "boneds",
    "phone": "0599112245",
    "working_hours": "9:00 AM- 5:00 PM",
      "email": "noor1111@gmail.com",
      "password": "123456789",
      "role": "Doctor",
      "name": "Dr. noor"

    }
 
```
### Success Response (200)

```json

  {
  "message": "Doctor updated successfully"
}
```



## Delete  Doctors
>**Delete** `http://127.0.0.1:8000/api/datadoctors/1`


### Headers

| Name         | Required | Description                |
| ------------ | -------- | -------------------------- |
| Content-Type | Yes      | Must be `application/json` |
| Accept       | Yes      | Must be `application/json` |



### Success Response (200)

```json
{
  "message": "Doctor deleted successfully"
}
```


