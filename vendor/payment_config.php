<?php
require_once 'autoload.php';
require 'stripe-php-master/init.php';
// require_once '../secrets.php';


$_SESSION['public_key'] = 'pk_test_51MglgyIAIkGTCzQ7qn0vLIcdV2zLbnS8b8kSHtdp3KKlxCLBLhgRVZkCohG9o1UPjxgm9RXpmqwf7PQf1UnnMHpT005gCVIMZg';
$secret_key = 'sk_test_51MglgyIAIkGTCzQ7aV0W0T9o6uiR1tlmpmtY1Iu2YGh59yF12PFbkahHk68VLLzQ0w9Aem115rtORpHf0vLijIEW00aSMilXfV';


\Stripe\Stripe::setApiKey($secret_key);

?>