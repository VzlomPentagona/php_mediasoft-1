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
