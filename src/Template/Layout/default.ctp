<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?php 
            echo $this->Html->meta('icon');
            
            echo $this->Html->css(array('bootstrap.min'));
    
            echo $this->Html->script(array( 'bootstrap.bundle', 'datos'));
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
</head>
<body>
    <?php echo $this->element('menu'); ?>
        <?php if(!isset($menu)){ // significa: ¿si no esta definida la variable menu? observa el signo de negación: !
                        // no esta definida
                        // muestra el menu  
                        }else{ 
                            // esta definida 
                            // no muestra el menu   
                        } ?>
            
            <div class="container" role="main">
                    <br>
                   <?= $this->Flash->render() ?>
                   <?= $this->fetch('content') ?>
   
    <footer>
    </footer>
    <script type="module" src="../js/datos.js"></script>
</body>
</html>
