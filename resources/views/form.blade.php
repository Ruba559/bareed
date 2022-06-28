<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .radius-20{
                border-radius: 20px
            }
        </style>
    </head>
    <body>
    

          <div class="container p-5">
<form action="post_form_reply" method="POST">
    @csrf
<label>like<input name="like" type="checkbox"></label><br>
<label>comment<input  name="comment" type="checkbox"></label><br>
<label>message<input name="message" type="checkbox"></label><br>
<label>name<input name="name" type="text"></label><br>
<select class="form-select" name="type" aria-label="type">
    <option value="text" selected>text</option>
    <option value="image">image</option>
  </select>
  <label>message reply<input name="message_reply" type="text"></label><br>
  <label>comment reply<input name="comment_reply" type="text"></label><br>

</div>
     <label> send <button type="submit"></button></label>
</form>
</body>
</html>
