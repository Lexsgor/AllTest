function editTask(index) {
let out = `<h1 class="text-center"> Edit task </h1>

<?php echo  '<form action="' . getServerName() . '/edit/applyChenges" method="POST">'; ?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-2">Name : </div>
    <div class="col-8">` + data[index].name + `</div>
</div>
<br>
<div class="row">
    <div class="col-1"></div>
    <div class="col-2">E-mail : </div>
    <div class="col-8">` + data[index].email + `</div>
</div>

<h3 class="text-center"> Text </h3>
<div class="row">
    <div class="col-1"></div>
    <textarea name="text" class="col-10" required>` + data[index].text + `</textarea> <br>
</div>
<br>

<div class="row">
    <div class="col-1"></div>
    <div class="col-2">State : </div>
    <div class="col-8"><input name="state" type="checkbox" ` + ((data[index].state=="on" )?"checked":"" )+ `>
        <input type="hidden" name="index" value="`+index+`"></div>
</div>

<p class="text-center">
    <input type="submit" class="btn btn-primary" value="Ok">
    <?php
    echo '<a class="btn btn-danger" href="' . getServerName() . '" role="button">Cansel</a>';
    ?></p>
</form>`
redraw(out);
}