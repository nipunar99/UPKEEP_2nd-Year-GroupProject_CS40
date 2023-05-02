<?php

class Suggestion {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Owneritem;
           

            $this->view('Moderator/suggestions');
        }else{
            redirect("Home/home");
        }

    }
    public function getItemSuggestions(){
        $item = new Itemtemplates;
        $suggestions = $item->getSuggestionDetails();
        $result = json_encode($suggestions);
        echo($result);

    } 
    public function viewSuggestions($id){
        // $i_suggsetion = new 
        $this->view('Moderator/itemsuggestions');
    }
}