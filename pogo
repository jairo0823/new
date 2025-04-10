<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        
        .container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #007bff;
            text-align: center;
        }
        
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #f0f0f0;
        }
        
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
            color: white;
        }
        
        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .btn-success:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Library Management System</h2>
    
    <h3 class="mt-4">Add Books</h3>
    <form action="<?= site_url('Library/add') ?>" method="post" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="author" class="form-control" placeholder="Author" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="published_year" class="form-control" placeholder="Year" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn-custom w-100">Add</button>
            </div>
        </div>
    </form>

    <h3>Book List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>  
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book) { ?>
            <tr>
                <td><?= $book['id']; ?></td>
                <td><?= $book['title']; ?></td>
                <td><?= $book['author']; ?></td>
                <td><?= $book['published_year']; ?></td>
                <td><?= $book['status']; ?></td>
                <td>
                    <?php if ($book['status'] == 'Available') { ?>
                        <a href="<?= site_url('library/borrow/' . $book['id']) ?>" class="btn btn-success btn-sm">Borrow</a>
                    <?php } else { ?>
                        <form action="<?= site_url('library/return/' . $book['id']) ?>" method="post">
                            <button type="submit" class="btn btn-success btn-sm">Return</button>
                        </form>
                    <?php } ?>
                    <a href="<?= site_url('library/delete/' . $book['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
