<?php


/**
 *	class for handling articles in the program
 *
 *	@version	1.0
 *	@copyright	Copyright (c) 2020.
 *	@license	Creative Commons (BY-NC-SA)
 *	@since		October 8, 2020
 *	@author		Jacob Stålbrand <jacob.stalbrand1@gmail.com>
 *
 */
class Articles extends Database{

    public $articles;

    /**
     * 
     * class constructor
     * 
     * @return null
     */
    public function __construct(){
        
        $this->create_connection();
        $this->init_articles();
    }

    /**
     * 
     *fetch information from the database via the super-class.
     *loads an array with article objects containing the information. 
     *
     * @return Void
     */
    public function init_articles(){
        
        $this->articles = array();
        $this->prepare("SELECT * FROM articles");
        $this->execute();

        $results = $this->fetch();
        foreach ($results as $article) {

            array_unshift($this->articles, new Article(

                $article['id'],
                $article['title'],
                $article['category'],
                $article['ingress'],
                $article['text'],
                $article['date'],
                $article['author']
                
            ));
        }

    }

    /**
     * 
     * returns a string containing html-information
     *  
     * @return String html-elements
     */
    public function parseHTML(){

        $this->init_articles();
        $output = '<div id="articles">';
        foreach($this->articles as $article){

            $output .= $article->parseHTML();

        }
        $output .= '</div>'; 

    return $output;
    }
   
    /**
     * 
     * returns html-elements containing different articles
     * @param Integer current page number
     * @param Integer amount of articles to return 
     * @return String html-element
     */
    public function render($from, $limit){

        $count = 0;
        $from = ($from -1) * $limit;
        $output = '<div id="articles">';
        foreach($this->articles as $article){
            if($count >= $from && $limit > 0){

                $output .= $article->parseHTML();
                $limit--;
            }
            $count++;

        }
        $output .= '</div>'; 

    return $output;
    }

    /**
     * 
     * returns html-elements to display on the administration-page
     * 
     * @return String html-element
     */
    public function render_administration_view(){
        $this->init_articles();
        $output = "";
        foreach ($this->articles as $article) {
            
            $output .= $article->render_preview();

        }
    return $output;
    }

    /**
     * 
     * adds a new article using methods from the super-class
     * 
     * @param String article-title
     * @param String article-category
     * @param String article-ingress
     * @param String article-text
     * @param String article-author
     * 
     */
    public function add($title, $category, $ingress, $text, $author){

        $this->prepare("INSERT INTO articles (title, category, ingress, text, date, author) VALUES (?, ?, ?, ?, ?, ?)");
        $this->bind("ssssss", array($title, $category, $ingress, $text, date("Y-m-d H:i:s"), $author));
        $this->execute();
        
    }

    /**
     * 
     * 
     * @param Integer id article-id
     * @return Object Article object 
     * 
     * returns an article object with the specific article-id
     * 
     */
    public function get_article($id){

        foreach ($this->articles as $article) {

            if($article->id == $id)
                return $article;
        }
    } 
   
    /**
     * 
     * edits an article
     *     
     * @param String article-id
     * @param String article-title
     * @param String article-category
     * @param String article-ingress
     * @param String article-text
     * 
     */
    public function edit_article($id , $title, $category, $ingress, $text){
       
        $this->prepare("UPDATE articles SET title = ?, category = ?, ingress = ?, text = ? WHERE id = ?");
        $this->bind("sssss", array($title, $category, $ingress, $text, $id));
        $this->execute();
    }  

}

?>