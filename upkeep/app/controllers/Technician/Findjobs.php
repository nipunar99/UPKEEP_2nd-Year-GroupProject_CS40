<?php

class Findjobs
{

    use Controller;
    use Auth;

    public function index(){

        $this->technicianAuth();

        $jobs = new Jobs;
        $jobs->where(["status" => "pending"]);
        $jobs->limit(10);
        $jobs->page(1);
        $jobs->order("ASC");
        $jobs->order_by("job_id");
        $jobs->search(null);
        $result = $jobs->getJobDetailsForPublic();
        $data["jobs"] = $result;

//        show($data);
        $this->view('Technician/findjobs',$data);
        
    }

    public function jobs($search_params, $page = 1, $limit =10, $order = "ASC", $order_by = "job_id", $search = null){
        $jobs = new Jobs;
        $jobs->where($search_params);
        $jobs->limit($limit);
        $jobs->page($page);
        $jobs->order($order);
        $jobs->order_by($order_by);
        $jobs->search($search);
        $result = $jobs->get();
        $json = json_encode($result);
        echo($json);
    }

    public function viewJob($id){
        $this->technicianAuth();

        $jobs = new Jobs;
        $job = $jobs->getJobDetailsByIdForTechnician($id[0]);

        $item = new Owneritem;
        $item_details = $item->getItemDetailsForJob($job->item_id);

        $job_application = new Job_apply;
        $applied_technicians = $job_application->getApplicationsByJobId($id[0]);

        $data["user_role"] = $_SESSION["user_role"];
        $data["user_id"] = $_SESSION["user_id"];
        $data["job_details"] = $job;
        $data["item_details"] = $item_details;
        $data["applied_technicians"] = $applied_technicians;

        $this->view('Technician/job',$data);
    }


    public function applyJob(){
        if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "apply"){
            $job_id = $_POST["job_id"];
            $technician_id = $_SESSION["user_id"];
            $quote = $_POST["quote"];
            $status = "pending";
            try {
                $job_apply = new Job_apply;
                $job_apply->addApplication([
                    "job_id" => $job_id,
                    "technician_id" => $technician_id,
                    "quote" => $quote,
                    "status" => $status
                ]);
            } catch (PDOException $e) {
                if($e->getCode() == 23000){
                    http_response_code(400);
                    $arr['error']='Already applied for the job';
                    echo json_encode($arr);
                    exit();
                }
            }

            http_response_code(200);
            $arr['success']='Applied for the job successfully';
            echo json_encode($arr);
        }else{
            http_response_code(400);
            $arr['error']='Bad Request';
            echo json_encode($arr);
        }
    }
}
