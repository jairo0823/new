<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Library Management System</h2>
    <h3>Book List</h3>
    <br>
<h3>Add Book</h3>
<form action="<?=site_url('library/add')?>" method ="post">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="text" name="published_year" placeholder="Year" required>
    <button type="submit">Add</button>
</form>   
<br>
<br>
 <table border="1">
        <thead><tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>YEAR</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr></thead>

        <tbody>
            <?php foreach ($books as $book) { ?>
            <tr>
                <td><?= $book['id']; ?></td>
                <td><?= $book['Title']; ?></td>
                <td><?= $book['Author']; ?></td>
                <td><?= $book['Published_year']; ?></td>
                <td><?= $book['Status']; ?></td>
                <td> 
                    <?php if ($book['Status'] == 'Available'){ ?>
                    <a href="<?= site_url('library/borrow/' .$book['id']) ?>">Borrow</a>
                    <?php } else {?>
                    <a href="<?=site_url('library/return_book/' .$book['id']) ?>">Return</a>
                <?php } ?>
                    </td>
                <td><a href="<?= site_url('library/delete/' . $book['id']) ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>

</html>