<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/sidenav.css">
    <title>Sidenav</title>
</head>
<body>
    <div class="sidenav" id="sidenav">
        <div  class="btn" onclick="toggleNav()" >&#9776</div>
        <div class="sidebody">
			<h2 style="padding: 5px; font-size: 20px; text-align:center;">Duka Inventory</h2>
			<img class="icon" src="../images/logo.png">
		</div>
        <ul>
            <li><a href="">Dashboard</a></li>
            <li><a class="dropdown-btn">Items<i class="fa fa-caret-down" style="float:right;"></i></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="item.php">Manage items</a></li>
                            <li><a href="newitem.php">Add item</a></li>
                        </ul>
                    </div>
            </li>
            <li><a class="dropdown-btn">Categories<i class="fa fa-caret-down" style="float:right;"></i></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="categories.php">Manage categories</a></li>
                            <li><a href="newcategory.php">Add category</a></li>
                        </ul>
                    </div>
            </li>
            <li><a class="dropdown-btn">Customers<i class="fa fa-caret-down" style="float:right;"></i></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="customer.php">Manage customers</a></li>
                            <li><a href="newcustomer.php">Add customer</a></li>
                        </ul>
                    </div>
            </li>
            <li><a href="sales.php">Sales</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a class="dropdown-btn">Users<i class="fa fa-caret-down" style="float:right;"></i></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="user.php">Manage users</a></li>
                            <li><a href="newuser.php">Add user</a></li>
                        </ul>
                    </div>
            </li>

        </ul>
        <div class="footer-bottom">
			&copy; dukamanagement 2019
		</div>
    </div>
    <script>
        function toggleNav(){
            document.getElementById('sidenav').classList.toggle('active');
        }
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
        });
        }
    </script>
</body>
</html>
