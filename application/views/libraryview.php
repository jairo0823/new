<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('asets/dataTables.dataTables.min.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f5f5dc; /* Beige background */
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fffaf0; /* Lighter beige */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e6dcc6;
        }
        .header-content {
            display: flex;
            flex-direction: column;
        }
        .welcome-message {
            color: #7c6f57;
            font-size: 1.1rem;
            margin-top: 5px;
            font-weight: 500;
        }
        .form-container {
            background-color: #fdf6e3;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .form-container h3 {
            color: #7c6f57;
            margin-bottom: 20px;
        }
        .form-group label {
            color: #5e503f;
        }
        .btn-primary {
            background-color: #d8c3a5;
            border: none;
            color: #3e3e3e;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #c4ad8f;
        }
        .table-container {
            margin-top: 30px;
        }
        .table {
            background-color: #fffaf0;
        }
        .action-btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
            display: inline-block;
            transition: all 0.3s ease;
            background-color: #e4d8c4;
            color: #3e3e3e !important;
        }
        .action-btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }
        .borrow-btn,
        .return-btn,
        .delete-btn {
            background-color: #e4d8c4;
        }
        .logout-btn {
            background-color: #b8a48a;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #a29278;
        }
        .alert {
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f9f3e4;
            color: #6b5e4d;
            border: 1px solid #e0d7c3;
        }
        .book-status {
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: 500;
            display: inline-block;
            background-color: #ede3d2;
            color: #5e503f;
        }
        .nav-buttons {
            display: flex;
            gap: 10px;
        }
        .btn-nav {
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        .btn-nav:hover {
            transform: translateY(-2px);
        }
        .btn-history,
        .btn-logout {
            background-color: #b8a48a;
        }
    </style>
    <script type="text/javascript" charset="utf8" src="<?=base_url('asets/jquery-3.7.1.min.js');?>"></script>
    <script type="text/javascript" charset="utf8" src="<?=base_url('asets/dataTables.min.js');?>"></script>
    <script>
        $(document).ready(function() {
            $('#booktable').DataTable({
                responsive: true
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <h1>Library Management System</h1>
                <div class="welcome-message">
                    <i class="fas fa-smile"></i> Welcome, <?= htmlspecialchars($user['name']); ?>!
                </div>
            </div>
            <div class="nav-buttons">
                <a href="<?=site_url('library/transactions') ?>" class="btn-nav btn-history">
                    <i class="fas fa-list-alt"></i> Transaction History
                </a>
                <a href="<?=site_url('auth/logout') ?>" class="btn-nav btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fas fa-times-circle"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <h3><i class="fas fa-plus-circle"></i> Add a New Book</h3>
            <form action="<?= site_url('library/add'); ?>" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="published_year">Published Year:</label>
                            <input type="number" class="form-control" id="published_year" name="published_year" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-book"></i> Add Book
                </button>
            </form>
        </div>

        <div class="table-container">
            <h2><i class="fas fa-book-open"></i> Book List</h2>
            <table id="booktable" class="table table-striped table-bordered">
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
                    <?php foreach($books as $book): ?>
                    <tr>
                        <td><?= $book['id'];?></td>
                        <td><?= $book['title'];?></td>
                        <td><?= $book['author'];?></td>
                        <td><?= $book['published_year'];?></td>
                        <td>
                            <span class="book-status <?= $book['status'] == 'available' ? 'status-available' : 'status-borrowed' ?>">
                                <?= ucfirst($book['status']); ?>
                            </span>
                            <?php if ($book['status'] == 'available'){?>
                                <a href="<?=site_url('library/borrow/'. $book['id']);?>" class="action-btn borrow-btn">
                                    <i class="fas fa-handshake"></i> Borrow
                                </a>
                            <?php } else { ?>
                                <a href="<?=site_url('library/return_book/'. $book['id']);?>" class="action-btn return-btn">
                                    <i class="fas fa-undo-alt"></i> Return
                                </a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?=site_url('library/delete/'. $book['id']);?>" class="action-btn delete-btn">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
