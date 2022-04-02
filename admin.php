<?php 
include("conexao.php");
$query_contato_list = "SELECT * FROM new_contato";
$contato_list = $conexao->query($query_contato_list);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <title>ADMIN ÁREA</title>
</head>
<body>
    <div class="container">
        <table class="new-contato">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th class="hidden-mobile">Email</th>
                    <th class="hidden-mobile">Telefone</th>
                    <th>Contato</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $rows = mysqli_num_rows($contato_list);
                if($rows == 0):
                ?>
                    <tr>
                        <td class="vazio">Ninguém entrou em contato ainda</td>
                    </tr>
                <?php 
                else: 
                    $num = 0;
                    while($row_user = mysqli_fetch_assoc($contato_list)){
                        if($num < $rows){
                            $num = $num + 1;
                        }else{
                            $num = $num;
                        }
                ?>
                <tr>
                    <td><?php echo $num;?></td>
                    <td class="name_new_contato"><?php echo $row_user['nome']  ;?></td>   
                    <td class="hidden-mobile"><?php echo $row_user['email'] ;?></td>
                        <td class="hidden-mobile"><a href="tel: +55<?php echo $row_user['tel'] ;?>"><?php 
                        $numero = $row_user['tel'];
                        $ddd = substr($numero,0,2);
                        $nine = substr($numero,2,1);
                        $first4 = substr($numero,3,4);
                        $second4 = substr($numero,7,4);

                        echo "({$ddd}) - {$nine}{$first4}-{$second4} ";
                        ?></a></td>
                    <td>
                    <a href="https://api.whatsapp.com/send?phone=55<?php echo $row_user['tel']; ?>">
                        <img class="icon-link" src="imgs/whatsapp.svg" alt="">
                    </a>
                    <span style="margin: 0px 10px;"></span>
                    <a href = "mailto: <?php echo $row_user['email'];?>">
                        <img class="icon-link" src="imgs/email.svg" alt="">
                    </a>
                    <span style="margin: 0px 10px;"></span>
                    <a href="tel: +55<?php echo $row_user['tel'] ;?>">
                        <img class="icon-link" src="imgs/phone.svg" alt="">
                    </a>
                    </td>
                </tr>
            <?php
                    }
            endif;
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>