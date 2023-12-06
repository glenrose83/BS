<div>
        <div>
            <small><em>Basic Webshop v.1</em></small>
            
            <?php 
            $userinfo = get_userinfo($_SESSION['username'],$pdo); 
            ?>

           <br><small>Welcome <b><?php echo $userinfo['username']; ?></b><br>
            Webshopname: <b><?php echo $userinfo['shopname']; ?></b><br>
            Contact Email: <b><?php echo $userinfo['email']; ?></b></small><p></p><br>

        


            <h3 class="colortitle"><i>Menu</i></h3>

                <div class="box">
                    <a href="index.php">
                        <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#house-door"/>
                        </svg> Home</a><br>
                
                        
                    <a class="custom-menu" href="add_product.php">      
                        <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#box"/>
                        </svg> Add Product</a><br>

                        <a class="custom-menu" href="manage_products.php">
                    <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#pencil"/>
                        </svg> Manage products</a><br>

                        <a class="custom-menu" href="manage_categories.php">
                    <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#body-text"/>
                        </svg> Manage Categories</a><br>                        

                    <a class="custom-menu" href="orders.php">
                    <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#currency-dollar"/>
                        </svg> Orders</a><br>

                    <!-- <a class="custom-menu" href="customers.php">
                    <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#person-lines-fill"/>
                        </svg> Customers</a><br> -->

                    <a class="custom-menu" href="templates.php">
                    <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#file-earmark-image"/>
                        </svg> Templates</a><br>

                    <a class="custom-menu" href="settings.php">
                    <svg class="bi" width="12" height="12" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#gear"/>
                        </svg> Settings</a><p><br></p>
                    


                    <a class="custom-menu" href="logout.php">    
                    <svg class="bi" width="12" height="12" fill="currentColor">
                    <use xlink:href="bootstrap-icons.svg#box-arrow-right"/> </svg> Logout</a>
                </div>
            

        </div>
</div>