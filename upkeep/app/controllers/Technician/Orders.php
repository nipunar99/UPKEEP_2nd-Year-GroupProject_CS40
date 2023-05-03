<?php


class Orders{

    use Controller;
    use Auth;

    public function index()
    {
        $this->technicianAuth();

        //get all orders
        $orders = new Order;
        $new_orders = $orders->getNewOrders($_SESSION['user_id']);
        $order_queue = $orders->getOrderQueue($_SESSION['user_id']);
        $completed_orders = $orders->getCompletedOrdersForTable($_SESSION['user_id']);


        $data['new_orders'] = $new_orders;
        $data['order_queue'] = $order_queue;
        $data['completed_orders'] = $completed_orders;


        $this->view('Technician/orders',$data);

    }

    public function vieworder($id){
        $this->technicianAuth();

        $jobs = new Jobs;
        $job = $jobs->getJobDetailsByIdForTechnician($id[0]);
        $item = new IO_Owneritem;
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

    public function acceptOrder(){
        $this->technicianAuth();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action']=='accept_job') {
            try {
                $job = new jobs;
                $job->technicianAcceptJob($_POST['job_id'], $_SESSION['user_id']);
                $userid = $job->getColumns(['user_id'], ['job_id' => $_POST['job_id']]);
                $order = new Order;
                $order->createOrderForJob($_POST['job_id'], $_SESSION['user_id'], $userid[0]->user_id);
                http_response_code(200);
                echo json_encode(['success' => 'Order accepted successfully']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['error' => 'Something went wrong']);
            }
        }else{
            http_response_code(400);
            echo json_encode(['error' => 'Something went wrong']);
        }
    }

    public function completeOrder(){
        $this->technicianAuth();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action']=='complete_order'){
            show($_POST);
            try {
                $order_id = $_POST['order_id'];
                $service_charge = $_POST['service_charge'];
                $additional_notes = $_POST['additional_notes'];
                $order = new Order;
                $order->completeOrder($order_id, $service_charge, $additional_notes);
                http_response_code(200);
                echo json_encode(['success' => 'Order completed successfully']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['error' => 'Something went wrong']);
            }
        }
    }
}

