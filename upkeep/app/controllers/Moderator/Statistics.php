<?php

class Statistics
{

    use Controller;
    public function index()
    {
        $data = [];
        if (isset($_SESSION['user_id'])) {
            $arr = [];
            // $statistics = new Itemtemplates;
            // $items = $statistics->findAll();
            // $data['result'] = $result;

            $this->view('Moderator/statistics');
        } else {
            redirect("Home/home");
        }
    }
    public function itemView()
    {
        $itemtemplate = new Itemtemplates;
        $t_items = $itemtemplate->countItemtemplate();

        $p_items = $itemtemplate->countPendingItemtemplate();
        // $data['total_templates'] = $t_items[0]->{'COUNT(*)'};
        $data['total_templates'] = $t_items[0]->total_templates;
        $data['pending_templates'] = $p_items[0]->pending_templates;
        echo (json_encode($data));
    }
    public function userView()
    {
        $user = new User;
        $i_users = $user->TotalItemOwners();
        $tech = $user->TotalTechnicians();
        $data['item_owners'] = $i_users[0]->{'COUNT(*)'};
        $data['technicians'] = $tech[0]->{'COUNT(*)'};
        echo (json_encode($data));
    }
    public function adminView()
    {
        $user = new User;
        $admin = $user->TotalAdmins();
        $moderator = $user->TotalModerators();
        $data['admin'] = $admin[0]->{'COUNT(*)'};
        $data['moderator'] = $moderator[0]->{'COUNT(*)'};
        echo (json_encode($data));
    }
    public function itemCategoryView(){
        $item = new ItemTemplates;
        $result = $item->getItemcountByCategories();
        echo(json_encode($result));
    }
    public function itemSuggestionsCategoryView(){
        $item = new ItemTemplates;
        $result = $item->getItemSuggestionscountByCategories();
        echo(json_encode($result));
    }


}
