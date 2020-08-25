<?php

class Model_Add extends Model
{
    public function push_Task($addTask)
    {
        $file = __DIR__ . "/data.json";
        $dataString = file_get_contents($file);
        $data =  json_decode($dataString);
        $count = count($data);
        $data[$count] = [
            'name' => htmlspecialchars($addTask['name']),
            'email'  => htmlspecialchars($addTask['email']),
            'text'  => htmlspecialchars($addTask['text']),
            'state'  => '',
            'redacted'  => false
        ];
        $dataString = json_encode($data);
        file_put_contents($file, $dataString);
        setSession('alarm', 'Add data complete');
    }
}
