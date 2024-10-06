<?php 

class Misc {

        public static function alert(){

            if(isset($_GET['status'])){
                
                if ("changed" == $_GET['status']){             
                    return "<div class='alert alert-info half-width' role='alert'>The status was changed</div>";

                }   elseif("product_added" == $_GET['status']){
                    return "<div class='alert alert-info half-width' role='alert'>A new product was added</div>";

                }   elseif("product_deleted" == $_GET['status']){
                    return "<div class='alert alert-danger half-width' role='alert'>A product was deleted</div>";

                }   elseif("picture_deleted" == $_GET['status']){
                        return "<div class='alert alert-danger half-width' role='alert'>The picture was deleted</div>";
                       
                }   elseif("product_changed" == $_GET['status']){
                    return "<div class='alert alert-info half-width' role='alert'>The product was changed</div>";

                }   elseif("password_updated" == $_GET['status']){
                    return "<div class='alert alert-info half-width' role='alert'>Password updated</div>";
                
                }   elseif("info_updated" == $_GET['status']){  
                    return "<div class='alert alert-info half-width' role='alert'>Info updated</div>";

                }   elseif("onlyone" == $_GET['status']){
                    return "<div class='alert alert-danger half-width' role='alert'>UPS.... You can only have one active currency</div>";
                }                       
                
            }

            
        }

}


?>