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
<form id="form" method="POST" action="../model/AddTask.php" enctype="multipart/form-data">


<table>
    <div width="450px">
    <tbody id="dialog">
        <tr>
            <td valign="top">
                <label for="name">Name *</label>
            </td>
            <td valign="top">
                <input class="inp" type="text" name="user[name]" maxlength="50" size="44" value="">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="email">Email *</label>
            </td>
            <td valign="top">
                <input class="inp" type="text" name="user[email]" maxlength="80" size="44">
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="comments">Text *</label>
            </td>
            <td valign="top">
                <textarea class="inp" name="task[text]" maxlength="1000" cols="45" rows="6"></textarea>
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
    </tbody>
        <tr>
            <td colspan="2" style="text-align:left">
                <input type="submit" value="Add Task">
            </td>
        </tr>
    </table>

    <button id="pr-view">Previous view</button>
</form>
<hr>
<h3>Footer</h3>
</body>
</html>

<div id="dialog">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">

<script type="text/javascript">

    $(document).ready(function(){

        $('#pr-view').click(function (e) {
            e.preventDefault();

            $('.inp').each(function(i, item){
                $(item).attr('readonly', 'readonly')
            })

            $('#dialog').dialog({width:300, height:400});
        })
    })

</script>