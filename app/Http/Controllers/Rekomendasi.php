<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Rekomendasi extends Controller
{
    private function knapSolveFast2($w, $v, $i, $aW, &$m)
    {

        global $numcalls;
        $numcalls++;
        // echo "Called with i=$i, aW=$aW<br>";

        // Return memo if we have one
        if (isset($m[$i][$aW])) {
            return array($m[$i][$aW], $m['picked'][$i][$aW]);
        } else {

            // At end of decision branch
            if ($i == 0) {
                if ($w[$i] <= $aW) { // Will this item fit?
                    $m[$i][$aW] = $v[$i]; // Memo this item
                    $m['picked'][$i][$aW] = array($i); // and the picked item
                    return array($v[$i], array($i)); // Return the value of this item and add it to the picked list

                } else {
                    // Won't fit
                    $m[$i][$aW] = 0; // Memo zero
                    $m['picked'][$i][$aW] = array(); // and a blank array entry...
                    return array(0, array()); // Return nothing
                }
            }

            // Not at end of decision branch..
            // Get the result of the next branch (without this one)
            list ($without_i, $without_PI) = $this->knapSolveFast2($w, $v, $i - 1, $aW, $m);

            if ($w[$i] > $aW) { // Does it return too many?

                $m[$i][$aW] = $without_i; // Memo without including this one
                $m['picked'][$i][$aW] = $without_PI; // and a blank array entry...
                return array($without_i, $without_PI); // and return it

            } else {

                // Get the result of the next branch (WITH this one picked, so available weight is reduced)
                list ($with_i, $with_PI) = $this->knapSolveFast2($w, $v, ($i - 1), ($aW - $w[$i]), $m);
                $with_i += $v[$i];  // ..and add the value of this one..

                // Get the greater of WITH or WITHOUT
                if ($with_i > $without_i) {
                    $res = $with_i;
                    $picked = $with_PI;
                    array_push($picked, $i);
                } else {
                    $res = $without_i;
                    $picked = $without_PI;
                }

                $m[$i][$aW] = $res; // Store it in the memo
                $m['picked'][$i][$aW] = $picked; // and store the picked item
                return array($res, $picked); // and then return it
            }
        }
    }

    public function hitung()
    {
        $items4 = array();
        $w4 = array();
        $v4 = array();
        $pengiriman = \App\Models\pengiriman::all();
        foreach ($pengiriman as $p) {
            array_push($items4, $p->no_resi);
            array_push($w4,$p->berat);
            array_push($v4,$p->harga);
        }
        echo 'w4 = '.print_r($w4,1);
        echo 'items4 = '.print_r($items4,1);
        echo 'v4 = '.print_r($v4,1);
//        $items4 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);
//        $w4 = array(25, 3, 2, 4, 3, 2, 2, 10, 3, 8, 15, 8, 8, 8, 7, 8, 5, 7, 5);
//        $v4 = array(280, 100, 60, 60, 60, 60, 60, 140, 80, 280, 340, 260, 250, 180, 200, 90, 150, 150, 120);

## Initialize
        $numcalls = 0;
        $m = array();
        $pickedItems = array();

## Solve
        list ($m4, $pickedItems) = $this->knapSolveFast2($w4, $v4, sizeof($v4) - 1, 100, $m);

# Display Result
        echo "<b>Items:</b><br>" . join(", ", $items4) . "<br>";
        echo "<b>Max Value Found:</b><br>$m4 (in $numcalls calls)<br>";
        echo "<b>Array Indices:</b><br>" . join(",", $pickedItems) . "<br>";


        echo "<b>Chosen Items:</b><br>";
        echo "<table border cellspacing=0>";
        echo "<tr><td>Item</td><td>Value</td><td>Weight</td></tr>";
        $totalVal = $totalWt = 0;
        foreach ($pickedItems as $key) {
            $totalVal += $v4[$key];
            $totalWt += $w4[$key];
            echo "<tr><td>" . $items4[$key] . "</td><td>" . $v4[$key] . "</td><td>" . $w4[$key] . "</td></tr>";
        }

        echo "<tr><td align=right><b>Totals</b></td><td>$totalVal</td><td>$totalWt</td></tr>";
        echo "</table><hr>";
    }
}
