<div class="dashboard_sidebar" id="dashboard_sidebar">
    <h3 class="dashboard_logo" id="dashboard_logo">ClothCraft</h3>
    <div class="dashboard_sidebar_user">
        <img src="user/profilepic.jpg" alt="user image." id="userImage">
        <span><?= $employee['employee_name'] ?></span>
    </div>
    <div class="dashboard_sidebar_menus">
        <ul class="dashboard_menu_lists">
            <!-- class="menuActive" -->
            <li>
                <a href="./dashboard.php"><i class="fa fa-dashboard"></i><span class="menuText">Dashboard</span></a>
            </li>
            <li>
                <a href="./users-add.php"><i class="fa fa-user-plus"></i><span class="menuText">add Employees</span></a>
            </li>
            <li>
                <a href="./product-add.php"><i class="fa fa-tag"></i><span class="menuText">Add Products</span></a>
            </li>
            <li>
                <a href=""><i class="fa fa-book"></i><span class="menuText">Accounts Receivable</span></a>
            </li>
            <li>
                <a href=""><i class="fa fa-gears"></i><span class="menuText">Configuration</span></a>
            </li>
            <li>
                <a href=""><i class="fa fa-line-chart"></i><span class="menuText">Stats</span></a>
            </li>
        </ul>
    </div>
</div>