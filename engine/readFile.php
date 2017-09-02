<?php

class readFile
{
    public function import($filename)
    {
        $dataGlobal = []; // Массив данных из файла
        $file = fopen('..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $filename, 'r');
        if ($file) {
            $row = 1;
            $headers = []; //Заголовки
            $dataRow = []; //Данные в строке
            while ($data = fgetcsv($file, 0, ",")) {

                if ($row === 1) {
                    for ($i = 0; $i < count($data); $i++) {
                        $headers[] = $data [$i];
                    }

                } else {
                    for ($i = 0; $i < count($headers); $i++) {
                        $dataRow[$headers[$i]] = $data[$i];
                    }
                    // проверка на пустую строку
                    $rowExist = false;
                    foreach ($dataRow as $key => $value) {
                        if ($value) {
                            $rowExist = true;
                        }
                    }
                    if ($rowExist) {
                        $dataGlobal[] = $dataRow;
                    }
                }
                $row++;
            };
        }
        fclose($file);
        return $dataGlobal;
    }

    public function sortByPrice($array)
    {
        function build_sorter($key)
        {
            return function ($a, $b) use ($key) {
//                return strcmp($a[$key], $b[$key]);
                if ($a[$key] == $b[$key]) {
                    return 0;
                }
                return ($a[$key] < $b[$key]) ? -1 : 1;
            };

        }

        usort($array, build_sorter('Price'));
        return $array;
    }

    public function showElements($array, $count)
    {
        array_splice($array, $count);
        echo "<table>";
        foreach ($array as $num => $row) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>".$key . " = " . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}