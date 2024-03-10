<!-- views/edit_answer_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Answer</title>
</head>
<body>
    <h1>Edit Answer</h1>

    <?php echo form_open('profileController/updateAnswer/' . $answer['answer_id']); ?>

    <label for="content">Content:</label>
    <textarea name="content" required><?php echo $answer['content']; ?></textarea>

    <input type="submit" value="Update Answer">

    <?php echo form_close(); ?>
</body>
</html>
