<?php

declare(strict_types=1);

namespace App\Controller;

class EmployeesController extends AppController
{
    public function index()
    {
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    public function commit()
    {
        $this->autoRender = false;
        $employees = $this->Employees->find()->toArray();
        $totalEmployees = count($employees);
        $activated = 0;
        $filePath = WWW_ROOT . 'variables.json';

        foreach ($employees as $employee) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $employee->active = 1;
            if ($this->Employees->save($employee)) {
                $activated += 1;
                $data = array(
                    'totalEmployees' => $totalEmployees,
                    'activated' => $activated
                );
                file_put_contents($filePath, json_encode($data));
            }
            sleep(5);
        }
    }

    public function progress()
    {
        $this->autoRender = false;
        $filePath = WWW_ROOT . 'variables.json';
        $jsonData = file_get_contents($filePath);

        if ($jsonData !== false) {
            $data = json_decode($jsonData, true);
            if (!empty($data)) {
                $totalEmployees = $data['totalEmployees'];
                $activated = $data['activated'];
                $progress = ($activated / $totalEmployees) * 100;
                echo json_encode(['progress' => $progress]);
            } else {
                echo json_encode(['error' => 'JSON file is empty']);
            }
        } else {
            // Unable to read JSON file
            $this->response->withType('application/json');
            echo json_encode(['error' => 'Unable to read JSON file']);
        }
    }



    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('employee'));
    }

    public function add()
    {
        $employee = $this->Employees->newEmptyEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
