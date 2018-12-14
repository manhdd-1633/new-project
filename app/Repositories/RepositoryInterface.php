<?php
namespace App\Repositories;

interface RepositoryInterface {
	public function getAll();
	public function find($id);
	public function create(array $attributes);
	public function update(array $attributes, $id);
	public function delete($id);
	public function paginate($perPage = null, $columns = ['*']);
	public function findOrFail($id, $columns = ['*']);
    public function pluck($value = null, $key = null);
}
