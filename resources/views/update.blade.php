<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<!-- edit-book.blade.php -->", initial-scale=1.0>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $book->title }}" required>

    <label for="price">Price</label>
    <input type="text" name="price" value="{{ $book->price }}" required>

    <label for="description">Description</label>
    <textarea name="description" required>{{ $book->description }}</textarea>

    <button type="submit">Update</button>
</form>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
