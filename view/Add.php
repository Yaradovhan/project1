<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
</head>
<body>
<h2>Header</h2>
<a href="<?=HOME;?>">Home page</a>

<hr>
<form method="POST" action="../model/AddTask.php" enctype="multipart/form-data">
    <table width="450px">
        <tr>
            <td valign="top">
                <label for="name">Name *</label>
            </td>
            <td valign="top">
                <input type="text" name="user[name]" maxlength="50" size="44" value="">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="email">Email *</label>
            </td>
            <td valign="top">
                <input type="text" name="user[email]" maxlength="80" size="44">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="comments">Text *</label>
            </td>
            <td valign="top">
                <textarea name="task[text]" maxlength="1000" cols="45" rows="6"></textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="comments">Image *</label>
            </td>
            <td valign="top">
                <input name="img" type="file">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:left">
                <input type="submit" value="Add Task">
            </td>
        </tr>
    </table>
</form>
<hr>
<h3>Footer</h3>
</body>
</html>