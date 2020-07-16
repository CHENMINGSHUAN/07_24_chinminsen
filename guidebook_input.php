  <?php
    session_start();


    //共通関数の読込
    // データベース接続
    include('functions.php');
    //DB接続
    $pdo = connect_to_db();
    // データ取得SQL作成
    $sql = 'SELECT * FROM guidebook';

    //users_tableのidをposts_tableに入れる
    $id = $_SESSION['id'];
    //   var_dump($id);

    ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
          .input_whole {
              display: flex;
              align-items: center;
              justify-content: center;
              flex-direction: column;
          }

          .input_text {
              display: flex;
              align-items: center;
              justify-content: center;
              flex-direction: column;
          }

          .input_text1 {
              display: flex;
              align-items: center;
              justify-content: center;
          }
      </style>
      <script src='https://cdn.tiny.cloud/1/5djdip14aks0a4ln0q7wr1vy9klw9t67cwa2df8xsqby1uay/tinymce/5/tinymce.min.js' referrerpolicy="origin">
      </script>
      <script>
          tinymce.init({
              selector: '#mytextarea'
          });
      </script>
  </head>

  <body>
      <div class="input_whole">
          <h1>Write Your Guide Book</h1>
          <form action="guidebook_create.php" method="POST" id="form" enctype="multipart/form-data">
              <div class="input_text1">
                  <label for="title">title</label><input type="text" name="title">
                  <label for="date">date</label><input type="date" name="date">
              </div>
              <div class="input_text">
                  <label for="schedule">schedule<input type="textarea" name="schedule"></label>
                  <div class="form_1colmun">
                      <div class="form_input">
                         
                              <input id="img" type="file" name="img" placeholder="画像ファイルを選択">
                              <span id="img_error" class="error_msg"></span>
                      </div>
                  </div>
                 
              </div>
              <textarea id="mytextarea" rows="30" cols="90" name="text"></textarea>

              <input type="hidden" name="user_id" value="<?= $id ?>">
              <input type="submit" name="submit">
      </div>
      </div>
      </form>
  </body>

  </html>