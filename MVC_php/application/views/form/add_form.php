<h1 class="text-center"> Add task </h1>

<?php echo  '<form action="' . getServerName() . '/add/addTask" method="POST">'; ?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-2">Name : </div>
    <input name="name" class="col-8" type="text" required>
</div>
<br>
<div class="row">
    <div class="col-1"></div>
    <div class="col-2">E-mail : </div>
    <input name="email" class="col-8" type="email" required>
</div>

<h3 class="text-center"> Text </h3>
<div class="row">
    <div class="col-1"></div>
    <textarea name="text" class="col-10" required></textarea> <br>

</div>
<br>
<p class="text-center">
    <input type="submit" class="btn btn-primary" value="Ok">
    <?php
    echo '<a class="btn btn-danger" href="' . getServerName() . '" role="button">Cansel</a>';
    ?></p>
</form>