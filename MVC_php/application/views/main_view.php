<div class="col-12">
    <div class="row row-cols-4">
        <button type="button" class="btn btn-secondary" onclick="sort('name',true)">Sort by name(Increase)</button>
        <button type="button" class="btn btn-secondary" onclick="sort('email',true)">Sort by e-mail(Increase)</button>
        <button type="button" class="btn btn-secondary" onclick="sort('state',true)">Sort by state(Increase)</button>
        <?php
        echo '<a class="btn btn-primary" href="' . getServerName() . '/Add" role="button">Add task</a>';
        ?>
        <button type="button" class="btn btn-secondary" onclick="sort('name',false)">Sort by name(Decrease)</button>
        <button type="button" class="btn btn-secondary" onclick="sort('email',false)">Sort by e-mail(Decrease)</button>
        <button type="button" class="btn btn-secondary" onclick="sort('state',false)">Sort by state(Decrease)</button>
        <?php
        echo     $additionalData ? '<a class="btn btn-danger" href="' . getServerName() . '/Pass/exit" role="button">Exit admin mode</a>'
            : '<a class="btn btn-success" href="' . getServerName() . '/Pass" role="button">Login</a>';
        ?>
    </div>
    <div class="col-12" id="out"></div>
    <script>
        let lastPage = 0;
        let data =
            <?php echo $data ?>;
        redraw();

        function goPage(number) {
            lastPage = number;
            redraw();
        }

        function sort(name, sortLogik) {
            let size = data.length;

            for (i = 0; i < size; i++) {
                for (j = size - 1; j > i; j--) {
                    if (sortLogik ? data[j - 1][name] > data[j][name] : data[j - 1][name] < data[j][name]) {
                        let temp = data[j - 1];
                        data[j - 1] = data[j];
                        data[j] = temp;
                    }
                }
            }

            redraw();
        }

        <?php
        if ($additionalData) {
            include 'form/edit_form.php';
        }
        ?>

        function redraw(out) {
            if (!out) {
                out = '<hr>';
                for (let index = lastPage * 3; index < (lastPage + 1) * 3; index++) {
                    if (data[index]) {
                        out += `<div class="alert alert-dark" role="alert">
                        Name : ` + data[index].name + `<br>
                        E-mail : ` + data[index].email + `<br>
                        Text : ` + data[index].text + `<br><hr>
                        State : ` + (data[index].state ? "Complited" : "Not completed") +
                            (data[index].redacted ? "<br>Task redacted" : '') + `
                        
                        <?php
                        echo $additionalData ? '
                        <hr><div><button type="button" class="btn btn-primary" onclick=editTask(` + index + `) > Edit task </button></div>'
                            : '';
                        ?>
                        </div>`
                    }
                }
                out += `<div class="align-self-center">`
                for (let index = 0; index < (data.length / 3); index++) {
                    out += `<button type="button" class="btn btn-` + (index == lastPage ? "primary" : "secondary") +
                        `" onclick=goPage(` + index + `) >` + (index * 3 + 1) + ` - ` + (index * 3 + 3) + `</button>`;
                }
                out += `</div>`;
            }
            document.getElementById("out").innerHTML = out;
        }
    </script>