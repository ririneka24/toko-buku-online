# Dokumentasi API Toko Buku

## Base URL
```
http://localhost:8000/api
```

## Authentication
Gunakan token dari endpoint `/api/login` atau `/api/register` di header:
```
Authorization: Bearer {token}
```

---

## 1. AUTH ENDPOINTS

### Register
- **Method**: POST
- **URL**: `/api/register`
- **Auth**: Tidak diperlukan
- **Body**:
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "123456"
}
```
- **Response** (201):
```json
{
  "token": "1|xxxxxxxxxxxxx"
}
```

---

### Login
- **Method**: POST
- **URL**: `/api/login`
- **Auth**: Tidak diperlukan
- **Body**:
```json
{
  "email": "john@example.com",
  "password": "123456"
}
```
- **Response** (200):
```json
{
  "token": "1|xxxxxxxxxxxxx"
}
```

---

### Logout
- **Method**: POST
- **URL**: `/api/logout`
- **Auth**: Diperlukan (Bearer token)
- **Body**: Kosong
- **Response** (200):
```json
{
  "message": "Logged out"
}
```

---

## 2. CATEGORIES ENDPOINTS

### Get All Categories
- **Method**: GET
- **URL**: `/api/categories`
- **Auth**: Diperlukan
- **Response** (200):
```json
[
  {
    "id": 1,
    "name": "Programming",
    "created_at": "2025-01-01T00:00:00.000000Z",
    "updated_at": "2025-01-01T00:00:00.000000Z",
    "books": []
  }
]
```

---

### Get Category by ID
- **Method**: GET
- **URL**: `/api/categories/{id}`
- **Auth**: Diperlukan
- **Response** (200):
```json
{
  "id": 1,
  "name": "Programming",
  "created_at": "2025-01-01T00:00:00.000000Z",
  "updated_at": "2025-01-01T00:00:00.000000Z",
  "books": [
    {
      "id": 1,
      "title": "Belajar Laravel",
      "author": "Pak Budi",
      "year": "2025",
      "stock": 10,
      "category_id": 1,
      "image": "images/1234567890_photo.jpg",
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

---

### Create Category
- **Method**: POST
- **URL**: `/api/categories`
- **Auth**: Diperlukan
- **Body**:
```json
{
  "name": "Novel"
}
```
- **Response** (201):
```json
{
  "name": "Novel",
  "updated_at": "2025-01-01T00:00:00.000000Z",
  "created_at": "2025-01-01T00:00:00.000000Z",
  "id": 2
}
```

---

### Update Category
- **Method**: PUT/PATCH
- **URL**: `/api/categories/{id}`
- **Auth**: Diperlukan
- **Body**:
```json
{
  "name": "Fiction"
}
```
- **Response** (200):
```json
{
  "id": 2,
  "name": "Fiction",
  "created_at": "2025-01-01T00:00:00.000000Z",
  "updated_at": "2025-01-01T00:00:00.000000Z"
}
```

---

### Delete Category
- **Method**: DELETE
- **URL**: `/api/categories/{id}`
- **Auth**: Diperlukan
- **Response** (200):
```json
{
  "message": "Category deleted"
}
```

---

## 3. BOOKS ENDPOINTS

### Get All Books
- **Method**: GET
- **URL**: `/api/books`
- **Auth**: Diperlukan
- **Response** (200):
```json
[
  {
    "id": 1,
    "title": "Belajar Laravel",
    "author": "Pak Budi",
    "year": "2025",
    "stock": 10,
    "category_id": 1,
    "image": "images/1234567890_photo.jpg",
    "created_at": "2025-01-01T00:00:00.000000Z",
    "updated_at": "2025-01-01T00:00:00.000000Z"
  }
]
```

---

### Get Book by ID
- **Method**: GET
- **URL**: `/api/books/{id}`
- **Auth**: Diperlukan
- **Response** (200):
```json
{
  "id": 1,
  "title": "Belajar Laravel",
  "author": "Pak Budi",
  "year": "2025",
  "stock": 10,
  "category_id": 1,
  "image": "images/1234567890_photo.jpg",
  "created_at": "2025-01-01T00:00:00.000000Z",
  "updated_at": "2025-01-01T00:00:00.000000Z"
}
```

---

### Create Book
- **Method**: POST
- **URL**: `/api/books`
- **Auth**: Diperlukan
- **Content-Type**: `multipart/form-data`
- **Body**:
```
title: Belajar Laravel
author: Pak Budi
year: 2025-01-15
stock: 10
category_id: 1
image: (file)
```
- **Response** (201):
```json
{
  "id": 1,
  "title": "Belajar Laravel",
  "author": "Pak Budi",
  "year": "2025-01-15",
  "stock": 10,
  "category_id": 1,
  "image": "images/1234567890_photo.jpg",
  "created_at": "2025-01-01T00:00:00.000000Z",
  "updated_at": "2025-01-01T00:00:00.000000Z"
}
```

---

### Update Book
- **Method**: PUT
- **URL**: `/api/books/{id}`
- **Auth**: Diperlukan
- **Content-Type**: `multipart/form-data`
- **Body**:
```
title: Belajar Laravel (Updated)
author: Pak Budi
year: 2025-01-15
stock: 15
category_id: 1
image: (file) - optional
```
- **Response** (200):
```json
{
  "id": 1,
  "title": "Belajar Laravel (Updated)",
  "author": "Pak Budi",
  "year": "2025-01-15",
  "stock": 15,
  "category_id": 1,
  "image": "images/1234567890_photo.jpg",
  "created_at": "2025-01-01T00:00:00.000000Z",
  "updated_at": "2025-01-01T00:00:00.000000Z"
}
```

---

### Delete Book
- **Method**: DELETE
- **URL**: `/api/books/{id}`
- **Auth**: Diperlukan
- **Response** (200):
```json
{
  "message": "Book deleted"
}
```

---

## 4. TRANSACTIONS ENDPOINTS

### Get All Transactions
- **Method**: GET
- **URL**: `/api/transactions`
- **Auth**: Diperlukan
- **Response** (200):
```json
[
  {
    "id": 1,
    "book_id": 1,
    "quantity": 2,
    "total_price": 100000,
    "created_at": "2025-01-01T00:00:00.000000Z",
    "updated_at": "2025-01-01T00:00:00.000000Z"
  }
]
```

---

### Create Transaction
- **Method**: POST
- **URL**: `/api/transactions`
- **Auth**: Diperlukan
- **Body**:
```json
{
  "book_id": 1,
  "quantity": 2,
  "total_price": 100000
}
```
- **Response** (201):
```json
{
  "id": 1,
  "book_id": 1,
  "quantity": 2,
  "total_price": 100000,
  "created_at": "2025-01-01T00:00:00.000000Z",
  "updated_at": "2025-01-01T00:00:00.000000Z"
}
```

---

## Testing dengan Postman

### Langkah-langkah:

1. **Register / Login**
   - Jalankan endpoint Register atau Login
   - Copy token dari response
   - Simpan ke variable Postman: `{{token}}`

2. **Set Variable di Postman**
   - Buka Postman → Environment
   - Buat variable baru: `token` = (paste token dari step 1)

3. **Test Endpoint**
   - Gunakan `{{token}}` di header Authorization
   - Contoh: `Authorization: Bearer {{token}}`

4. **Urutan Testing yang Disarankan**
   - Register / Login → dapatkan token
   - Create Category
   - Create Book (dengan category_id dari step sebelumnya)
   - Get All Books
   - Get Book by ID
   - Update Book
   - Create Transaction
   - Get All Transactions
   - Delete Book
   - Delete Category

---

## Error Response

### 401 Unauthorized
```json
{
  "message": "Unauthenticated"
}
```

### 422 Unprocessable Entity (Validation Error)
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": ["The email has already been taken."],
    "password": ["The password must be at least 6 characters."]
  }
}
```

### 404 Not Found
```json
{
  "message": "Not Found"
}
```

### 500 Internal Server Error
```json
{
  "message": "Server Error"
}
```

---

## Catatan Penting

- Semua endpoint yang memerlukan auth harus include header `Authorization: Bearer {token}`
- Token berlaku selamanya (sampai logout)
- Untuk upload gambar, gunakan `multipart/form-data` bukan JSON
- Field `year` bisa berupa date (YYYY-MM-DD) atau tahun (YYYY)
- Field `image` bersifat optional saat create/update book
