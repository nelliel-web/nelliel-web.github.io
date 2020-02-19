<?php

const PICTURE = 80;
const PICTURE_FLOM = 23;
const PICTURE_PENCIL = 40;

$picture_craski = PICTURE - (PICTURE_FLOM + PICTURE_PENCIL);


echo '<b>Дано:</b><br>На школьной выставке <b>' . PICTURE . '</b> рисунков. <b>' . PICTURE_FLOM . '</b> из них выполнены фломастерами, <b>' . PICTURE_PENCIL . '</b> карандашами, а остальные — красками.<br>Сколько рисунков, выполненные красками, на школьной выставке?';
echo '<br><br><b>Решение:</b><br>';
echo PICTURE . ' - (' . PICTURE_FLOM . ' + ' . PICTURE_PENCIL . ') = ' . $picture_craski;
echo '<br><br><b>Ответ:</b> <br> На школьной выставке <b>' . $picture_craski . '</b> картин нрисованных красками.';
