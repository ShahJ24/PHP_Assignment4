<html>
    <head>
        <title> Assignment 4 </title>
    </head>
    <body>
        <div><p>Choose your fav food</p>
            <form action="vending_machine.php">
                <input type="submit" name="bars" value="Chocolate Bars $1.25 " onclick="bars()" />
                <input type="submit" name="pop" value="Pop $1.50 " onclick="pop()" />
                <input type="submit" name="chips" value="Chips $1.75 " onclick="chips()" />
            </form>
        </div>
        <div><p>Make Your payment</p>
            <form action="vending_machine.php">
                <input type="submit" name="dollar" value="1 Doller " onclick="dollar()" />
                <input type="submit" name="quarters" value="25 Cents " onclick="quarters()" />
                <input type="submit" name="dimes" value="10 Cents " onclick="dimes()" />
                <input type="submit" name="nickles" value="5 Cents " onclick="nickles()" />
            </form>
        </div>


    </body>
</html>