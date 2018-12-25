<?php
namespace App\Repositories;

abstract class EloquentRepository implements RepositoryInterface
{
   
    protected $_model;
  
    public function __construct()
    {
        $this->setModel();
    }
 
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }
   
    public function getAll()
    {
        return $this->_model->all();
    }
  
    public function find($id)
    {
        $result = $this->_model->find($id);
        return $result;
    }
   
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }
    
    public function update(array $attributes, $id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }
    
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function paginate($perPage = null, $columns = ['*'])
    {
        $numPosts = $perPage ?? config('database.paginate');


        return $this->_model->paginate($numPosts, $columns = ['*']);
    }

    public function findOrFail($id, $columns = ['*'])
    {
        return $this->_model->findOrFail($id, $columns);
    }

    public function pluck($value = null, $key = null)
    {
        if (!$value) {
            return null;
        }
        $lists = $this->_model->pluck($value, $key);
        
        if (is_array($lists)) {
            
            return $lists;
        }

        return $lists->all();
    }
}
