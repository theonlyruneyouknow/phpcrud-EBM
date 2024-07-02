    <html>
    <body>
        <?php
        //  include_once 'functions.php';
        // include '_buttonlinks.php'
        
        ?>
        <!-- <?=template_header('Home')?> -->
        <form action="phpSearchOption.php" method="post">
            Search <input type="text" name="search"><br>

            Column: <select name="column">
                <option value="alum_id">Id</option>
                <option value="firstname">firstName</option>
                <option value="lastname" selected>lastname</option>
            </select><br>
            <input type="submit">
        </form>

    </body>
</html>