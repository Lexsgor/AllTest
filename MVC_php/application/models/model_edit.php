<?php

class Model_Edit extends Model
{
    public function applyChengesInModel($editTask)
    {
        $file = __DIR__ . "/data.json";
        if (getSession('admin')) {
            $dataString = file_get_contents($file);
            $data = json_decode($dataString);
            if ($data[$editTask["index"]]->{'text'} != htmlspecialchars($editTask['text'])) {
                $data[$editTask["index"]]->{'redacted'} = true;
            }
            $data[$editTask["index"]]->{'text'}  = htmlspecialchars($editTask['text']);
            $data[$editTask["index"]]->{'state'}  = $editTask['state'] ? "on" : "";
            $dataString = json_encode($data);
            file_put_contents($file, $dataString);
            setSession('alarm', 'Edit data complete');
        } else {
            setSession('alarm', 'No admin rights for editing');
        }
    }
}
