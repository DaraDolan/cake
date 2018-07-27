<?php

function getClosingParen($sentence, $openingParenIndex)
{
    $openNestedParens = 0;
    //starting at the opening paren, loop through each character and see if it is opening or closing
    for ($position = $openingParenIndex + 1; $position < strlen($sentence); $position++) {
        $character = $sentence[$position];
        if ($character == '(') {
            $openNestedParens += 1;
        } elseif ($character == ')') {
            if ($openNestedParens == 0) {
                return $position;
            } else {
                $openNestedParens -= 1;
            }
        }
    }

    throw new Exception('No Closing Parenthesis :(');
}

$sentence = 'Sometimes (when I nest them (my parentheticals) too much (like this (and this))) they get confusing.';

try {
    $closingParenPosition = getClosingParen($sentence, 28);
    echo 'The closing parenthesis is at position: '.$closingParenPosition.' in the sentence';
} catch (Exception $e) {
    echo $e->getMessage();
}
