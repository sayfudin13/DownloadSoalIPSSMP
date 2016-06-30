<?php
  // if ($handle = opendir('soal/KELAS 7')) {

  //     while (false !== ($entry = readdir($handle))) {

  //         if ($entry != "." && $entry != "..") {

  //             echo "$entry\n";
  //         }
  //     }

  //     closedir($handle);
  // }

$scan = scandir('soal/SAMPLE');
$counter = 200;
foreach($scan as $file)
{
    if (!is_dir("soal/SAMPLE/$file") && after_last(".",$file) != 'jpg')
    {
      // if (strpos($file, 'SOAL') !== false) {
      //   echo "($counter, 
      //         '".before_last(".",$file)."', 
      //         'http://www.downloadsoalipssmp.com/soal/soal/".$file."', 
      //         'http://www.downloadsoalipssmp.com/gambar/".before_last(".",$file).".jpg', 
      //         'bukan', 
      //         'kelas-9', 
      //         '',
      //         '2016-01-02 17:00:00', 
      //         ''),<br>";
      // } else {
      //   echo "($counter, 
      //         '".before_last(".",$file)."', 
      //         'http://www.downloadsoalipssmp.com/soal/soal/".$file."', 
      //         'http://www.downloadsoalipssmp.com/gambar/no_image_available.jpg', 
      //         'bukan', 
      //         'kelas-9', 
      //         '',
      //         '2016-01-02 17:00:00', 
      //         ''),<br>";
      // }

      // echo "($counter, 
      //         '".before_last(".",$file)."', 
      //         'http://www.downloadsoalipssmp.com/soal/soal/".$file."', 
      //         'http://www.downloadsoalipssmp.com/gambar/".before_last(".",$file).".jpg', 
      //         'bukan', 
      //         'osn', 
      //         '',
      //         '2016-01-02 17:00:00', 
      //         ''),<br>";

      echo "($counter, 
              '".before_last(".",$file)."', 
              'http://www.downloadsoalipssmp.com/soal/soal/".$file."', 
              'http://www.downloadsoalipssmp.com/gambar/no_image_available.jpg', 
              'sample', 
              '', 
              '',
              '2016-01-02 17:00:00', 
              ''),<br>";

      // echo "$file<br>";
        $counter++;
    }

}


            function after ($this, $inthat)
            {
              if (!is_bool(strpos($inthat, $this)))
              return substr($inthat, strpos($inthat,$this)+strlen($this));
            };

            function after_last ($this, $inthat)
            {
              if (!is_bool(strrevpos($inthat, $this)))
              return substr($inthat, strrevpos($inthat, $this)+strlen($this));
            };

            function before ($this, $inthat)
            {
              return substr($inthat, 0, strpos($inthat, $this));
            };

            function before_last ($this, $inthat)
            {
              return substr($inthat, 0, strrevpos($inthat, $this));
            };

            function between ($this, $that, $inthat)
            {
              return before ($that, after($this, $inthat));
            };

            function between_last ($this, $that, $inthat)
            {
             return after_last($this, before_last($that, $inthat));
            };
            // use strrevpos function in case your php version does not include it
            function strrevpos($instr, $needle)
            {
              $rev_pos = strpos (strrev($instr), strrev($needle));
              if ($rev_pos===false) return false;
              else return strlen($instr) - $rev_pos - strlen($needle);
            };
?>