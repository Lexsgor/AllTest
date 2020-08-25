<h1 class="text-center"> Enter password </h1>

<?php echo  '<form action="' . getServerName() . '/pass/validPass" method="POST">'; ?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-2">Nick : </div>
    <input name="nick" class="col-8" type="text" required>
</div>
<br>
<div class="row">
    <div class="col-1"></div>
    <div class="col-2">Password : </div>
    <input name="pass" class="col-8" type="password" required>
</div>

<br>
<p class="text-center">
    <input type="submit" class="btn btn-primary" value="Enter">
    <?php
    echo '<a class="btn btn-danger" href="' . getServerName() . '" role="button">Cansel</a>';
    ?></p>
</form>