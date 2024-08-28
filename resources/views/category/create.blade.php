@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            font-size: 14px;
            color: #007bff;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccd1d9;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="file"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button[type="submit"]:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Category</h1>
        <form id="myForm" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="category_description">Category Description</label>
                <input type="text" id="category_description" name="category_description" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Image (optional)</label>
                <input type="file" id="image" name="image">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
@endsection
