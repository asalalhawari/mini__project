@extends('dashboard')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Categories</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #1f2937;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #ff69b4;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            text-align: center;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #ff69b4;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff85c5;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #ffca2c;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #e63946;
        }

        .alert-success {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #ff69b4;
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            height: 60px;
            width: auto;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>All Categories</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add Category</a>
        <form action="{{ route('category.show', 1) }}" method="get"> 
            <button type="submit" class="btn btn-primary mb-3">View Deleted Items</button>
        </form>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->category_name }}</td>
                        <td>{{ $cat->category_description }}</td>
                        <td><img src="{{ asset($cat->image) }}" alt="Category Image"></td>
                        <td>
                            <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-warning">Edit</a> 
                            <form action="{{ route('category.destroy', $cat->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
@endsection
