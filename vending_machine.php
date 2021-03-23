<html>
    <head>
        <title> Assignment 4 - Vending Machine</title>
    </head>
    <body>
    <?php 
        include("class.php");
    ?>
    <?php

        // start a session
        session_start();

        //Initialize Sessions values to 0
        $_SESSION['total_amount'] = $_SESSION['total_amount'] ?? 0;
        $_SESSION['paid_payment'] = $_SESSION['paid_payment'] ?? 0;
       


        function updateSessionValues(){

            if(isset($_SESSION['total_amount'])){
                //User Pays the extra Amount **********
                if($_SESSION['total_amount'] != 0 && $_SESSION['paid_payment'] > $_SESSION['total_amount']){
                    echo "<p><strong style='color:#03506f'>You paid an Extra amount of $".$_SESSION['paid_payment']-$_SESSION['total_amount']."</strong>!<br/></p>";
                }//User Pays full Amount *********
                else if($_SESSION['total_amount'] != 0 && $_SESSION['paid_payment'] == $_SESSION['total_amount']){
                    echo "<p><strong style='color:#03506f'>Successful Payment </strong> Enjoy your meal.<br/></p>";
                }//If the total Amount is greater then 0
                else if($_SESSION['total_amount'] > 0){
                    if($_SESSION['paid_payment'] < $_SESSION['total_amount']){
                        echo "<p><strong style='color:#03506f'>The Amount Remaining to Pay $".$_SESSION['total_amount']-$_SESSION['paid_payment']."</strong><br/></p>";
                    }
                    echo "<p><strong style='color:#03506f'>Total Amount is $".$_SESSION['total_amount']."<br/></p>";
                }

                if($_SESSION['total_amount'] == 0 && $_SESSION['paid_payment'] > $_SESSION['total_amount']){
                    echo "<p><h3 style='color:#5b6d5b'> Please Select the Product First </h3></p>";
                    $_SESSION['paid_payment'] = 0;
                }
            }

        }
        
        //  unset($_SESSION['total_amount']);
        //  unset($_SESSION['paid_payment']);


        if ($_SERVER['REQUEST_METHOD'] == "POST"){
        
            //Get the Pop from class vending machine
            if(isset($_POST['pop']))
            {
                $item_selected = $_POST['pop'];
                echo "<p style='color:blue'> You have selected <strong>".$item_selected."</strong></p>";
                $name_item = $item->get_available_items();
                extract($name_item);
                echo "<p style='color:blue'> Pay "."<strong>$ ".$pop."</strong>"." to get your ".$item_selected."</p>";
                $_SESSION['total_amount'] += $pop;
                
                            
            }

            //Get the bars from class vending machine
            if(isset($_POST['bars']))
            {
                $item_selected = $_POST['bars'];
                echo "<p style='color:blue'> You have selected <strong>".$item_selected."</strong></p>"; 
                $name_item = $item->get_available_items();
                extract($name_item);
                echo "<p style='color:blue'> Pay "."<strong>$ ".$bars."</strong>"." to get your ".$item_selected."</p>";
                $_SESSION['total_amount'] += $bars;
                
            }

            //Get the chips from class vending machine
            if(isset($_POST['chips']))
            {
                $item_selected = $_POST['chips'];
                echo "<p style='color:blue'> You have selected <strong>".$item_selected."</strong></p>"; 
                $name_item= $item->get_available_items();
                extract($name_item);
                echo "<p style='color:blue'> Pay "."<strong>$ ".$chips."</strong>"." to get your ".$item_selected."</p>";
                $_SESSION['total_amount'] += $chips;
            }

            //check if post data is coming in
            //if it is coming in, then set that as your amount_paid
            if(array_key_exists('1', $_POST)){ 

                $_SESSION['paid_payment'] += 1;
                updateSessionValues();
            }
        
            if(array_key_exists('5', $_POST)){ 
                
                $_SESSION['paid_payment'] += 0.05;
                updateSessionValues();
            } 
            if(array_key_exists('10', $_POST)) {
            
                $_SESSION['paid_payment'] += 0.10;
                updateSessionValues(); 
            } 
            if(array_key_exists('25', $_POST)) { 
            
                $_SESSION['paid_payment'] += 0.25;
                updateSessionValues();
            } 

            if(array_key_exists('clear', $_POST)) { 
                $_SESSION['paid_payment'] = 0;
                $_SESSION['total_amount'] = 0;
                updateSessionValues();
            } 

        }
    ?>

        
       
         <!--
         Method to call public variables    

         $name_bar = $item->availableItems["bars"];
         echo $name_bar.'<br>';
         echo '<script>console.log($name_bar);</script>';
         $name_pop = $item->availableItems["pop"];
         echo $name_pop.'<br>';
         $name_chips = $item->availableItems["chips"];
         echo $name_chips.'<br>';

    ?>  -->


        <form method="post" action="vending_machine.php">
            <div style="border-style:double; padding:30px; width:25%;">
                <h2 style='color:#383e56'> Choose Item To Buy </h2>
                <?php
                    $all_items = $item-> get_available_items();
                    //Display Items from Class using Key Value Pair.
                    foreach($all_items as $key => $value){
                        echo '<input style="color:#2b2e4a" type="submit" name="'.$key.'" value="'.$key.'" /> ';
                    }
                ?>
                <h2 style='color:#383e56'> Make A Payment </2>
                <p><input type="submit" value="1 Dollar" name="1"/> 
                <input type="submit" value="25 Cents" name="25"/> 
                <input type="submit" value="10 Cents" name="10"/> 
                <input type="submit" value="5 Cents" name="5"/> </p>
                <p><input type="submit" value="Reset" name="clear"/></p> 
            </div>



            <!-- <div><p>Choose your fav food</p>
                <form action="vending_machine.php">
                    <input type="submit" name="bars" value="Chocolate Bars $1.25 " onclick="bars" />
                    <input type="submit" name="pop" value="Pop $1.50 " onclick="pop" />
                    <input type="submit" name="chips" value="Chips $1.75 " onclick="chips" />
                </form>
            </div>
            <div><p>Make Your payment</p>
                <form action="vending_machine.php">
                    <input type="submit" name="1" value="1Doller" onclick="dollar" />
                    <input type="submit" name="25" value="25Cents " onclick="quarters" />
                    <input type="submit" name="10" value="10Cents " onclick="dimes" />
                    <input type="submit" name="5" value="5Cents " onclick="nickles" />
                </form>
            </div> -->

        </form>
    </body>
</html>