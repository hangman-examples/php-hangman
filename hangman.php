<?php

echo "Welcome to hangman in PHP\n";

$to_guess = "suck my shorts";
$guesses_left = 5;
$current_guess = as_blanks($to_guess);
$letters_remaining = get_alphabet();

while($guesses_left > 0) {
  echo "Current guess: $current_guess \n";
  echo "Letters remaining: $letters_remaining\n";
  guess($letters_remaining);
  $guesses_left--;
}

function as_blanks($to_guess) {
  $letter_array = str_split($to_guess);
  $new_letter_array = [];
  foreach($letter_array as $letter) {
    if(ord($letter) == ord(" ")) {
      $new_letter_array[] = "  ";
    } else {
      $new_letter_array[] = "_ ";
    }
  }
  return implode($new_letter_array, "");
}

function get_alphabet() {
  $alphabet = [];
  for($i = 65; $i < 65 + 26; $i++) {
    $alphabet[] = chr($i);
  }
  return implode($alphabet, " ");
}

function guess($letters_remaining) {
  $guessed_letter = strtoupper(readLine());
  if(strlen($guessed_letter) != 1) {
    echo "Please enter just one letter\n";
  } else {
    // remove from letters remaining

    $letters_remaining_array = explode($letters_remaining, " ");
    $updated_letters_remaining = array_filter($letters_remaining_array, function($v) use($guessed_letter) {
      var_dump([$v, $guessed_letter]);
      return $v != $guessed_letter;
    });
    return $updated_letters_remaining;
    // reveal anything
  }
}

var_dump(array_filter($arr, function($k) {
    return $k == 'b';
}, ARRAY_FILTER_USE_KEY));

var_dump(array_filter($arr, function($v, $k) {
    return $k == 'b' || $v == 4;
}, ARRAY_FILTER_USE_BOTH));