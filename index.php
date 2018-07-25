<!DOCTYPE html>
<head><title>Manuscript data processing</title>
</head>
<body>
<h1>Manuscript data processing</h1>
<p>Text (.txt) file to statistical output.</p>
<pre>
<?php

$txt_file = file_get_contents ('http://www.voynich.nu/data/ZL_ivtff_1b.txt'); // translate text file from url to a string.

$FG_txt = file_get_contents ('http://www.gutenberg.org/cache/epub/3296/pg3296.txt');

$dot_to_space = str_replace ("."," ", $FG_txt); // replace period with space.

$char_length = mb_strlen ($FG_txt); //calculate the number of characters in $txtfile.

$word_count = str_word_count ($FG_txt, 0); //count word total including charters 8,9,2, and *.   '892*'

$word_count_array = str_word_count ($FG_txt, 1); //  '892*'

$word_freq = array_count_values ($word_count_array);

arsort ($word_freq);

$tmp_array_keys = array_keys ($word_freq);

$most_word =  array_shift ($tmp_array_keys);

$least_word = array_pop ($tmp_array_keys);

$top_ten = array_keys (array_slice ($word_freq, 0, 10));

$word_list_keys = array_keys ($word_freq);

$FG_txt_no_space = preg_replace ("/[^A-Za-z]/","",$FG_txt);

// echo strlen ($FG_txt_no_space);

?>
</pre>
<p>The length of the file is <?php print ($char_length); ?> characters. </p>
<p>The total number of words is <?php print ($word_count); ?> words. </p>
<p>The most used word is "<?php print ($most_word); ?>". </p>
<p>The least used word is "<?php print ($least_word); ?>". </p>
<p>The 10 most used words from most to least used are "<?php print implode (", ", $top_ten) ?>". </p>
<p>The most used character is<?php $most_char ?>. </p>
<p>The least used character is<?php $least_char ?>. </p>
<pre>
<?php 
var_dump ($top_ten);
// var_dump ($dot_to_space);

print_r ($word_freq);
?>
</pre>
</body>
</html>