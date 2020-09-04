<?php

namespace App\Util;

use Str;

class ConvertToEmbedableImageLink
{

   /**
    * Convert a shared image link from drive to an embedable image link.
    *
    * @return string
    */
    public static function convertToEmbedableImageLink($link) {
      $embedableLink = Str::replaceFirst('https://drive.google.com/file/d/', 'https://drive.google.com/thumbnail?id=', $link);
      $embedableLink = Str::replaceFirst('/view?usp=sharing', '', $embedableLink);

      return $embedableLink;
  }
}