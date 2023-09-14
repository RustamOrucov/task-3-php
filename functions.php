<?php



function test($drName, $txt)
{
    $logFile = './log.txt';
    $log = fopen($logFile, 'a');
    $ar = [];
    // arrayda olan elementler tekrar yazilmasin
    $lg = fopen($logFile, 'r');
    while (!feof($lg)) {
        $rlg = fgets($lg);
        $ar[] = $rlg;

    }


    if (is_dir($drName)) {
        $files = scandir($drName);

        if ($files != false) {
            $files = array_diff($files, array('.', '..'));

            foreach ($files as $fil) {

                $y = $drName . '/' . $fil;

                if (is_dir($y)) {
                    test($y, $txt);
                } else {

                    $y = $drName . '/' . $fil . PHP_EOL;

                    $fileTxt = fopen($txt, 'r');
                    while (!feof($fileTxt)) {
                        $row = fgets($fileTxt);
                        // // echo trim($row).'<br>';
                        // var_dump(in_array(trim($row),$arr)).'<br>';

                        if (trim($row) == $fil) {

                            echo $y . '<br>';

                            if (!in_array($y, $ar)) {

                                fwrite($log, $y);
                            }



                        }


                    }
                }




            }

        }

    }
    fclose($log);
    fclose($lg);




}
;



















?>