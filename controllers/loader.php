<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 20:05
 */

$session = session_id();
if (empty($session)) {
    session_start();
}

$root = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR;
define('chemin', $root);

include chemin.'core/DB_connect.php';
$db = new DATABASE();

include chemin.'apps/PRODUITS.php';
$house = new PRODUITS($db);

include chemin.'apps/CATEGORIES.php';
$house_cat = new CATEGORIES($db);

include chemin.'apps/AGENT.php';
$agent = new AGENT($db);


require chemin . 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader([chemin . 'templates', chemin . 'views']);
$twig = new \Twig\Environment($loader, [
    //'cache' => chemin.'caches',
]);


$twig->addExtension(new \Twig\Extra\String\StringExtension());
$twig->addExtension(new \Twig\Extra\Intl\IntlExtension());

if (isset($_GET['logout']) and $_GET['logout'] == true) {
    unset($_SESSION['Users']);
    session_destroy();
    ?>
    <script>
        setTimeout(function () {
            window.location.href = '/'
        }, 0)
    </script>
<?php }
?>