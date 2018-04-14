<?php
include dirname(__FILE__).'/YEAR.php';


class Utils
{
    /**
     * 印出 DataTable 所有的資料
     */
    function printDataTable($dataTable)
    {
        foreach($dataTable as $row)
        {
            echo $row;
        }
    }
    
    function randomString($length)
    {
        $str = "";

        for ($i = 0 ; $i < $length; $i++)
        {
            $random_num = rand(0,3);
            switch ($random_num)
            {
                case 0: $str += rand(0, 10);
                    break;
                case 1: $str += chr(ord(rand(65, 91)));
                    break;
                case 2: $str += chr(ord(rand(97, 123)));
                    break;
            }
        }
        return $str;
    }

    function currentSchoolYear()
    {
        $yearModel = new YEAR;
        $conn = $yearModel->connect_db();
        return $yearModel->getCurrentYear($conn);
    }

    function schoolType($code)
    {
        switch ($code[2])
        {
            case '0':
                return "國立";
            case '1':
                return "私立";
            case '3':
            case '4':
            case '5':
                return "市立";
            default:
                return "學校代碼格式錯誤";
        }
    }

    function getEDUSubsidyTotal($schoolType, $country, $total)
    {
        switch ($schoolType)
        {
            case "國立":
            case "私立":
                return $total;
            case "市立":
                if ($country!="臺北市")
                {
                    return $total * 0.85;
                }
                else
                {
                    return $total * 0.9;
                }
            default:
                return 0;
        }
    }

    function getCountrySubsidyTotal($schoolType, $country, $total)
    {
        switch ($schoolType)
        {
            case "國立":
            case "私立":
                return 0;
            case "市立":
                if ($country!="臺北市")
                {
                    return $total * 0.15;
                }
                else
                {
                    return $total * 0.1;
                }
            default:
                return 0;
        }
    }

    function chineseStringNumber($number)
    {
        $strNumber = "";
        $chrArray = array();
        array_push($chrArray, $number);

        array_reverse($chrArray);            //將char array中的元素位置反轉

        for($i = 0; $i < count($chrArray); $i++)
        {
            switch ($i)
            {
                // 個位數
                case 0:
                    $strNumber = $this->chineseNumber($chrArray[$i]).$strNumber;
                    break;
                // 十萬、十位數
                case 1:
                case 5:
                    $strNumber = $this->chineseNumber($chrArray[$i])." 拾 ".$strNumber;
                    break;
                // 百位數
                case 2:
                case 6:
                    $strNumber = $this->chineseNumber($chrArray[$i])." 佰 ".$strNumber;
                    break;
                // 千位數
                case 3:
                case 7:
                    $strNumber = $this->chineseNumber($chrArray[$i])." 仟 ".$strNumber;
                    break;
                // 萬位數
                case 4:
                    $strNumber = $this->chineseNumber($chrArray[$i])." 萬 ".$strNumber;
                    break;
            }
        }

        return $strNumber;
    }


    function chineseNumber($number)
    {
        switch ($number)
        {
            case 0:
                return "零";
            case 1:
                return "壹";
            case 2:
                return "貳";
            case 3:
                return "叄";
            case 4:
                return "肆";
            case 5:
                return "伍";
            case 6:
                return "陸";
            case 7:
                return "柒";
            case 8:
                return "捌";
            case 9:
                return "玖";
            default:
                return "";
        }
    }
}

?>