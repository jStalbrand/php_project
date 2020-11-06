<?php

/**
 *	class for an individual article
 * 
 *
 *	@version	1.0
 *	@copyright	Copyright (c) 2020.
 *	@license	Creative Commons (BY-NC-SA)
 *	@since		October 8, 2020
 *	@author		Jacob Stålbrand <jacob.stalbrand1@gmail.com>
 *
 */

    class Article{

        public $id;
        public $title;
        public $category;
        public $ingress;
        public $text; 
        public $date;
        public $author;
    
        public function __construct($id, $title, $category, $ingress, $text, $date, $author){

            $this->id = $id;
            $this->title = $title;
            $this->category = $category; 
            $this->ingress = $ingress;
            $this->text = $text;
            $this->date = $date;
            $this->author = $author;
            
        }

        /**
         * method that returns html elements containing data of the object
         * @return String HTML string 
         */
        public function parseHTML(){

            $output = "<a href='?id=".$this->id."&title=". str_replace(" ","-",$this->title)."'>";
                $output .= '<h1 class="title">'.$this->title.'</h1>';
                $output .= '<p class="category">'.$this->category.'</p>';
                $output .= '<p class="text">'.$this->ingress.'</p>';
                $output .= '<p class="author">'.$this->author.'</p>';  
                $output .= '<p class="date">'.Time::get($this->date).'</p>';
            $output .= "</a>";

        return $output;
        }

        /**
         * 
         * returns a string containing html-element
         * @return String HTML string
         * 
         */
        public function render_preview(){
            
            $markup = "<div class='article'>";
                $markup .= "<a href='administration.php?page=edit&id=". $this->id ."'>". $this->title ."</a>";
                $markup .= "<p id='name'>$this->author</p>";
                $markup .= "<p id='date'>".Time::get($this->date)."</p>";
            $markup .= "</div>";
           
        return $markup;    
        }
        /**
         * returns a string containing html-element
         * @return String
         */
        public function render_all_HTML(){

            $output  = '<div class="article">';
                $output .= '<h1 class="single-page-title">'.$this->title.'</h1>';
                $output .= '<p class="single-page-category">'.$this->category.'</p>';
                $output .= '<div>';
                    $output .= '<img src="images/user-2.png" alt="">'; 
                    $output .= '<p class="single-page-author">'.$this->author.'</p>';
                    $output .= '<p class="single-page-author">•</p>';
                    $output .= '<p class="single-page-date">'.Time::get($this->date).'</p>';
                $output .= '</div>';
                $output .= '<p class="single-page-ingress">'.$this->ingress.'</p>';
                $output .= '<p class="single-page-text">'.$this->text.'</p>';
            $output .= '</div>';

            return $output;
        }

    }


?>