ob_start();
    echo "<pre>";
    var_dump($contact);
    echo "</pre>";
    return ob_get_contents();