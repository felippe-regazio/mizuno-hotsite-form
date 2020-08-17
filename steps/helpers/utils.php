<?php

  function botSay($what) { ?>
    <p class="iana-say">
      <span class="iana-say__profile">
        <img src="img/mizu.png" alt="Bot Profile Image">
        <strong>Mizu </strong>
      </span>
      <span class="iana-say__message">
        <?= $what ?>
      </span>
    </p>
  <?php }

?>