<?php 
header('Content-Type: text/html; charset= windows-1251');
 error_reporting( E_ERROR ); // ��������� �����������
//GET

$news='������ ������������� �������� ����� � ����� ������ �������������
�������� ������������� ���: ������ ����� ���������
������ �������������������� �� �������� �������� ������ 5-� �������� � �����������
�������-������������ ������� ���������� ������������
������: �������� �������� ������ ��� ����� � ����� ����� ����-���
�������� �������: �������������� ���������
���� ������� �������: ��������, ������ ������ � ������� ������� � �����
�������� ����� ������ ������� �� ������ ��������� �� ������ � �� ��������� ���������� ������
������ ������� ������ ������ �������� � ���� ������� ����� � �����������';
$news=  explode("\n", $news);

// ������� ������ ����� ������ ��������.
function news_list($news) {
    // ����� ������� �� ������� �� 1
    array_unshift($news, 0);
    unset($news[0]);

    foreach ($news as $key => $val) { //����� ��������
        if(isset($_GET['id'])){
            echo '<b>'."������� ".$key.': </b>'.$val.'</br>';
        }
    }
}




// ������� ������ ���������� �������.
function news_item($news) {
    global $item;

    // ����� ������� �� ������� �� 1
    array_unshift($news, 0);
    unset($news[0]);

    foreach ($news as $key => $val) { //����� ��������
        $key = $_GET['id']; // ������ ������� = id
        $item = '<b>'."������� ".$key.': </b>'.$news[$key].'</br>';
    }
    if ($_GET[] = 'id' && $_GET['id'] < count($news)&& isset($_GET['id'])) {
        echo $item;
    } elseif (!isset($_GET['id'])){
        header("HTTP/1.0 404 Not Found");
    }else
        news_list($news);
        }

news_item($news);
// ����� �����.
// ���� ������� ������������ - ������� �� �� �����, ����� �� ������� ���� ������

// ��� �� ������� id ������� � �������� ���������?
// ���� �������� �� ��� ������� - �������� 404 ������
// http://php.net/manual/ru/function.header.php
