<?php

/*
* Задание Урока 4.
*  Вы проектируете интернет магазин. Посетитель на вашем сайте создал
*  следующий заказ (цена, количество в заказе и остаток на складе генерируются автоматически):
 */
$ini_string='
[игрушка мягкая мишка белый]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
[одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
[игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
';
$bd=  parse_ini_string($ini_string, true);
//print_r($bd);

/*
 *
 * - Вам нужно вывести корзину для покупателя, где указать:
 * 1) Перечень заказанных товаров, их цену, кол-во и остаток на складе
 * 2) В секции ИТОГО должно быть указано: сколько всего наименовний было заказано, каково общее количество товара, какова общая сумма заказа
 * - Вам нужно сделать секцию "Уведомления", где необходимо извещать покупателя о том, что нужного количества товара не оказалось на складе
 * - Вам нужно сделать секцию "Скидки", где известить покупателя о том, что если он заказал "игрушка детская велосипед" в количестве >=3 штук, то на эту позицию ему
 * автоматически дается скидка 30% (соответственно цены в корзине пересчитываются тоже автоматически)
 * 3) у каждого товара есть автоматически генерируемый скидочный купон diskont, используйте переменную функцию, чтобы делать скидку на итоговую цену в корзине
 * diskont0 = скидок нет, diskont1 = 10%, diskont2 = 20%
 *
 * В коде должно быть использовано:
 * - не менее одной функции
 * - не менее одного параметра для функции
 * операторы if, else, switch
 * статические и глобальные переменные в теле функции
 *
 */

// Общая сумма заказа и колличество
$total_cost = 0; // Общая стоимость
$total_amount = 0; // Общее колличество

// Уведамления
    $product=" ";
    $notice=" " ; // Сообщение
foreach ($bd as $key => $val) {
    // Вывод уведамления
    if ($val['осталось на складе'] < $val['количество заказано']) {
        $product .= "<b>" . $key . "</b>, ";
        $notice = "К сожалению, нужного количества " . $product . " нет на складе";

    } else {
        $notice = "Весь товар в наличии";
    }

    // Подсчёт общего колличества и стоимости
    $total_amount +=$val['количество заказано'];
    $total_cost +=$val['количество заказано']*$val['цена'];
}


function calc_discount($bd) { //Функция рассчёта скидки
    global $discount_procent; //Процент скидки
    global $discount_cost;
    static $discount_price;

    foreach ($bd as $key => $val) {

        // Скидка для велосипедов 30%
        if($key=='игрушка детская велосипед'&&$val['количество заказано']<=3&&$val['количество заказано']<= $val['осталось на складе']) {
            $val['diskont'] = 'diskont3';
        }else {
            $val['diskont'] = 'diskont0';
        }
        switch ($val['diskont']) {
            case 'diskont0':
                $discount_price = $val['цена'] *= 1;
                $discount_procent="0 %";
                break;
            case 'diskont1':
                $discount_price = $val['цена'] *= 0.9;
                $discount_procent="10 %";
                break;
            case 'diskont2':
                $discount_price = $val['цена'] *= 0.8;
                $discount_procent="20 %";
                break;
            case 'diskont3':
                $val['цена'] *= 0.7;
                $discount_procent="30 %";
                break;

        }

        $discount_cost += $discount_price *$val['количество заказано']; // Стоимость со скидкой;

    }
    return $discount_cost;

}

calc_discount($bd);

?>




<body>
<style>
    body {
        font-size: 14px;
        font-family: 'Verdana';
        color:#666;
    }
    h1{
        font-size: 1.8em;
    }
    h2 {

    }
    table {
        width: 1200px;
        max-width:90%;
        margin: 2% auto;
        border-spacing: 5px 0px;
        border: 2px solid #cccccc;
        padding: .3% 0;

    }

    tr.caption {
        background-color: #cccccc;
        font-weight:bold;
        font-size: 1.2em;
        color: #ffffff;

    }
    tr {
        color:#666;
    }

    td {
        padding: 1.5%;
        border: 1px solid #ccc;
    }

    div.container {
        width: 1200px;
        max-width: 90%;
        margin: 0 auto;
    }

</style>
    <div class="container">
        <h1>Мои заказы:</h1>
        <table>
            <tr class="caption">
                <td>Наименование товара</td>
                <td>Цена</td>
                <td>Колличество</td>
                <td>Остаток на складе</td>

            </tr>

            <?php
            foreach ($bd as $key => $val) {
                echo '<tr>'
                    .'<td>'.$key.'</td>'
                    .'<td>'.$val['цена'].'</td>'
                    .'<td>'.$val['количество заказано'].'</td>'
                    .'<td>'.$val['осталось на складе'].'</td>';
            echo '</tr>';
            reset($bd);
            }
            ?>
        </table>

        <h2>Итого:</h2>
        <table>
            <tr class="caption">
                <td>Колличество наименований</td>
                <td>Общее колличество закаов</td>
                <td>Общая стоимость заказа</td>
                <td>Общая стоимость со скидкой</td>
            </tr>

                <?php
                    echo '<tr>'
                        .'<td>'.count($bd).'</td>'
                        .'<td>'."$total_amount".'</td>'
                        .'<td>'.$total_cost.'</td>'
                        .'<td>'.$discount_cost.'</td>';
                    echo '</tr>';
                ?>
            </tr>
        </table>
        <h2>Акции:</h2>
        <?php echo
        "Внимание! при покупке 3-х велосипедов, вы получите скидку 30%".'<br/>'.
        "Ваша скидка на товар равна ".$discount_procent;

        ?>

        <h2>Наличие товара:</h2>
        <?php echo $notice; //Сообщение об отсутствии товара ?>
    </div> <!-- End container -->
</body>



