<<<<<<< HEAD
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container-fluid">
      <div class="jumbotron">
          <h1 class="display-4">Hello, world!</h1>
          <p class="lead">Я Усманов Ильдар. На этой странице я буду размещать выполненные домашние задания курса по PHP.</p>
          <hr class="my-4">
          <!--
          <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          -->
      </div>


      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Задание №1</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Задание №2</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Задание №3</a>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><?php require "./modules/lesson-1.php" ?></div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <form name="test" action="./modules/lesson-2/check.php" method="post" >
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">Введите текст</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text_area"></textarea>
                  </div>
                  <div class="form-group">
                      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                  </div>
                  <button type="submit" class="btn btn-primary" name="done">Отправить</button>
              </form>




          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
=======
<?php

class Get_word_Reiteration{
    public function __construct($text){
        # Формируем массив из слов на основании текста. Делитель - пробельный символ
        $words_array = $this ->get_array_from_text($text);
        # Исключаем повторение слов из массива
        $uniq_words_array = $this->get_uniq_word_array($words_array);
        # Выводим количество слов путем подсчета элементов массива
        echo "Количество слов в предложениях: " . (count($words_array)) . "<br>";
        #  Получаем количество повторений слов в тексте.
        $this->get_reiteration_all_words($words_array, $uniq_words_array);
    }

    public function get_array_from_text($text){
        $words_array = explode(" ", $text);
        return $words_array; }
    public function get_uniq_word_array($words_array){
        $uniq_array = array();
        foreach ($words_array as $item){
            # Удаляем мусор
            $word = preg_replace ("/[^a-zA-ZА-Яа-я0-9\s]/u","",$item);
            if (in_array($word, $uniq_array)) {
                continue;
            } else{
                array_push($uniq_array, $word);
            }
        } return $uniq_array;
    }
    public function get_word_count_in_array($word, $words_array){
        $reiteration = 0;
        foreach ($words_array as $item){
            if ($item === $word) {
                $reiteration ++;
            }else{
                continue;
            }
        }
        return $reiteration;
    }

public function get_reiteration_all_words($words_array, $uniq_array){
        foreach ($uniq_array as $word){
            $count = $this->get_word_count_in_array($word, $words_array);
            echo $word . ' : ' . $count . "<br>";
        }
    }
}
$text = "Исследователи из Nielsen Norman Group заявляют, что 8 из 11 человек быстро пролистывают материал и прочитывают в нем только 28% слов. Это называется скимминг: например, я достаю телефон и проскроливаю страницу, чтобы понять, стоит ее читать или нет. Поэтому структура текста должна быть понятной, а в самом тексте должны быть расставлены акценты. Если человек прочитал не всю статью, но нашел в ней ответ на свой вопрос, — это означает, что вы хорошо сделали свою работу. Доскроллы — это важно, но не нужно на них зацикливаться. Статья о Бали на сайте Here Magazine разбита на понятные главы: где остановиться, где поесть, как долететь. Если человек ни разу не был на Бали, он захочет прочитать статью полностью. Если был и собирается снова, его может заинтересовать конкретный раздел — например, где остановиться.";
new Get_Word_Reiteration($text);
>>>>>>> 3195422ca526ab574b12e7ae1ab5cbe23c7d7da7
