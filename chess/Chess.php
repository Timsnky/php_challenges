<?php
/**
 *
 * @author: Timothy Kimathi <timsnky@gmail.com>
 *
 * Project: challenges.
 *
 */

class Chess
{
    public $board;
    public $boardSize = 8;

    public function __construct()
    {
        $this->board = $this->initArray($this->boardSize);

//        $this->board[0][0] = 'QUEEN';

        $this->fillTable();
    }

    public function fillTable()
    {
        $added = $loops = 0;

        while($added != $this->boardSize && $loops < $this->boardSize)
        {
            $row = $column = 0;

            echo "-----------------  Loop $loops ------------------<br>";

            while ($row < $this->boardSize)
            {
                while ($column < $this->boardSize)
                {
                    echo "$row - $column<br>";

                    if(! $this->checkUnderAttack($row, $column))
                    {
                        $this->board[$row][$column] = 'QUEEN';

                        $added ++;

                        break;
                    }

                    $column ++;
                }

                $column = 0;

                $row ++;
            }

            $loops ++;
        }
    }

    public function checkUnderAttack($row, $collumn)
    {
        //Check Horizontally
        $rowIndex = 0;

        $collumnIndex = $collumn;

        while($rowIndex < $this->boardSize)
        {
            if($this->board[$rowIndex][$collumnIndex] == 'QUEEN' && $rowIndex != $row)
            {
                return true;
            }

            $rowIndex ++;
        }

        //Check Vertically

        $collumnIndex = 0;

        $rowIndex = $row;

        while($collumnIndex < $this->boardSize)
        {
            if($this->board[$rowIndex][$collumnIndex] == 'QUEEN' && $collumnIndex != $collumn)
            {
                return true;
            }

            $collumnIndex ++;
        }

        //Check One Diagonal

        $rowIndex = $row + 1;

        $collumnIndex = $collumn + 1;

        while($rowIndex < $this->boardSize && $collumnIndex < $this->boardSize)
        {
            if($this->board[$rowIndex][$collumnIndex] == 'QUEEN')
            {
                return true;
            }

            $rowIndex ++;
            $collumnIndex ++;
        }

        //x = rowIndex, y = [1 - limi]
        //

        $rowIndex = $row - 1;

        $collumnIndex = $collumn - 1;

        while($rowIndex >= 0 && $collumnIndex >= 0)
        {
            if($this->board[$rowIndex][$collumnIndex] == 'QUEEN')
            {
                return true;
            }

            $rowIndex --;
            $collumnIndex --;
        }

        //Check other diagonal

        $collumnIndex = $collumn + 1;

        $rowIndex = $row - 1;

        while($collumnIndex < $this->boardSize && $rowIndex >= 0)
        {
            if($this->board[$rowIndex][$collumnIndex] == 'QUEEN')
            {
                return true;
            }

            $collumnIndex ++;
            $rowIndex --;
        }

        $collumnIndex = $collumn - 1;

        $rowIndex = $row + 1;

        while($collumnIndex >= 0 && $rowIndex < $this->boardSize)
        {
            if($this->board[$rowIndex][$collumnIndex] == 'QUEEN')
            {
                return true;
            }

            $collumnIndex --;
            $rowIndex ++;
        }

        return false;

    }

    public function initArray($size)
    {
        $board = array();

        $row = $collumn = 0;

        while ($row < $size)
        {
            while ($collumn < $size)
            {
                $board[$row][$collumn] = '';

                $collumn ++;
            }

            $collumn = 0;

            $row ++;
        }

        return $board;
    }

    public function displayBoard()
    {
        $row = $column = 0;

        while ($row < (($this->boardSize * 2) + 1)) {
            $column = 0;
            while ($column < (($this->boardSize * 2) + 1)) {
                if ($row % 2 == 0) {
                    if ($column % 2 == 0) {
                        echo "+";
                    } else {
                        echo "----";
                    }
                } else {
                    if ($column % 2 == 0) {
                        echo "|";
                    } else {
                        if ($this->board[($row - 1) / 2][($column - 1) / 2] == 'QUEEN') {
                            echo "&nbsp Q &nbsp";
                        } else {
                            echo "&nbsp &nbsp &nbsp &nbsp";
                        }
                    }
                }
                $column++;
            }
            echo "<br>";
            $row++;
        }

    }
}