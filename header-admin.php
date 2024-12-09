<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PCAll</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Arial", sans-serif;
        background-color: #f8f9fa;
        min-height: 200px;
        display: flex;
        flex-direction: column;
      }

      .navbar {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .sidebar {
        margin-top: 140px;
        margin-left:40px;
        height:500px ;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #343a40;
        color: white;
      }

      .sidebar a {
        color: white;
        font-weight: 500;
        margin-bottom: 15px;
        padding: 10px 10px;
        text-decoration: none;
        display: block;
        border-radius: 5px;
        transition: background-color 0.2s ease, transform 0.2s ease;
      }

      .sidebar a:hover {
        background-color: #495057;
        transform: translateX(5px);
      }

      .main-content {
        margin-left: 200px;
        padding: 20px;
      }

      .welcome-card {
        margin-top: 125px;

        background-color: white;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
      }

      .welcome-card h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: #212529;
      }

      .welcome-card p {
        font-size: 1.2rem;
        color: #6c757d;
      }

      footer {
        margin-left: 200px;
      }
    </style>
  </head>
  <body>
        <div class="sidebar shadow-lg">
          
          <h4 class="px-4">Menu</h4>
          <a href="admin.php"><i class="bi bi-house-door-fill mx-1"></i>Dashboard</a>
          <a href="manage_product.php"><i class="bi bi-box-seam mx-1"></i>Manage Products</a>
          <a href="manage_users.php"><i class="bi bi-people mx-1"></i>Manage Users</a>
          <a href="logout.php"><i class="bi bi-box-arrow-right mx-1"></i>logout</a>
        </div>

        