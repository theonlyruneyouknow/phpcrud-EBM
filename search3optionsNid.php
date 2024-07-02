    <html>
    <body>
        <?php
        // include '_buttonlinks.php'
        ?>
        <form action="phpSearchOptionNextId.php" method="post">
            Search <input type="text" name="search"><br>

            Column: <select name="column">
                <option value="alum_id" selected>Id</option>
                <option value="firstname">firstName</option>
                <option value="lastname">lastname</option>
            </select><br>
            <input type="submit">
        </form>

    </body>
</html>