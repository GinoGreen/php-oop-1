<?php 

   class Movie {
      public $title;
      public $movieDirector;
      public $minutesDuration;
      public $genre;
      public $cast;
      public $vote;

      function __construct($_title) {
         $this->title = $_title;
      }

      public function getFeedback() {
         $feedback = 'Da Oscar';
         if ($this->vote <= 3) {
            $feedback = 'Discreto';
         } else if ($this->vote <= 4) {
            $feedback = 'Ottimo';
         }
         return $feedback;
      }
   }