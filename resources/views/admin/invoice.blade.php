<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .pdf-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="pdf-container">
    <div class="header">
        <h2>Order Info</h2>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <strong>ID:</strong> <span id="id">{{$order->id}}</span>
            </div>
            <div class="col-md-6">
                <strong>Name:</strong> <span id="name">{{$order->name}}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <strong>Recipient Address:</strong> <span id="recipientAddress">{{$order->product->description}}</span>
            </div>
            <div class="col-md-6">
                <strong>Phone:</strong> <span id="phone">{{$order->phone}}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <strong>Product Name:</strong> <span id="productName">{{$order->product->title}}</span>
            </div>
            <div class="col-md-6">
                <strong>User ID:</strong> <span id="userId">{{$order->user->id}}</span>
            </div>
        </div>

        <div class="row image-container">
            <div class="col-md-12">
                <!-- <strong>Image:</strong> <img id="image" src="products/{{$order->product->image}}" alt="Product Image"> -->
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Your Company Name. All rights reserved.</p>
    </div>
</div>

</body>
</html>