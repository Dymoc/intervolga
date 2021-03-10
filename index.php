<?php

// ТЗ №1

session_start();


$a = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt nobis corporis similique repellat quae nesciunt debitis est quam, architecto eveniet pariatur eos itaque. Qui, quaerat placeat. Unde neque maiores doloremque officiis fuga. Nisi rerum quam modi veritatis ab reprehenderit dolore consequatur repudiandae? Laudantium nostrum sed illo a temporibus repellendus et corrupti veniam dolor? Quibusdam quis suscipit repellendus perferendis nesciunt eaque quam enim corrupti! Voluptate veritatis deserunt impedit architecto recusandae dignissimos error adipisci blanditiis rem mollitia magnam excepturi assumenda inventore incidunt, cum facere hic optio, corporis sit ex maxime! Magnam blanditiis unde quas omnis veniam? Similique labore delectus minus animi totam voluptatem sequi. Deleniti non explicabo, animi eum earum impedit autem, voluptates distinctio excepturi repellat praesentium eveniet at provident soluta fugit consequatur ut ab atque dolorem optio nulla. Earum dolorem pariatur recusandae doloribus perferendis nam id accusamus asperiores iste cupiditate ea vitae adipisci explicabo veniam alias, dicta eaque natus fugit sunt quia repellat expedita eos quae? Perspiciatis porro voluptates inventore quis laudantium distinctio nesciunt placeat suscipit nisi veniam, aut officia cupiditate voluptatum alias saepe ut fugit exercitationem laborum maiores libero. Perferendis, iure expedita? Quis consequatur amet neque minima optio, consectetur repudiandae vel rem officiis, earum autem. Similique assumenda quia quidem amet harum dignissimos a qui consequatur beatae? Ipsam nesciunt aspernatur alias nemo dolorem accusantium ducimus, quam repudiandae nulla totam? Quia numquam recusandae non totam. Inventore saepe asperiores ullam modi, fugiat, laborum reiciendis corrupti eum similique pariatur a, suscipit hic delectus maxime necessitatibus incidunt officiis dignissimos nam nemo repudiandae. Eveniet, autem cupiditate.';
$link = '/action.php/';

if(isset($a)) {
    $b = cutWord(cutStr($a));

    if(isset($b)) {
        $linkStr = linkStr($b, cutStr($a));
    }
}

$_SESSION['post'] = $a;


function cutStr($str, $length = 180)
{
    if (strlen($str) <= $length) {
        return $str;
    }

    $temp = substr($str, 0, $length);

    return substr($temp, 0, strrpos($temp, ' '));
}

function cutWord($temp, $cut = 2)
{

    for ($i = 0; $i < $cut; $i++) {
        $temp = substr($temp, 0, strrpos($temp, ' '));
    }

    return $temp;
}

function linkStr($str, $str1, $postfix = '...')
{
    return str_replace($str, " ", $str1 . $postfix);
}

?>

<br>
<p><?= $b ?><a href="action.php"><?= $linkStr ?></a></p>

<?php

// ТЗ №2


if (isset($_POST['submit']) ) {
    gc_collect_cycles();
    include('classSimpleImage.php');
    $image = new SimpleImage();
    $image->load($_FILES['uploaded_image']['tmp_name']);
    $image->resizeToWidth(200);
    $image->save('image1.jpg');  
    $image->load('image1.jpg');
 

    if('image1.jpg'){      
        $image->output('image1.jpg');
        $imgTmp = '<div style="height: 100px; width: 200px; text-align: center; border: 1px solid black; background: url(\'image1.jpg\'); background-position: center"></div>';
        echo $imgTmp;        

    }
}
else {
  $form = '<form action="/" method="post" enctype="multipart/form-data">
      <input type="file" name="uploaded_image" />
      <input type="submit" name="submit" value="Upload" />
    </form>';
  echo $form;
}

?>
<br>

<?php

// ТЗ №3
//  1. Выборка из таблицы a и в по совпадениям a.id=b.a_id
//  2. Выборка из таблицы a обьедененной с b по совпадениям a.id=b.a_id



// ТЗ №4

$arr = array(1, 1, 2, 3, 4, -51, 12, 12, 12, -51, -51, 8, 9, 88, 88);

function countDuble($arr) {
    $count = 0;
    foreach ($arr as $key => $value) {    
        if($value == $arr[$key - 1]) {
            $count++;
        }
    }   
    
    return $count;
}

print(countDuble($arr));


