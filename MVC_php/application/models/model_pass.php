<?php

class Model_Pass extends Model
{
    public function validPassInModel($data)
    {
        $adminNick = "admin";
        $adminPass = "123";

        if ($data["nick"] == $adminNick && $data["pass"] == $adminPass) {
            setSession('admin', true);
            setSession('alarm', 'You entered into admin mode');
        } else {
            setSession('alarm', 'Password or nickname is incorrect');
        }
    }

    public function exitInModel()
    {
        setSession('admin', false);
        setSession('alarm', 'Exiting the admin mode');
    }
}
