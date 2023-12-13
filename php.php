<html>
    <body>
        <table border=1 cellpadding=0 cellspacing=0>
            <tr>
                <td>
                    <form action="save.php" method="get">
                        Name: <input type="text" name="txtname"><br><br>
                        Age: <input type="number" name="txtage">
                        <input type="submit" value="Save">
                        <input type="button" value="Print" target="_blank" onclick="window.location.href='pdf.php'">
                    </form>
                </td>
            </tr>
        </table>
        <br>
        <!--pag iinsert ng value-->
        <div>
            <table cellpadding=0 cellspacing=0 border=1 width=400>
                <tr align="center"><th>Delete</th><th>Edit</th><th>Name</th><th>Age</th></tr>
                <?php
                $conn=new mysqli("localhost","root","","try");
                $result = $conn->query("select * from tbltry");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr align='center'>
                        <td><a href=delete.php?txtname={$row['Name']}><input type=button value=Delete></a></td>
                        <td><input type=button value=Edit onclick=\"populateForm('{$row['Name']}', {$row['Age']})\"></td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Age']}</td>
                        </tr>";
                }
                ?>
            </table>
        </div>

        <!--form pna lalabas pag pinindut ang edit-->
        <form id="editForm" action="edit.php" method="post" style="display:none;">
            Old Name: <input type="text" name="old_name" id="old_name" readonly><br><br>
            Name: <input type="text" name="txtname" id="txtname"><br><br>
            Age: <input type="number" name="txtage" id="txtage">
            <input type="submit" value="Save">
            <input type="button" value="Cancel" onclick="document.getElementById('editForm').style.display = 'none';">
        </form>


        <!--JS para ma edit-->
        <script>
            function populateForm(name, age) {
                document.getElementById('editForm').style.display = 'block';
                document.getElementById('old_name').value = name;
                document.getElementById('txtname').value = name;
                document.getElementById('txtage').value = age;
            }
        </script>
    </body>
</html>