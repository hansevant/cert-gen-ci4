<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hacker Login</title>
  <style>
    body {
      background-color: #000;
      color: #0F0;
      font-family: 'Courier New', Courier, monospace;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background-color: #111;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 255, 0, 0.8);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 240px;
      padding: 8px;
      margin-bottom: 16px;
      background-color: #222;
      color: #0F0;
      border: 1px solid #0F0;
      border-radius: 5px;
    }

    button {
      background-color: #0F0;
      color: #000;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #090;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Apakah anda robot?</h2>
    <form action="" method="POST">


      <label for="answer"><?= $question?> Berapa?</label>
      <input type="text" id="username" name="question" value=<?= $question?> hidden>
      <input type="text" id="answer" name="answer">

        <br>
      <button type="submit" name="submit">Submit</button>
        <?php if(session()->getFlashdata()) {?>
            <span style="color:#F00"><?php echo session()->getFlashdata('error');?></span>
        <?php } else { ?>
            <span><?php echo session()->getFlashdata('keluar');?></span>
        <?php } ?>
    </form>
  </div>
</body>
</html>
