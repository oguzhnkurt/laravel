<!-- resources/views/emails/product.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Email</title>
</head>
<body>
    <h1>Product Information</h1>
    
    <p>
        Thank you for your interest in our product. Here are the details:
    </p>
    
    <ul>
        <li><strong>Title:</strong> {{ $product->title }}</li>
        <li><strong>Description:</strong> {{ $product->description }}</li>
        <!-- Add more details as needed -->
    </ul>
    
    <p>
        If you have any questions, feel free to contact us.
    </p>
</body>
</html>
