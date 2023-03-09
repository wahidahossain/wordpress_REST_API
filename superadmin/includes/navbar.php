
<?php
if($account_type=='superadmin'){
?> 
<!-- start admin navbar -->

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
            <li class="nav-header"></li>           
                <li class="nav-item">
                  <a href="dashboard.php" class="nav-link">
                    <i class="fas fa fa-power-off"></i>
                    <p> All New Orders</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../model/logout.php" class="nav-link">
                    <i class="fas fa fa-power-off"></i>
                    <p> Logout</p>
                  </a>
                </li>          
              </ul>
            </nav>
            <?php } ?>