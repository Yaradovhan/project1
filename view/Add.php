<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
</head>
<body>
<h2>Header</h2>
<hr>
<form method="POST" action="/model/AddTask.php">
    <table width="450px">
        <tr>
            <td valign="top">
                <label for="name">Name *</label>
            </td>
            <td valign="top">
                <input type="text" name="user[name]" maxlength="50" size="30" value="">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="email">Email *</label>
            </td>
            <td valign="top">
                <input type="text" name="user[email]" maxlength="80" size="30">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="comments">Text *</label>
            </td>
            <td valign="top">
                <textarea name="task[text]" maxlength="1000" cols="29" rows="6"></textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="comments">Image *</label>
            </td>
            <td valign="top">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
                <input name="img" type="file"/>
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