<?php
    $usermenu = TRUE;
    $pt = 'Status | My Cart | My Account';
    include('../../../common/header.php');
    if(!isset($_REQUEST['status']) && !isset($_SESSION['os_cur_user']))
        header("Location: ../");
    switch($_REQUEST['status'])
    {
        case 0: echo "Payment Successfully Made ...<br>".
                     "<p>Payment will be verified by our retailers before proceeding with the shipment.<br>".
                     "If you had chosen COD then your shipment will be made after verifying your account</p>".
                     "<p>Kindly fill up your address <a href='/myaccount' style='text-decoration: underline'>here</a>, if you hadn't already, to get your shipment</p>"; break;
        case 1: echo "Payment Failed! Invalid Credentials ...<br>"; break;
        case 2: echo "Payment Failed! Insufficient Balance ...<br>"; break;
        case 3: echo "Transaction Cancelled! Try Again ...<br>"; break;
    }
    echo "Redirecting in few seconds to your account ..."
    ?>
    <script>setTimeout(function(){window.location.href="/myaccount"},10000);</script>
    <?php
    include('../../../common/footer.php');
?>