<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * NonReqLeave Controller
 *
 * @property \App\Model\Table\NonReqLeaveTable $NonReqLeave
 *
 * @method \App\Model\Entity\NonReqLeave[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NonReqLeaveController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public $paginate = [        
        'limit' => 5,
        'order' => [
            'NonReqLeave.starting_date' => 'desc'
        ]

    ];
    
    public function initialize()
    {
        parent:: initialize();
        $this->loadComponent('Paginator');
    }
    public function index()
    {
        $nonReqLeave = $this->paginate($this->NonReqLeave);

        $this->set(compact('nonReqLeave'));
    }

    /**
     * View method
     *
     * @param string|null $id Non Req Leave id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nonReqLeave = $this->NonReqLeave->get($id, [
            'contain' => []
        ]);

        $this->set('nonReqLeave', $nonReqLeave);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nonReqLeave = $this->NonReqLeave->newEntity();
        if ($this->request->is('post')) {
            $nonReqLeave = $this->NonReqLeave->patchEntity($nonReqLeave, $this->request->getData());
            if($nonReqLeave->empId==0||$nonReqLeave->ending_date==Null
                ||$nonReqLeave->starting_date==Null||$nonReqLeave->department==Null
                ||$nonReqLeave->designationId==0||$nonReqLeave->no_of_day==0
                ||$nonReqLeave->leave_type==Null||$nonReqLeave->leave_year==0
                ||$nonReqLeave->fullday_half==Null||$nonReqLeave->reason==NULL)
            {
                $this->Flash->error(__('Enter All Field Properly'));
            }
            else{
            $myName = $this->request->getData()['file']['name'];
            $mytmp = $this->request -> getData()['file']['tmp_name'];

            $myext = substr(strrchr($myName,"."),1);

            $mypath = "upload/".$myName;

            if(move_uploaded_file($mytmp,WWW_ROOT.$mypath)){
                $nonReqLeave->documentPath = $mypath;
                $nonReqLeave->documentName = $myName;
            }
            $myDt1 = $this->request->getData('starting_date');
            $myDt2 = $this->request->getData('ending_date');
            $strtDate = date("Y-m-d", strtotime($myDt1));
            $nonReqLeave->starting_date = $strtDate;
            $endDate = date("Y-m-d", strtotime($myDt2));
            $nonReqLeave->ending_date = $endDate;
            $empId = $this->request->getData('empId');
            $test1 = TableRegistry::get('emp_general_info');
            $test = $test1->find('all');
            foreach($test as $temp){
                if($empId==$temp['empId'] ){
                    echo "xxxxxxxxxx";
                    $nonReqLeave->empId = $temp['empId'];
                    $nonReqLeave->emp_name=  $temp['empName'];
                    //$request->data['password'] = $this->request->getData('password');
                }
            }
            if ($this->NonReqLeave->save($nonReqLeave)) {
                $this->Flash->success(__('The non req leave has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The non req leave could not be saved. Please, try again.'));
        }
        $this->set(compact('nonReqLeave'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Non Req Leave id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nonReqLeave = $this->NonReqLeave->get($id, [
            'contain' => []
        ]);
        $tr = TableRegistry::get('non_req_leave');
        $trFind= $tr->find('all');
        // echo"<pre>";print_r($trFind);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nonReqLeave = $this->NonReqLeave->patchEntity($nonReqLeave, $this->request->getData());
            $myName = $this->request->getData()['file']['name'];

            $mytmp = $this->request -> getData()['file']['tmp_name'];

            $myext = substr(strrchr($myName,"."),1);

            $mypath = "upload/".$myName;

            if(move_uploaded_file($mytmp,WWW_ROOT.$mypath)){
                $nonReqLeave->documentPath = $mypath;
                $nonReqLeave->documentName = $myName;
            }
            
            $myDt1 = $this->request->getData('starting_date');
            $myDt2 = $this->request->getData('ending_date');
            $strtDate = date("Y-m-d", strtotime($myDt1));
            $nonReqLeave->starting_date = $strtDate;
            $endDate = date("Y-m-d", strtotime($myDt2));
            $nonReqLeave->ending_date = $endDate;
            $empId = $this->request->getData('empId');
            $test1 = TableRegistry::get('emp_general_info');
            $test = $test1->find('all');
            foreach($test as $temp){
                if($empId==$temp['empId'] ){
                    echo "xxxxxxxxxx";
                    $nonReqLeave->empId = $temp['empId'];
                    $nonReqLeave->emp_name=  $temp['empName'];
                    //$request->data['password'] = $this->request->getData('password');
                }
            }
            if ($this->NonReqLeave->save($nonReqLeave)) {
                $this->Flash->success(__('The non req leave has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The non req leave could not be saved. Please, try again.'));
        }
        $this->set(compact('nonReqLeave'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Non Req Leave id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $nonReqLeave = $this->NonReqLeave->get($id);
        if ($this->NonReqLeave->delete($nonReqLeave)) {
            $this->Flash->success(__('The non req leave has been deleted.'));
        } else {
            $this->Flash->error(__('The non req leave could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function download($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $nonReqLeave = $this->NonReqLeave->get($id);
       
            $this->Flash->error(__("No file available"));

        return $this->redirect(['action' => 'index']);
    }
}


