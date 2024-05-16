<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad de Marina Mercante</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar, .right-sidebar {
            height: 100vh;
            background-color: #fff;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
        }
        .sidebar {
            width: 220px;
            left: 0;
        }
        .right-sidebar {
            width: 200px;
            right: 0;
            border-left: 1px solid #ddd;
        }
        .sidebar .profile {
            text-align: center;
            padding: 20px;
        }
        .sidebar .profile img {
            border-radius: 50%;
            width: 100px;
        }
        .sidebar .profile h4 {
            margin-top: 10px;
        }
        .sidebar a, .right-sidebar a {
            color: #333;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .right-sidebar a:hover {
            background-color: #f1f1f1;
        }
        .sidebar .active {
            background-color: #e9ecef;
            font-weight: bold;
        }
        .main-content {
            margin-left: 220px;
            margin-right: 200px;
            padding: 20px;
        }
        .search-bar {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-bar input {
            flex-grow: 1;
            margin-right: 10px;
        }
        .table-container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <img src="https://via.placeholder.com/100" alt="User">
            <h4>Nombre de personal</h4>
        </div>
        <a href="#" class="active">Title</a>
        <div class="table-container">
            <h5>Usuario</h5>
            <table class="table table-borderless">
                    <tr>
                        <th>subtítulo</th>
                        <td>dato</td>
                    </tr>
                    <tr>
                        <th>subtítulo</th>
                        <td>dato</td>
                    </tr>
                    <tr>
                        <th>subtítulo</th>
                        <td>dato</td>
                    </tr>
            </table>
            <button class="btn btn-danger btn-block">Salir</button>
        </div>
    </div>
    <div class="main-content">
        <div class="search-bar">
            <h2>Title</h2>
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn btn-outline-secondary"><i class="fas fa-filter"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Title</th>
                        <th>Project</th>
                        <th>Priority</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>FIG-121</td>
                        <td>Write blog post for demo day</td>
                        <td>Acme GTM</td>
                        <td><span class="badge badge-danger">High</span></td>
                    </tr>
                    <tr>
                        <td>FIG-122</td>
                        <td>Publish blog page</td>
                        <td>Website launch</td>
                        <td><span class="badge badge-secondary">Low</span></td>
                    </tr>
                    <tr>
                        <td>FIG-123</td>
                        <td>Add gradients to design system</td>
                        <td>Design backlog</td>
                        <td><span class="badge badge-warning">Medium</span></td>
                    </tr>
                    <tr>
                        <td>FIG-124</td>
                        <td>Responsive behavior doesn’t work</td>
                        <td>Bug fixes</td>
                        <td><span class="badge badge-warning">Medium</span></td>
                    </tr>
                    <tr>
                        <td>FIG-125</td>
                        <td>Confirmation states not rendering</td>
                        <td>Bug fixes</td>
                        <td><span class="badge badge-warning">Medium</span></td>
                    </tr>
                    <tr>
                        <td>FIG-126</td>
                        <td>Revise copy on the About page</td>
                        <td>Website launch</td>
                        <td><span class="badge badge-secondary">Low</span></td>
                    </tr>
                    <tr>
                        <td>FIG-127</td>
                        <td>Text wrapping is awkward on mobile</td>
                        <td>Bug fixes</td>
                        <td><span class="badge badge-secondary">Low</span></td>
                    </tr>
                    <tr>
                        <td>FIG-128</td>
                        <td>Publish HackerNews post</td>
                        <td>Acme GTM</td>
                        <td><span class="badge badge-secondary">Low</span></td>
                    </tr>
                    <tr>
                        <td>FIG-129</td>
                        <td>Review image licensing for blog</td>
                        <td>Website Launch</td>
                        <td><span class="badge badge-danger">High</span></td>
                    </tr>
                    <tr>
                        <td>FIG-130</td>
                        <td>Accessibility focused state for buttons</td>
                        <td>Design backlog</td>
                        <td><span class="badge badge-danger">High</span></td>
                    </tr>
                    <tr>
                        <td>FIG-131</td>
                        <td>Header IA revision to support a11y</td>
                        <td>Design backlog</td>
                        <td><span class="badge badge-danger">High</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="right-sidebar">
        <div class="sidebar-header text-center p-3">
            <h4>Music app</h4>
        </div>
        <div class="sidebar-content">
            <a href="#">Discover</a>
            <a href="#" class="active">Home</a>
            <a href="#">Browse</a>
            <a href="#">Radio</a>
            <h5 class="px-3 pt-3">Library</h5>
            <a href="#">Playlists</a>
            <a href="#">Songs</a>
            <a href="#">Personalized picks</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
