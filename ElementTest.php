<?php
include_once "DaysPast.php";
class ElementTest
{
    public function test()
    {
        $pastMonth = intval(date("m")) - 1;
        if ($pastMonth == 0) {
            $pastMonth = 12;
            $currentYear = intval(date("Y")) - 1;
        } else {
            $currentYear = intval(date("Y"));
        }
        $daysPastMonth = DaysPast::daysPastMonth($pastMonth, $currentYear);
        return $daysPastMonth;
    }
}
$elementTest = new ElementTest();
print_r($elementTest->test());
?>